
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Techmatters.nl - @yield('title', 'Newest')</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">


  <link rel="stylesheet" href="{{route('home')}}/css/style.css" media="all">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top ">
      <div class="container">
        <a class="navbar-brand mx-auto" href="{{route('home')}}">Techmatters</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <?php

        $url_segments = explode('/' , url()->current());

        $url = (array_key_exists(4, $url_segments)) ? $url_segments[4] : '';


         ?>



        <div class="collapse navbar-collapse offset-md-1 " id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item {{strlen($url)===0 ? ' active' : ''}}">
              <a class="nav-link" href="{{url('/')}}">Home</a>
              <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
            </li>
            <li class="nav-item {{$url==='about' ? 'active' : ''}}">
              <a class="nav-link" href="{{url('/about')}}">About</a>
            </li>
            <li class="nav-item {{$url==='newest' ? 'active' : ''}}">
              <a class="nav-link" href="{{url('/newest')}}">Newest</a>
            </li>
            <li class="nav-item {{$url==='trending' ? 'active' : ''}}">
              <a class="nav-link" href="{{url('/trending')}}">Trending</a>
            </li>
            @auth
            <li class="nav-item {{$url==='following' ? 'active' : ''}}">
              <a class="nav-link" href="{{url('/following')}}">Following</a>
            </li>
            @endauth



            <!-- <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li> -->
          </ul>

          <ul class="nav navbar-nav social_media ml-auto w-100 justify-content-end">
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{url('profile/' . Auth::user()->username)}}">{{Auth::user()->username}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('logout')}}">Signout</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('settings')}}"><i class="fa fa-gears fa-lg fa-fw"></i></a>
            </li>
            @endauth

            @guest
            <li class="nav-item {{$url==='login' ? 'active' : ''}}">
              <a class="nav-link" href="{{url('/login')}}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" target="_blank" href="https://nl.linkedin.com/in/frits-oosterhoff"><i class="fa fa-linkedin fa-lg fa-fw"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" target="_blank" href="https://github.com/FritsOosterhoff/Techmatters"><i class="fa fa-github fa-lg fa-fw"></i></a>
            </li>
            @endguest

            <!-- <li class="nav-item">
              <a class="nav-link" target="_blank" href="https://laravel.com/"><i class="fab fa-laravel"></i></i></a>
            </li> -->
          </ul>

        </div>
      </div>
    </nav>
  </header>

  <main class="container py-5">


      @yield('content')

  </main>

  <footer class="footer py-5">
   <div class="container">
     <div class="row">
       <div class="col-12 col-md">
         <a class="navbar-brand mx-auto" href="#">Techmatters</a>
         <small class="d-block mb-3 ">© 2017-2018</small>
       </div>
       <!-- <div class="col-6 col-md">
         <h5>Features</h5>
         <ul class="list-unstyled text-small">
           <li><a class="" href="#">Cool stuff</a></li>
           <li><a class="" href="#">Random feature</a></li>
           <li><a class="" href="#">Team feature</a></li>
           <li><a class="" href="#">Stuff for developers</a></li>
           <li><a class="" href="#">Another one</a></li>
           <li><a class="" href="#">Last time</a></li>
         </ul>
       </div> -->
       <div class="col-6 col-md">
         <h5>Resources</h5>
         <ul class="list-unstyled text-small">
           <li><a class="" target="_blank" href="https://laravel.com/">Laravel</a></li>
           <li><a class="" target="_blank" href="https://jquery.com/">jQuery</a></li>
           <li><a class="" target="_blank" href="#">Another resource</a></li>
           <li><a class="" target="_blank" href="#">Final resource</a></li>
         </ul>
       </div>
       <!-- <div class="col-6 col-md">
         <h5>Resources</h5>
         <ul class="list-unstyled text-small">
           <li><a class="" href="#">Business</a></li>
           <li><a class="" href="#">Education</a></li>
           <li><a class="" href="#">Government</a></li>
           <li><a class="" href="#">Gaming</a></li>
         </ul>
       </div> -->
       <div class="col-6 col-md">
         <h5>About</h5>
         <ul class="list-unstyled text-small">
           <li><a class="" href="#">Team</a></li>
           <li><a class="" href="#">Locations</a></li>
           <li><a class="" href="#">Privacy</a></li>
           <li><a class="" href="#">Terms</a></li>
         </ul>
       </div>
     </div>
   </div>
 </footer>

 <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
 <script src="{{route('home')}}/js/index.js"></script>

   @stack('scripts')

   <script>

   function searchHandle(e, obj) {

     if (e.keyCode === 13) {
       //$("searchBox")
       var q = $(obj).val();

       window.location.href = "{{url('/')}}" + "/search/" + q;


     }
     return false;
   }


     window.onload = function(){
       if(document.getElementById("image-upload")){
         document.getElementById("image-upload").addEventListener("click", function(){
           document.getElementById("file-upload").click();
         });
       }
     }


     var loadFile = function(event) {
       var output = document.getElementById("image-upload");
       console.log(output);
       console.log(event.target.files[0]);

       //event.target.files[0].name
       output.src = URL.createObjectURL(event.target.files[0]);
     };

     function getCount(obj) {
       return (($(obj).text().length > 0) ? parseInt($(obj).text()) : 0);
     }

     function likePost(id) {
       span = $(".card #" + id + " span");
       icon = $(".card #" + id + " .fa");
       like_count = getCount($(".card #" + id + " span"));
       console.log(span);
       console.log(icon);
       console.log(like_count);

       if (!icon.hasClass('fa-heart')) {
         url = '{{url("like")}}';
         $(span).text(like_count + 1);
       } else {
         url = '{{url("removelike")}}';
         $(span).text(like_count > 1 ? (like_count - 1) : '');
       }

       console.log(url);
       console.log(id);
       $.ajax({
         type: "POST",
         url: url,
         data: {
           'likeable': id
         }
       });
     icon.toggleClass('fa-heart-o fa-heart');

     }

     function removePost(id) {
       $.ajax({
         type: "POST",
         url:   url = '{{url("removepost")}}',
         data: {
           'post_id': id
         },

         success: function(){
           window.location = '{{url('/')}}';
         },
       });

     }

     function followUser(id) {

       $.ajax({
         type: "POST",
         url: '{{url("followuser")}}',
         data: {
           'followable_id': id
         },
         success: function(){
           location.reload();
         },
       });

     }

     function unfollowUser(id) {
       $.ajax({
         type: "POST",
         url:   url = '{{url("unfollowuser")}}',
         data: {
           'followable_id': id
         },
         success: function(){
           location.reload();
         },
       });

     }


     $(document).ready(function(){
         console.log($('body'));
     });




   </script>


 <script src='https://getbootstrap.com/dist/js/bootstrap.min.js'></script>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
