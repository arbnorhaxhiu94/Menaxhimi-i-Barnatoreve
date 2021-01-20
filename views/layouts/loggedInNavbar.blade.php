<!-- As a heading -->
<style type="text/css">

    #main_navbar {
      z-index: 1;
      color: white;
      background-color: transparent;
    }

    /*#main_navbar:hover{
      background-color: white;
      cursor: pointer;
    }*/


    #sidebarCollapse {
        width: 40px;
        height: 40px;
        border: none;
        background-color: transparent;
        outline: none;
    }

    .sidenav {
        width: 300px;
        height: 100%;
        position: fixed;
        z-index: 2;
        left: -300px;
        background: #eee;
        overflow-x: hidden;
        padding: 8px 0;
    }

    #close_button {
      border: none;
      width: 40px;
      height: 40px;
      float: right;
      outline: none;
    }

    .sidebar_link:hover {
        color: gray;
    }

    .sidebar_link{
      padding: 0px 8px 0px 16px;
      text-decoration: none;
      color: black;
      display: block;
      font-size: 16px;
    }

    hr {
      width: 90%;
      border: 0.5px solid gray;
    }

</style>

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', e =>  {
    document.getElementById("main_navbar").addEventListener("mouseenter", mouseEnter);
    document.getElementById("main_navbar").addEventListener("mouseleave", mouseLeave);

    function mouseEnter() {
      document.getElementById("main_navbar").style.backgroundColor = "white";
      document.getElementById("main_navbar").style.cursor = "pointer";
    }

    function mouseLeave() {
      document.getElementById("main_navbar").style.backgroundColor = "transparent";
    }
  })
    window.onscroll = function changeNavcolor() {
      if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById('main_navbar').style.backgroundColor = 'white'
      }
      else {
        document.getElementById('main_navbar').style.backgroundColor = 'transparent'
      }
    }
    

    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('.sidenav').animate({
              left: '0px'
            });
        });

        $('#close_button').on('click', function () {
            $('.sidenav').animate({
              left: '-300px'
            });
        });

        
    });


    

</script>
<div class="sidenav">
    <span style="width: 100%"><button id="close_button">
        <i class="fas fa-times"></i>
      </button>
    </span>
    <br><br>
    <a href="{{ url('/admin/dashboard') }}" class="sidebar_link">FAQJA KRYESORE</a><hr>
    <a href="{{ url('/admin/barnatoret') }}" class="sidebar_link">PIKAT E PUNES</a><hr>
    <a href="{{ url('/admin/punetoret') }}" class="sidebar_link">PUNETORET</a><hr>
    <a href="{{ url('/admin/depo') }}" class="sidebar_link">DEPO</a><hr>
</div>

<nav class="navbar transparent fixed-top navbar-light" id="main_navbar">
  <span>
    @if(Auth::user()->role_id == 1 )
    <button type="button" id="sidebarCollapse" class="navbar-btn transparent" >
        <i class="fas fa-bars" id="sidebar_button" ></i>
    </button>
    @endif
  </span>
    
  <a href="{{ url('/admin/dashboard') }}"><span id="yummi_pizza" class="navbar-brand mb-0 h1">A-PHARM</span></a>
  <span class="navbar-text">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre >
          {{ Auth::user()->username }} <span class="caret"></span>
      </a>

      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </div>
  </span>
</nav>
