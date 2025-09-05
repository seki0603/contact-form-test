<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet" />
  @livewireStyles
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <h1 class="header__logo">FashionablyLate</h1>
      <form class="header__button" action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="header__button-link" type="submit">logout</button>
      </form>
    </div>
  </header>

  <main>
    <div class="content">
      <h2 class="content__title">Admin</h2>
    @livewire('admin-contacts')
    </div>
  </main>
  @livewireScripts
</body>

</html>