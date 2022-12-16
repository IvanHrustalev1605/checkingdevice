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
<!-- Favicons -->
<link rel="apple-touch-icon" href="https://bootstrap5.ru/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="https://bootstrap5.ru/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="https://bootstrap5.ru/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="https://bootstrap5.ru/img/favicons/manifest.json">
<link rel="mask-icon" href="https://bootstrap5.ru/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="https://bootstrap5.ru/img/favicons/favicon.ico">
<link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css”/>
<meta name="theme-color" content="#7952b3">
<!-- Facebook -->
<meta property="og:url" content="https://bootstrap5.ru/examples/dashboard">
<meta property="og:title" content="Модуль поверок">
<meta property="og:description" content="Базовая оболочка панели администратора с фиксированной боковой панелью и навигационной панелью.">
<meta property="og:type" content="website">
<meta property="og:image" content="https://bootstrap5.ru/img/examples/dashboard.png">
<meta property="og:image:type" content="">
<meta property="og:image:width" content="1000">
<meta property="og:image:height" content="500">
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
    </style>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/nav.css">
    <link rel="stylesheet" href="/css/navMain.css">
    <link rel="stylesheet" href="/css/selectDivice.css">
    <link rel="stylesheet" href="/css/mainLogo.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link href="/css/examples/dashboard.css" rel="stylesheet"></head>
<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <div class="navbar navbar-dark">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="https://ergogaz.ru/">{{Auth::user()->organisation->name}}</a>
      <a class="nav-link" href="{{route('logout')}}">Выйти</a>
      </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">
              <span data-feather="home"></span>
               Личный кабинет организации
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('PriboriIndex')}}">
              <span data-feather="file"></span>
              Приборы
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('AccountingIndex')}}">
              <span data-feather="bar-chart-2"></span>
              Бухгалтерия
            </a>
          </li>
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

    <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4"> 
      <div>
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
<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){ m[i]=m[i]||function(){ (m[i].a=m[i].a||[]).push(arguments) }; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(67718821, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/67718821" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
<script src="app.js"></script>


</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" integrity="sha384-EbSscX4STvYAC/DxHse8z5gEDaNiKAIGW+EpfzYTfQrgIlHywXXrM9SUIZ0BlyfF" crossorigin="anonymous"></script>       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha384-i+dHPTzZw7YVZOx9lbH5l6lP74sLRtMtwN2XjVqjf3uAGAREAF4LMIUDTWEVs4LI" crossorigin="anonymous"></script> 	  <script src="/css/examples/dashboard.js"></script><!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-179173139-1"></script>

</body>
</html>