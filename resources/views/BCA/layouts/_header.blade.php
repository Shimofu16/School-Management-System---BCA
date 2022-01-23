<header>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-bca-nav shadow">
        <div class="container-lg d-flex justify-content-between align-content-center">
            <a class="navbar-brand d-flex justify-content-center align-content-center" href="{{ route('home.index') }}">
                <img src="{{ asset('img/BCA-Logo.png') }}" alt="" class="myLogo">
                <h2 class="text-bca my-auto navbar-title"> Breakthrough Christian Academy</h2>
            </a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <div class="navbar-toggler-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse flex-grow-0" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item nav-line mx-1 {{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{ route('home.index') }}" class="nav-link hover-bca p-3 text-bca">Home</a>
                    </li>
                    <li class="nav-item nav-line mx-1 dropdown {{ Request::is('about us') ? 'active' : '' }}">
                        <a class="nav-link  hover-bca p-3 text-bca" href="#">About us</a>
                        <ul class="dropdown-menu bg-bca" id="dd">
                            <li><a href="{{ route('about.index') }}" class="dropdown-item p-3 text-light hover-bca-dd">Mission and Vision</a>
                            </li>
                            <li><a href="{{ route('about.index') }}" class="dropdown-item p-3 text-light hover-bca-dd">History</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-line mx-1 dropdown {{ Request::is('academics/') ? 'active' : '' }}">
                        <a href="#" class="nav-link hover-bca  p-3 text-bca">Academics</a>
                        <ul class="dropdown-menu bg-bca" id="dd">
                            <li><a href="#" class="dropdown-item p-3 text-light hover-bca-dd">Primary</a>
                                <ul class="submenu dropdown-menu bg-bca">
                                    <li><a href="#" class="dropdown-item p-3 text-light hover-bca-dd">Nursery</a>
                                    </li>
                                    <li><a href="#"
                                            class="dropdown-item p-3 text-light hover-bca-dd">Kindergarten</a>
                                    </li>
                                    <li><a href="#"
                                            class="dropdown-item p-3 text-light hover-bca-dd">Preparatory</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#" class="dropdown-item p-3 text-light hover-bca-dd">Elementary</a>
                            </li>
                            <li><a href="#" class="dropdown-item p-3 text-light hover-bca-dd">Juior High School</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-line mx-1 dropdown ">
                        <a href="#" class="nav-link  hover-bca p-3 text-bca">Student</a>
                        <ul class="dropdown-menu bg-bca" id="dd">
                            <li><a href="{{ route('portal.index') }}" class="dropdown-item p-3 text-light hover-bca-dd">Portal</a>
                            </li>
                            <li><a href="{{ route('calendar.index') }}" class="dropdown-item p-3 text-light hover-bca-dd">Academic Calendar</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
