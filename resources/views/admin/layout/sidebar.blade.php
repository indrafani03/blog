<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
            <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
          </ul>
        </li>
        <li class="menu-header">Menu</li>
        
        <li class=active><a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-list"></i> <span>Category</span></a></li>
        <li class=active><a class="nav-link" href="{{ route('tag.index') }}"><i class="fas fa-tag"></i> <span>Tags</span></a></li>
        <li class=active><a class="nav-link" href="{{ route('post.index') }}"><i class="fas fa-sticky-note"></i> <span>Posts</span></a></li>
        <li class=active><a class="nav-link" href="{{ url('/admin/sampah')}}"><i class="fas fa-trash"></i> <span>Tong sampah</span></a></li>
        <li class=active><a class="nav-link" href="{{ url('/admin/user')}}"><i class="fas fa-users"></i> <span>Pengguna</span></a></li>
       </aside>
  </div>
      
        
         
          
    
