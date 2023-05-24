<?php

namespace App\Http\Controllers;

use App\Actions\Upload\ResolveRevertAction;
use App\Enums\FlashType;
use App\Enums\SettingPrefix;
use App\Models\Setting;
use App\Rules\ValidFileUploadRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:setting.access']);
    }

    public function general(Request $request)
    {
        if ($request->isMethod('PATCH')) {
            $validator = \Validator::make($request->except(['_method', '_token']), [
                'logo' => ['nullable', 'string', new ValidFileUploadRule(['image/jpeg', 'image/png'])],
                'title' => 'required|string|max:255',
                'keywords' => 'required|string|max:255',
                'description' => 'required|string|max:255',
            ], [], [
                'logo' => 'Logo',
                'title' => 'Title',
                'keywords' => 'Keywords',
                'description' => 'Description',
            ]);

            if ($validator->fails()) {
                ResolveRevertAction::resolve()->execute($request->logo);

                return back()->withErrors($validator)->withInput();
            }

            $this->_update($request, SettingPrefix::GENERAL);
            return $this->resolveForRedirectResponseWith('admin.settings.general.index', FlashType::SUCCESS, 'Settings updated successfully');
        }

        return view('pages.setting.general');
    }

    public function greeting(Request $request)
    {
        if ($request->isMethod('PATCH')) {
            $validator = \Validator::make($request->except(['_method', '_token']), [
                'kata_sambutan' => 'required|string',
            ], [], [
                'kata_sambutan' => 'Kata Sambutan',
            ]);

            if ($validator->fails()) return back()->withErrors($validator)->withInput();

            $this->_update($request, SettingPrefix::GREETINGS);
            return $this->resolveForRedirectResponseWith('admin.settings.greeting.index', FlashType::SUCCESS, 'Settings updated successfully');
        }
        $settings = Setting::prefix(SettingPrefix::GREETINGS)->pluck('value', 'variable');

        return view('pages.setting.greeting', compact('settings'));
    }

    public function contact(Request $request)
    {
        if ($request->isMethod('PATCH')) {
            $validator = \Validator::make($request->except(['_method', '_token']), [
                'pusat_bantuan' => 'required|string',
                'jam_kantor' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|email',
            ], [], [
                'pusat_bantuan' => 'Pusat Bantuan',
                'jam_kantor' => 'Jam Kantor',
                'phone' => 'Phone',
                'email' => 'Email',
            ]);

            if ($validator->fails()) return back()->withErrors($validator)->withInput();

            $this->_update($request, SettingPrefix::CONTACT);
            return $this->resolveForRedirectResponseWith('admin.settings.contact.index', FlashType::SUCCESS, 'Settings updated successfully');
        }
        $settings = Setting::prefix(SettingPrefix::CONTACT)->pluck('value', 'variable');

        return view('pages.setting.contact', compact('settings'));
    }

    protected function _update(Request $request, SettingPrefix $prefix): void
    {
        $settings = Setting::prefix($prefix)->get();

        foreach ($settings as $setting) {
            if ($setting->type === 'image') {
                if ($request[strtolower($setting->variable)] !== null) {
                    $requestFilename = explode('/', $request[strtolower($setting->variable)])[1];
                    if (!is_null($setting->value) && Storage::exists($setting->value)) Storage::delete($setting->value);
                    if (!Storage::exists(Setting::DIRECTORY_PATH)) Storage::makeDirectory(Setting::DIRECTORY_PATH, 0775, true);
                    Storage::move($request[strtolower($setting->variable)], Setting::DIRECTORY_PATH . $requestFilename);

                    $setting->update(['value' => Setting::DIRECTORY_PATH . $requestFilename]);
                }
            } else {
                $setting->update(['value' => $request[strtolower($setting->variable)]]);
            }
        }
    }
}
