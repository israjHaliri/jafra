<header class="header" id="#head-nav-backend">
  <span href="index.html" class="logo">
    <big>DASHBOARD</big>
  </span>
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="fa fa-bars fa-lg"></span>
    </a>
    <div class="navbar-right">
      <ul class="nav navbar-nav">
        <li class="dropdown profile-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-cog fa-lg"></i>
            <span class="username">Me</span>
            <i class="caret"></i>
          </a>
          <ul class="dropdown-menu box profile">
            <li><div class="up-arrow"></div></li>
            <li class="border-top">
              <a href="{{ route('staff/profile') }}"><i class="fa fa-user"></i>My Account</a>
            </li>
            <li>
              <a href="{{ route('logout') }}"><i class="fa fa-power-off"></i>Log Out</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
  <aside class="left-side sidebar-offcanvas">
    <section class="sidebar">
      <div class="user-panel">
        <div class="image" align="center">
        <?php if (Auth::user()->avatar !=""): ?>
          <img src="{{Auth::user()->avatar}}" class="img-circle" alt="User Image" style="height:75px;width:75px;">
        <?php elseif (Auth::user()->profile->photo !=""): ?>
          <img src="{{asset('resources/assets/image/profile')}}/{{Auth::user()->profile->photo}}" class="img-circle" alt="User Image" style="height:75px;width:75px;">
        <?php else: ?>
          <img src="{{asset('resources/assets/image')}}/no_photo.png" class="img-circle" alt="User Image" style="height:75px;width:75px;">
        <?php endif ?>
        </div>
        <div class="pull-left info" style="margin-top:15px;">
          <p>Email : <?php echo Auth::user()->email ?></p>
          <span>level : Staff </span>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="active">
          <a href="{{ route('staff/dashboard') }}">
            <i class="fa fa-home"></i><span>Dashboard</span>
          </a>
        </li>
        <li class="active">
          <a href="{{ route('staff/profile') }}">
            <i class="fa fa-users"></i><span>Profile</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>
  <aside class="right-side">
    <section class="content">
      <div class="row">
        <div class="col-md-12" id="content_backend_ajax" style="margin-top:25px;"></div>