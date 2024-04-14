 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">J.D Developer</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a  class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class='bx bxs-user'></i>
            <span>Profile</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a href="{{url('/dashboard/home')}}" class="collapse-item" >Profile</a>
                <a href="{{url('/dashboard/create')}}" class="collapse-item" >Create a Profile</a>>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Category</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('Category.index') }}">View Category</a>
                <a class="collapse-item" href="{{ route('add-Category.create') }}">Create a Category</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Post</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('Post.index') }}">View Posts</a>
                <a class="collapse-item" href="{{ route('add-Post.create') }}">Create a Post</a>
            </div>
        </div>
    </li>
       <!-- Nav Item - Utilities Collapse Menu -->
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie"
            aria-expanded="true" aria-controls="collapseUtilitie">
            <i class='bx bx-group'></i>
            <span>Team</span>
        </a>
        <div id="collapseUtilitie" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('Team.index') }}">View Team</a>
                <a class="collapse-item" href="{{ route('add-team.create') }}">Add a Member</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtiliti"
            aria-expanded="true" aria-controls="collapseUtilitie">
            <i class='bx bx-wrench'></i>
            <span>Services Categories</span>
        </a>
        <div id="collapseUtiliti" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('Services_Category.index') }}">View Categories</a>
                <a class="collapse-item" href="{{ route('add-Services_Category.create') }}">Add a Category</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilit"
            aria-expanded="true" aria-controls="collapseUtilitie">
            <i class='bx bx-wrench'></i>
            <span>Services</span>
        </a>
        <div id="collapseUtilit" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('Service.index') }}">View Services</a>
                <a class="collapse-item" href="{{ route('add-Service.create') }}">Add a Service</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapeUtilit"
            aria-expanded="true" aria-controls="collapseUtilitie">
            <i class='bx bx-wrench'></i>
            <span>Portfolio Categories</span>
        </a>
        <div id="collapeUtilit" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('Portfolio_category.index') }}">View categories</a>
                <a class="collapse-item" href="{{ route('add_port_category.create') }}">Add categories</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapeUtili"
            aria-expanded="true" aria-controls="collapseUtilitie">
            <i class='bx bx-wrench'></i>
            <span>Portfolio Gallery</span>
        </a>
        <div id="collapeUtili" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('Portfolio_gallery.index') }}">View Gallery</a>
                <a class="collapse-item" href="{{ route('add_port_gallery.create') }}">Add Image</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('Users.index') ? 'active' : '' }}" href="{{ route('Users.index') }}">
            <i class='bx bx-user'></i>
            <span>Users</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>
<!-- End of Sidebar -->