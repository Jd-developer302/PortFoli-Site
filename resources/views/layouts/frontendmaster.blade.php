<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="Author" content="">
    <link rel="stylesheet" href="{{asset('asset/css/frontend/style.css')}}">
    <!-- boxicon css link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Fancybox CSS -->
<link rel="stylesheet" href="@@path/vendor/@fancyapps/fancybox/dist/jquery.fancybox.min.css">
  <!-- Include Bootstrap Icons (Optional) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
</head>
<style>
  .category_view_post{
    width: 100%;
    padding: 1rem;
    border-radius: 10px;
    margin-bottom: 3rem
  }
  .main-text-category{
    width: 100%;
    background: var(--gradient-white-bg2);
    box-shadow: rgba(0,0,0,0.18)0px 2px 4px;
    padding: 1rem;
    border-radius: 10px;
    margin-bottom: 3rem
  }
  .main-text-category h4{
    border-left: 7px solid rgba(160,8,156,1);
    padding: 7px
  }
  .card-info a .post-heading{
    text-decoration: none;
  }
  .page-link {
    position: relative;
    display: block;
    color: #fff;
    text-decoration: none;
    margin: 5px;
    font-size: 1.3rem;
    background-color: rgba(160,8,156,1) !important;
    border: 1px solid rgba(160,8,156,1) !important;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.page-link:hover{
  color: #fff;
}
  .page-item.active .page-link{
    color: rgba(160,8,156,1) !important;
    border: 1px solid rgba(160,8,156,1) !important;
  }
  
</style>

<body>

    <div>
        @include('components.frontend.navbar')
        @yield('content')
        @include('components.frontend.footer')
    </div>




    <!-- scroll reveal  -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Swiper JS -->
     <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- mixitup cdn js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="{{asset('asset/js/frontend/script.js')}}"></script>
    <!-- Fancybox JS -->
<script src="@@path/vendor/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>

        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
        }
        

        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
        </script>
         <script>

          function myFunctions() {
            document.getElementById("myDropdow").classList.toggle("show");
          }
          
  
          window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
              var dropdowns = document.getElementsByClassName("dropdown-content");
              var i;
              for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                  openDropdown.classList.remove('show');
                }
              }
            }
          }
          </script>
       
        
    
    
    
    
</body>

</html>