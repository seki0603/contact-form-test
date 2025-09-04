<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/auth.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet" />
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <h1 class="header__logo">FashionablyLate</h1>
      <div class="header__button">
        <a class="header__button-link" href="{{ route('register') }}">register</a>
      </div>
    </div>
  </header>

  <main>
    <div class="content">
      <h2 class="content__title">Login</h2>
      <div class="form__wrapper">
        <form class="form" action="{{ route('login') }}" method="POST">
          @csrf
          <div class="form__inner">
            <div class="form__item">
              <label class="form__item-title">メールアドレス</label>
              <input class="form__item-input" type="text" name="email" placeholder="例: test@example.com" />
              <div class="error">
                @error('email')
                    {{ $message }}
                @enderror
              </div>
            </div>
            <div class="form__item">
              <label class="form__item-title">パスワード</label>
              <input class="form__item-input" type="password" name="password" placeholder="例: coachtech1106" />
              <div class="error">
                @error('password')
                    {{ $message }}
                @enderror
              </div>
            </div>
          </div>
          <div class="form__button">
            <button class="form__button-submit" type="submit">ログイン</button>
          </div>
        </form>
      </div>
    </div>
  </main>

</body>

</html>