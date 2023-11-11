<header class="header">
    <nav class="navbar">
        <!-- Search Box-->
        <div class="search-box">
            <button class="dismiss"><i class="fas fa-times"></i></button>
            <form action="#" id="searchForm" name="searchForm" role="search">
                <input class="form-control" placeholder="What are you looking for..." type="search">
            </form>
        </div>
        <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <!-- Navbar Header-->
                <div class="navbar-header">
                    <!-- Navbar Brand -->
                    <a class="navbar-brand" href="index.html">
                        <div class="brand-text brand-big hidden-lg-down">
                            <strong class="font-weight-bold">SPMMS</strong> <span></span>
                        </div>
                        <div class="brand-text brand-small">
                            <strong class="font-weight-bold">SPMMS</strong>
                        </div>
                    </a>
                    <!-- Toggle Button-->
                    <a class="menu-btn active" href="#"
                        id="toggle-btn"><span></span><span></span><span></span></a>
                </div>
                <!-- Header Title -->
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-center">
                    <h3 class="text-muted align-items-center text-center font-weight-normal mx-auto my-0 flex-md-row">
                        "স্মার্ট প্রোজেক্ট মনিটরিং অ্যান্ড ম্যানেজমেন্ট সিস্টেম"
                    </h3>
                </ul>
                <!-- Navbar Menu -->
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-center">
                    <!-- Logout    -->
                    <li class="nav-item">
                        <a class="nav-link logout" href="{{ route('logout') }}">Logout<i class="fas fa-sign-out-alt"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
