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
        <li class="dropdown navbar-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell fa-lg"></i>
            <span class="badge"><?php echo $count ?></span>
          </a>
          <ul class="dropdown-menu box notification">
            <li><div class="up-arrow"></div></li>
            <li>
              <p>You have <?php echo $count ?> new notifications</p>
            </li>
            @foreach($list_notif as $data)
            <li>
              <a href="{{ route('admin/user') }}">
                <i class="fa fa-user text-blue"></i>{{ $data->name }} Has Something New<span class="time pull-right">At {{ $data->created_at }}</span>
              </a>
            </li>
            @endforeach
            <li class="footer">
              <a href="{{ route('admin/user') }}">See all</a>
            </li>
          </ul>
        </li>
        <li class="dropdown profile-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-cog fa-lg"></i>
            <span class="username">Me</span>
            <i class="caret"></i>
          </a>
          <ul class="dropdown-menu box profile">
            <li><div class="up-arrow"></div></li>
            <li class="border-top">
              <a href="{{ route('admin/profile') }}"><i class="fa fa-user"></i>My Account</a>
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
        <?php if (Auth::user()->profile->photo !=""): ?>
          <img src="{{asset('resources/assets/image/profile')}}/{{Auth::user()->profile->photo}}" class="img-circle" alt="User Image" style="height:75px;width:75px;">
        <?php else: ?>
          <img src="{{asset('resources/assets/image')}}/no_photo.png" class="img-circle" alt="User Image" style="height:75px;width:75px;">
        <?php endif ?>
        </div>
        <div class="pull-left info" style="margin-top:15px;">
          <p>Email : <?php echo Auth::user()->email ?></p>
          <span>level : Admin </span>
        </div>  
      </div>
      <ul class="sidebar-menu">
        <li class="active">
          <a href="{{ route('admin/dashboard') }}">
            <i class="fa fa-home"></i><span>Dashboard</span>
          </a>
        </li>
        <li class="active">
          <a href="{{ route('admin/profile') }}">
            <i class="fa fa-users"></i><span>Profile</span>
          </a>
        </li>
        <li class="active">
          <a href="{{ route('admin/message') }}">
            <i class="fa fa-envelope"></i><span>Message</span>
          </a>
        </li>
        <li class="menu">
          <a href="#">
            <i class="fa fa-image"></i><span>Gallery</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="sub-menu">
            <li><a  href="{{ route('admin/image_gallery') }}">Gallery</a></li>
            <li><a  href="{{ route('admin/image_testimoni') }}">Testimonial</a></li>
            <li><a  href="{{ route('admin/image_company') }}">Company</a></li>
          </ul>
        </li>
        <li class="menu">
          <a href="#">
            <i class="fa fa-folder-open"></i><span>User</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="sub-menu">
            <li><a  href="{{ route('admin/user/create') }}">New</a></li>
            <li><a  href="{{ route('admin/user') }}">List</a></li>
          </ul>
        </li>
        <li class="menu">
          <a href="#">
            <i class="fa fa-folder-open"></i><span>Landing Page</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="sub-menu">
            <li><a  href="{{ route('admin/landing_page/create') }}">New</a></li>
            <li><a  href="{{ route('admin/landing_page') }}">List</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>
  <aside class="right-side">
    <section class="content">
      <div class="row">
        <div class="col-md-12" id="content_backend_ajax" style="margin-top:25px;"></div>