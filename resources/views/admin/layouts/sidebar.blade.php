        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                    <img class="img-fluid w-75" src="{{ asset(settings()->where('name','logo')->first()->value) }}" />
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item nav-category">Main</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Settings</li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_route(['admin.web.setting.list']) }}" href="{{ route('admin.web.setting.list') }}">
                            <i class="link-icon" data-feather="mail"></i>
                            <span class="link-title">Website</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="pages/apps/chat.html" class="nav-link">
                            <i class="link-icon" data-feather="message-square"></i>
                            <span class="link-title">Interaction</span>
                        </a>
                    </li> -->
                    <li class="nav-item nav-category">Components</li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_route(['admin.ship.index','admin.ship.edit']) }}" href="{{ route('admin.ship.index')  }}">
                            <i class="link-icon" data-feather="feather"></i>
                            <span class="link-title">Ships</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_route(['admin.stations.edit','admin.stations.index']) }}" href="{{ route('admin.stations.index')  }}">
                            <i class="link-icon" data-feather="file"></i>
                            <span class="link-title">Stations</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_route(['admin.seat.edit','admin.seat.index']) }}" href="{{ route('admin.seat.index')  }}">
                            <i class="link-icon" data-feather="file"></i>
                            <span class="link-title">Seats</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                            <i class="link-icon" data-feather="anchor"></i>
                            <span class="link-title">Tickets</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="advancedUI">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('admin.ticket.create') }}" class="nav-link">New Ticket</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">All Tickets</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">Users</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.user.index') }}">
                            <i class="link-icon" data-feather="unlock"></i>
                            <span class="link-title">All Users</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>