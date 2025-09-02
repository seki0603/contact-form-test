<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/auth.css')}}" />
  <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet" />
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <h1 class="header__logo">FashionablyLate</h1>
      <form class="header__button" action="">
        <button class="header__button-link">login</button>
      </form>
    </div>
  </header>

  <main>
    <div class="content">
      <h2 class="content__title">Register</h2>
      <div class="form__wrapper">
        <form class="form" action="">
          <div class="form__inner">
            <div class="form__item">
              <label class="form__item-title">お名前</label>
              <input class="form__item-input" type="text" placeholder="例: 山田　太郎" />
            </div>
            <div class="form__item">
              <label class="form__item-title">メールアドレス</label>
              <input class="form__item-input" type="text" placeholder="例: test@example.com" />
            </div>
            <div class="form__item">
              <label class="form__item-title">パスワード</label>
              <input class="form__item-input" type="text" placeholder="例: coachtech1106" />
            </div>
          </div>
          <div class="form__button">
            <button class="form__button-submit" type="submit">登録</button>
          </div>
        </form>
      </div>
    </div>
  </main>

</body>

</html>