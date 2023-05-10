<div class="lime-header">
    <nav class="navbar navbar-expand-lg">
        <section class="material-design-hamburger navigation-toggle">
            <a href="javascript:void(0)" class="button-collapse material-design-hamburger__icon">
                <span class="material-design-hamburger__layer"></span>
            </a>
        </section>
        <a class="navbar-brand" href="#">SIKADIS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="material-icons">keyboard_arrow_down</i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user mr-2"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a class="dropdown-item" href="{{ route('admin.profile.edit') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li class="divider"></li>
                        <li>
                            <a onclick="document.getElementById('form-logout').submit()" class="dropdown-item" href="#">Log
                                Out</a>

                            <form method="POST" action="{{ route('logout') }}" id="form-logout">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
