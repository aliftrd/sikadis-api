<div class="lime-sidebar">
    <div class="lime-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Navigasi
            </li>
            <li>
                <x-sidebar-link :href="route('admin.dashboard')" is-route="admin.dashboard">
                    <i class="fas fa-fw fa-fire"></i> Beranda
                </x-sidebar-link>
            </li>
            @canany(['role.view', 'user.view'])
                <li>
                    <x-sidebar-link href="#" :is-route="['admin.roles.*', 'admin.users.*']">
                        <i class="fas fa-fw fa-user"></i> Menejemen User
                        <i class="fas fa-fw fa-chevron-left has-sub-menu"></i>
                    </x-sidebar-link>
                    <ul class="sub-menu">
                        @can('role.view')
                            <li>
                                <x-sidebar-link :href="route('admin.roles.index')" :is-route="['admin.roles.*']">
                                    Role
                                </x-sidebar-link>
                            </li>
                        @endcan
                        @can('user.view')
                            <li>
                                <x-sidebar-link :href="route('admin.users.index')" :is-route="['admin.users.*']">
                                    User
                                </x-sidebar-link>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @can('academic.year.view')
                <li>
                    <x-sidebar-link :href="route('admin.academic-years.index')" :is-route="['admin.academic-years.*']">
                        <i class="fas fa-fw fa-calendar"></i> Tahun Ajaran
                    </x-sidebar-link>
                </li>
            @endcan
            @can('student.candidate.view')
                <li>
                    <x-sidebar-link :href="route('admin.student-candidates.index')"
                                    is-route="admin.student-candidates.*">
                        <i class="fas fa-fw fa-users"></i> Calon Siswa
                    </x-sidebar-link>
                </li>
            @endcan
            @can('slider.view')
                <li>
                    <x-sidebar-link :href="route('admin.sliders.index')" :is-route="['admin.sliders.*']">
                        <i class="fas fa-fw fa-file-image"></i> Slider
                    </x-sidebar-link>
                </li>
            @endcan
            @canany(['post.view', 'post.create', 'post.category.view'])
                <li>
                    <x-sidebar-link href="#" :is-route="['admin.posts.*']">
                        <i class="fas fa-fw fa-globe"></i> Blog
                        <i class="fas fa-fw fa-chevron-left has-sub-menu"></i>
                    </x-sidebar-link>
                    <ul class="sub-menu">
                        @can('post.view')
                            <li>
                                <x-sidebar-link :href="route('admin.posts.index')"
                                                :is-route="['admin.posts.index', 'admin.posts.edit']">
                                    Post
                                </x-sidebar-link>
                            </li>
                        @endcan
                        @can('post.create')
                            <li>
                                <x-sidebar-link :href="route('admin.posts.create')" :is-route="['admin.posts.create']">
                                    Tambah Post Baru
                                </x-sidebar-link>
                            </li>
                        @endcan
                        @can('post.category.view')
                            <li>
                                <x-sidebar-link :href="route('admin.posts.categories.index')"
                                                :is-route="['admin.posts.categories.*']">
                                    Kategori
                                </x-sidebar-link>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @can('page.view')
                <li>
                    <x-sidebar-link :href="route('admin.pages.index')"
                                    :is-route="['admin.pages.*']">
                        <i class="fas fa-fw fa-rss"></i> Halaman
                    </x-sidebar-link>
                </li>
            @endcan
            @can('setting.access')
                <li>
                    <x-sidebar-link href="#" :is-route="['admin.settings.*']">
                        <i class="fas fa-fw fa-cog"></i> Pengaturan
                        <i class="fas fa-fw fa-chevron-left has-sub-menu"></i>
                    </x-sidebar-link>
                    <ul class="sub-menu">
                        <li>
                            <x-sidebar-link :href="route('admin.settings.general.index')"
                                            is-route="admin.settings.general.index">
                                Meta
                            </x-sidebar-link>
                        </li>
                        <li>
                            <x-sidebar-link :href="route('admin.settings.greeting.index')"
                                            is-route="admin.settings.greeting.index">
                                Sambutan
                            </x-sidebar-link>
                        </li>
                        <li>
                            <x-sidebar-link :href="route('admin.settings.contact.index')"
                                            is-route="admin.settings.contact.index">
                                Kontak
                            </x-sidebar-link>
                        </li>
                    </ul>
                </li>
            @endcan
        </ul>
    </div>
</div>
