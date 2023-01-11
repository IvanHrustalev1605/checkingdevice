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
    <link rel="stylesheet" href="/public/css/footer.css">
    <link rel="stylesheet" href="/public/css/nav.css">
    <link rel="stylesheet" href="/public/css/navMain.css">
    <link rel="stylesheet" href="/public/css/selectDivice.css">
    <link rel="stylesheet" href="/public/css/mainLogo.css">
    <link href="/public/css/examples/dashboard.css" rel="stylesheet"></head>
<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="img/Ilon.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <form action="{{route('ResetPassword')}}" method="POST">
              {{csrf_field()}}
              <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="underlined underline-clip">Made on Earth by humans</span>
                  </div>
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Заполните email для восстановления пароля</h5>
                  @include('errors.validErrors')
                  <div class="form-outline mb-4">
                    <input type="email" id="form2Example17" name = "email" class="form-control form-control-lg" />
                    <label class="form-label"  for="form2Example17">Email</label>
                  </div>
                  <div class="pt-1 mb-4">     
                     <button type="submit" class="btn btn-info">Восстановить пароль</button><hr>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>