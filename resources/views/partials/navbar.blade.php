<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a @class(['nav-link', 'active' => app()->getLocale() == 'en' ]) href="{{ route('change-language', ['locale' => 'en']) }}">EN</a>
        </li>
        <li class="nav-item dropdown">
            <a @class(['nav-link', 'active' => app()->getLocale() == 'me' ]) href="{{ route('change-language', ['locale' => 'me']) }}">ME</a>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" href="backend/auth/logout.php">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
