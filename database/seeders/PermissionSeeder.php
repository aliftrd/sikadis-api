<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'role.view',
            'role.create',
            'role.edit',
            'role.destroy',
        ];

        $users = [
            'user.view',
            'user.create',
            'user.edit',
            'user.destroy',
        ];

        $sliders = [
            'slider.view',
            'slider.create',
            'slider.edit',
            'slider.destroy',
        ];

        $blogs = [
            // Blog Post
            'post.view',
            'post.create',
            'post.edit',
            'post.destroy',
            // Blog Category
            'post.category.view',
            'post.category.create',
            'post.category.edit',
            'post.category.destroy',
        ];

        $pages = [
            'page.view',
            'page.create',
            'page.edit',
            'page.destroy',
        ];

        $settings = [
            'setting.access',
        ];

        $permissions = collect([
            ...$roles,
            ...$users,
            ...$sliders,
            ...$blogs,
            ...$pages,
            ...$settings,
        ]);
        $permissions->each(fn($permission) => Permission::create(['name' => $permission]));
    }
}
