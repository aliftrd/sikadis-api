<div class="lime-sidebar">
    <div class="lime-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Apps
            </li>
            <li>
                <x-sidebar-link :href="route('admin.dashboard')" is-route="admin.dashboard">
                    <i class="fas fa-fire"></i> Dashboard
                </x-sidebar-link>
            </li>
            @canany(['role.view', 'user.view'])
                <li>
                    <x-sidebar-link href="#" :is-route="['admin.roles.*', 'admin.users.*']">
                        <i class="fas fa-user"></i> User Management
                        <i class="fas fa-chevron-left has-sub-menu"></i>
                    </x-sidebar-link>
                    <ul class="sub-menu">
                        @can('role.view')
                            <li>
                                <x-sidebar-link :href="route('admin.roles.index')" :is-route="['admin.roles.*']">
                                    Roles
                                </x-sidebar-link>
                            </li>
                        @endcan
                        @can('user.view')
                            <li>
                                <x-sidebar-link :href="route('admin.users.index')" :is-route="['admin.users.*']">
                                    Users
                                </x-sidebar-link>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @can('slider.view')
                <li>
                    <x-sidebar-link :href="route('admin.sliders.index')" :is-route="['admin.sliders.*']">
                        <i class="fas fa-file-image"></i> Sliders
                    </x-sidebar-link>
                </li>
            @endcan
            @canany(['post.view', 'post.create', 'post.category.view'])
                <li>
                    <x-sidebar-link href="#" :is-route="['admin.posts.*']">
                        <i class="fas fa-globe"></i> Blog
                        <i class="fas fa-chevron-left has-sub-menu"></i>
                    </x-sidebar-link>
                    <ul class="sub-menu">
                        <li>
                            <x-sidebar-link :href="route('admin.posts.index')"
                                            :is-route="['admin.posts.index', 'admin.posts.edit']">
                                Posts
                            </x-sidebar-link>
                        </li>
                        <li>
                            <x-sidebar-link :href="route('admin.posts.create')" :is-route="['admin.posts.create']">
                                New Post
                            </x-sidebar-link>
                        </li>
                        <li>
                            <x-sidebar-link :href="route('admin.posts.categories.index')"
                                            :is-route="['admin.posts.categories.*']">
                                Categories
                            </x-sidebar-link>
                        </li>
                    </ul>
                </li>
            @endcanany
            @can('page.view')
                <li>
                    <x-sidebar-link :href="route('admin.pages.index')"
                                    :is-route="['admin.pages.*']">
                        <i class="fas fa-rss"></i> Pages
                    </x-sidebar-link>
                </li>
            @endcan
            <li>
                <a href="#"><i class="fas fa-book"></i>Documentation</a>
            </li>
        </ul>
    </div>
</div>
