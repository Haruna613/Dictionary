<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dictionary</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <header class="header">
        <div class="header-inner">
            <div class="header-logo">
                ログイン画面
            </div>
        </div>
    </header>
    <main class="main">
        <div class="main-inner">
            <form class="login-form" action="/login" method="post">
                @csrf
                <div class="form-content">
                    <span class="form-content__name">
                        メールアドレス
                    </span>
                    <div class="form-content__name-input">
                        <input type="email" name="email" value="{{ old ('email') }}"/>
                    </div>
                </div>
                <div class="error-message">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-content">
                    <span class="form-content__name">
                        パスワード
                    </span>
                    <div class="form-content__name-input">
                        <input type="password" name="password"/>
                    </div>
                </div>
                <div class="error-message">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-content">
                    <div class="form-content__button">
                        <button class="form-content__button-submit" type="submit">
                            ログイン
                        </button>
                    </div>
                </div>
            </form>
            <div class="register-link">
                <a class="register-link__button" href="/register">
                    新規登録画面へ
                </a>
            </div>
        </div>
    </main>
</body>