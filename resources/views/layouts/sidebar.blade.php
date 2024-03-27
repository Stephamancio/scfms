<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <div class="text-center d-none d-md-inline">
    <button class="fa fa-bars" id="sidebarToggle"></button>
  </div>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Sidebar- Dashboard -->
  @if(auth()->user()->role_id === 1)
    <!-- Admin Sidebar Items -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.home') }}">
        <i class="fa fa-user" aria-hidden="true"></i>
        <span>Admin Dashboard</span>
      </a>
    </li>
    <!-- Add more admin-specific sidebar items here -->
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fa fa-users" aria-hidden="true"></i>
        <span>Manage Users</span>
      </a>
    </li>
  @endif
  @if(auth()->user()->role_id === 2)
    <!-- Manager Sidebar Items -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('manager.home') }}">
        <i class="fa fa-user" aria-hidden="true"></i>
        <span>Manager Dashboard</span>
      </a>
    </li>
    <!-- Add more manager-specific sidebar items here -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('manager.foods.index') }}">
        <i class="fa fa-users" aria-hidden="true"></i>
        <span>List of Foods</span>
      </a>
    </li>
  @endif
  @if(auth()->user()->role_id === 3)
    <!-- Cahsier Sidebar Items -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('cashier.home') }}">
        <i class="fa fa-user" aria-hidden="true"></i>
        <span>Cashier Dashboard</span>
      </a>
    </li>
    <!-- Add more Cashier-specific sidebar items here -->
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fa fa-users" aria-hidden="true"></i>
        <span>List of Foods</span>
      </a>
    </li>
  @endif
  @if(auth()->user()->role_id === 4)
    <!-- Parent Sidebar Items -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('parent.home') }}">
        <i class="fa fa-user" aria-hidden="true"></i>
        <span>Parent Dashboard</span>
      </a>
    </li>
    <!-- Add more Parent-specific sidebar items here -->
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fa fa-users" aria-hidden="true"></i>
        <span>Purchase History</span>
      </a>
    </li>
  @endif
  

  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
</ul>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sidebarToggle').click(function() {
            $('body').toggleClass('sidebar-toggled');
            $('#accordionSidebar').toggleClass('toggled');
        });
    });
</script>
