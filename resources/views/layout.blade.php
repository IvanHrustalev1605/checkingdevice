<!doctype html>
<html lang="ru" prefix="og: http://ogp.me/ns#">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="index, follow"><link rel="canonical" href="https://bootstrap5.ru/examples/dashboard" />
<meta name="description" content="Базовая оболочка панели администратора с фиксированной боковой панелью и навигационной панелью.">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors, Alexey Golyagin">
<meta name="docsearch:language" content="ru">
<meta name="docsearch:version" content="5.0">

  
<title>Модуль поверок</title>
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<link rel="stylesheet" href="https://bootstrap5.ru/css/docs.css">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src = "https://unpkg.com/@popperjs/core@2"></script>
<script>
function openNav() {
  document.getElementById("sidebarMenu").style.height = "100%";
}

/* Закрыть */
function closeNav() {
  document.getElementById("sidebarMenu").style.height = "0%";
}
      </script>
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
  rel="stylesheet"
/>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- Favicons -->
<link rel="apple-touch-icon" href="https://bootstrap5.ru/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="https://bootstrap5.ru/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="https://bootstrap5.ru/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="https://bootstrap5.ru/img/favicons/manifest.json">
<link rel="mask-icon" href="https://bootstrap5.ru/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="https://bootstrap5.ru/img/favicons/favicon.ico">
<link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css”/>
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;


      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      @media (min-width: 700px) {
     .prose {display: block;}
}



  </style>
    
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/public/css/footer.css">
    <link rel="stylesheet" href="/public/css/nav.css">
    <link rel="stylesheet" href="/public/css/navMain.css">
    <link rel="stylesheet" href="/public/css/selectDivice.css">
    <link rel="stylesheet" href="/public/css/mainLogo.css">
    <link rel="stylesheet" href="/public/css/dashboard.css">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/userpage.css">
    <link href="/public/css/examples/dashboard.css" rel="stylesheet"></head>
<body>


<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <div class="navbar navbar-dark">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="https://ergogaz.ru/">{{Auth::user()->organisation->name}}</a>
      <a class="nav-link" href="{{route('logout')}}">Выйти</a>
      </div>
</nav>
<div class="container-fluid">
  <div class="row">
  <div class="openNav btn btn-info" onclick="openNav()">Меню</div>
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-block bg-light sidebar collapse nav-left">
      <div class="position-sticky pt-3">
      
     
        <ul id="nav-ul" class="nav flex-column">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <li class="nav-item">
            
            <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">
              <span data-feather="home"></span>
               Личный кабинет организации
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('userIndex', Auth::user()->uid)}}">
              <span data-feather="home"></span>
               Личный кабинет сотрудника
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('AllUsersIndex')}}">
              <span data-feather="home"></span>
               Все сотрудники
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('PriboriIndex')}}">
              <span data-feather="file"></span>
              Приборы
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('OderIndex')}}">
              <span data-feather="file"></span>
              Заказы
            </a>
          </li>
          @if((Auth::user()->is_admin) == 1 ||(Auth::user()->is_accounter) == 1 )
          <li class="nav-item">
            <a class="nav-link" href="{{route('AccountingIndex')}}">
              <span data-feather="bar-chart-2"></span>
              Бухгалтерия
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{route('VerifierIndex')}}">
              <span data-feather="bar-chart-2"></span>
              Поверители
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('ObjectsIndex')}}">
              <span data-feather="bar-chart-2"></span>
              Объекты
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ml-sm-auto col-lg-10 mx-auto p-1"> 
    <div class="prose">
    @yield('content') 
    </div>
    </div>
 
 </main>  
 <footer class="footer">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022
    <a class="text-dark" href="https://ergogaz.ru/">ООО "ЭргоГазМонтаж</a>
  </div>
  <!-- Copyright -->
</footer>  
</div>
<script src="https://unpkg.com/@popperjs/core@2.0.0-rc.1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){ dataLayer.push(arguments); }
  gtag('js', new Date());

  gtag('config', 'UA-179173139-1');
  
</script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
<script src="app.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" integrity="sha384-EbSscX4STvYAC/DxHse8z5gEDaNiKAIGW+EpfzYTfQrgIlHywXXrM9SUIZ0BlyfF" crossorigin="anonymous"></script>       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha384-i+dHPTzZw7YVZOx9lbH5l6lP74sLRtMtwN2XjVqjf3uAGAREAF4LMIUDTWEVs4LI" crossorigin="anonymous"></script> 	  <script src="/css/examples/dashboard.js"></script><!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-179173139-1"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 

</body>
</html>