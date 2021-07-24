        <!-- BEGIN: Header-->
        <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
            <div class="navbar-wrapper">
                <div class="navbar-container content">
                    <div class="navbar-collapse" id="navbar-mobile">
                        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                            <ul class="nav navbar-nav float-left">
                                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
                                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                            </ul>
                        </div>
                        <ul class="nav navbar-nav float-right">
                            <li class="dropdown dropdown-user nav-item">
                                <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                    <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{ $logged_in_user->name}}</span>
                                    </div><span><img class="round" src="{{ $logged_in_user->avatar }}" alt="avatar" height="40" width="40"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('frontend.user.dashboard') }}"><i class="feather icon-user"></i> Dashboard</a>
                                    <div class="dropdown-divider"></div>

                                    <x-utils.link :text="__('Logout')" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <x-slot name="text">
                                            <i class="feather icon-power"></i> @lang('Logout')
                                            <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                                        </x-slot>
                                    </x-utils.link>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- END: Header-->