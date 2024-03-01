<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <x-links />
</head>

<body>

  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
      <img src="/img/logo.png" style="width: 50px; height:50px; margin-left: 40px; border-radius:50%;">
      <h2 style="padding-left:20px; color:#263248;" class="text-danger">БлокНовости</h2>
    </a>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="/" class="nav-link px-2 link-secondary">Главная</a></li>


    </ul>
    @auth
    <div class="col-md-3 text-end">
      @if (Auth::user()->role == 1)
      <a href="/personalcub" class="btn btn-outline-danger me-2 button_reg">Личный кабинет</a>
      @else
      <a href="/admin/index" class="btn btn-outline-danger me-2 button_reg">Админ панель</a>
      @endif
      <a href="/signout" class="btn btn-outline-warning button_auth" style="margin-right: 40px;">Выйти</a>
    </div>
    @endauth
    @guest
    <div class="col-md-3 text-end">
      <a href="/auth" class="btn btn-outline-danger me-2 button_reg">Вход</a>
      <a href="/register" class="btn btn-danger button_auth" style="margin-right: 40px;">Регистрация</a>
    </div>
    @endguest
  </header>