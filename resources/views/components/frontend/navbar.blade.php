<div class="overlay"></div>
<header>
    <a href="#" class="logo"><span>J.D</span> Developer</a>
    <ul class="navlist">
        <li><a href="{{ route('home') }}" class="active">Home</a></li>
        <li><a href="#about">About</a></li>
        <li class="dropdown">
            <a  onclick="myFunction()" class="dropbtn">Services<i class="fa-solid fa-caret-down"></i></a>
            <ul id="myDropdown" class="dropdown-content">
                @php
                $serviceCategories = App\Models\ServiceCategory::get();
                @endphp
                @foreach ($serviceCategories as $cateitem)
                <li><a href="{{url('Service/'.$cateitem->slug)}}">{{$cateitem->name}}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
        <li class="dropdown">
            <a  onclick="myFunctions()" class="dropbtn">Blog<i class="fa-solid fa-caret-down"></i></a>
            <ul id="myDropdow" class="dropdown-content">
                <li><a href="{{url('/blog')}}">All Posts</a></li>
                @php
                $categories = App\Models\Category::where('navbar_status','0')->where('status','0')->get();
                @endphp
                @foreach ($categories as $cateitem)
                <li><a href="{{url('tutorial/'.$cateitem->slug)}}">{{$cateitem->name}}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="#contact">Contact</a></li>
    </ul>
    <div class="right-header">
        <a href="https://wa.me/03023300026" class="btn">Let's chat <i class='bx bx-message-dots'></i></a>
        <div class="menu-icon">
            <div class="bar"></div>
        </div>
    </div>
</header>


