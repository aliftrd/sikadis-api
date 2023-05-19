<div>
    @if(session()->has('flash'))
        <div @class([
            'alert',
            'alert-success' => session('flash')['type'] == \App\Enums\FlashType::SUCCESS,
            'alert-danger' => session('flash')['type'] == \App\Enums\FlashType::ERROR,
            'alert-warning' => session('flash')['type'] == \App\Enums\FlashType::WARNING,
            'alert-info' => session('flash')['type'] == \App\Enums\FlashType::INFO,
        ]) role="alert">
            {{ session('flash')['message'] }}
        </div>
    @endif
</div>
