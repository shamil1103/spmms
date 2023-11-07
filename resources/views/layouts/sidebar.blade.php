@php

@endphp
<nav id="main-menu" class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img alt="Dashboard Logo" class="img-fluid rounded-circle"
                src="{{ asset('assets/img/BD-Logo.jpg') }}"></div>
        <div class="title">
            <h1 class="h4">SPMMS</h1>
        </div>
    </div>
    <ul class="list-unstyled">
        <li class="active">
            <a href="index.html"><i class="fas fa-home"></i>Home</a>
        </li>
        <li>
            <a aria-expanded="false" data-toggle="collapse" href="#dashvariants1"><i class="fas fa-building"></i></i>
                পৌরসভা </a>
            <ul class="collapse list-unstyled" id="dashvariants1">
                <li>
                    <a href="pourosova-info.html"> তথ্য প্রদান </a>
                </li>
                <li>
                    <a href="pourosova-filter.html">তথ্য অনুসন্ধান </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-handshake"></i>
                মিটিং
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-envelope"></i>
                অভিযোগ
            </a>
        </li>
        <li>
            <a href="# "><i class="fas fa-tasks"></i> অভিযোগের অগ্রগতি </a>
        </li>
        <li>
            <a href="#"><i class="fas fa-address-card"></i> About App / সম্পর্কে </a>
        </li>
        <li>
            <a href="#"> <i class="fas fa-database"></i> Sync Master Data </a>
        </li>
        <li>
            <a href="#"> <i class="fas fa-globe"></i> Switch to Bangla </a>
        </li>
        <li>
            <a href="#"> <i class="fas fa-globe"></i> Switch to English </a>
        </li>
        <li>
            <a aria-expanded="false" data-toggle="collapse" href="#dashvariants9"><i class="fa fa-cog"></i></i> বেসিক
                সেটিংস </a>
            <ul class="collapse list-unstyled" id="dashvariants9">
                <li>
                    <a href="jela-create.html">জেলা তৈরি </a>
                </li>
                <li>
                    <a href="upozela-create.html">উপজেলা তৈরি </a>
                </li>
                <li>
                    <a href="union-create.html">ইউনিয়ন তৈরি </a>
                </li>
                <li>
                    <a href="pouroshava-create.html">পৌরসভা তৈরি </a>
                </li>
                <li>
                    <a href="khat-create.html">খাত তৈরি </a>
                </li>
                <li>
                    <a href="orther-utso-create.html">অর্থের উৎস তৈরি </a>
                </li>
            </ul>
        </li>
        <li>
            <a aria-expanded="false" data-toggle="collapse" href="#dashvariants10"><i class="fa fa-cog"></i></i> সিস্টেম
                সেটিংস</a>
            <ul class="collapse list-unstyled" id="dashvariants10">
                <li>
                    <a href=".html">সিস্টেম রোল সেটিং </a>
                </li>
                <li>
                    <a href="login-account-setting.html"> লগইন অ্যাকাউন্ট সেটিং</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fas fa-sign-in-alt"></i> লগইন তথ্য </a>
        </li>

        <li>
            <a aria-expanded="false" data-toggle="collapse" href="#dashvariants3"><i class="fas fa-copy"></i>প্রতিবেদন
            </a>
            <ul class="collapse list-unstyled" id="dashvariants3">

                <li>
                    <a href="#">দৈনিক প্রতিবেদন</a>
                </li>
                <li>
                    <a href="#">মাসিক প্রতিবেদন</a>
                </li>
                <li>
                    <a href="#">বাৎসরিক প্রতিবেদন</a>
                </li>
                <li>
                    <a href="#">প্রকল্প প্রতিবেদন</a>
                </li>
                <li>
                    <a href="#"> সম্পূর্ণ প্রকল্প প্রতিবেদন</a>
                </li>
                <li>
                    <a href="#"> চলমান প্রকল্প প্রতিবেদন</a>
                </li>
            </ul>
        </li>


        <li>
            <a aria-expanded="false" data-toggle="collapse" href="#dashvariants_setting">
                <i class="fas fa-cog"></i>Setting
            </a>
            <ul class="collapse list-unstyled" id="dashvariants_setting">
                <li >
                    <a href="#">User</a>
                </li>
                <li>
                    <a href="#">Role</a>
                </li>
                <li>
                    <a href="#">Application</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
