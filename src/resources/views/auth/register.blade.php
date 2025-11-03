<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dictionary</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <header class="header">
        <div class="header-inner">
            <div class="header-logo">
                新規登録画面
            </div>
        </div>
    </header>
    <main class="main">
        <div class="main-inner">
            <form class="register-form" action="/register" method="post">
                @csrf
                <div class="form-content">
                    <div class="form-content__name">
                        名前
                    </div>
                    <div class="form-content__name-input">
                        <input type="text" name="name" value="{{ old('name') }}"/>
                    </div>
                </div>
                <div class="error-message">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-content">
                    <div class="form-content__name">
                        メールアドレス
                    </div>
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
                    <div class="form-content__name">
                        パスワード
                    </div>
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
                    <div class="form-content__name">
                        確認用パスワード
                    </div>
                    <div class="form-content__name-input">
                        <input type="password" name="password_confirmation"/>
                    </div>
                </div>
                <div class="form-content">
                    <div class="form-content__button">
                        <button class="form-content__button-submit" type="submit">
                            新規登録
                        </button>
                    </div>
                </div>
            </form>
            <div class="login-link">
                <a class="login-link__button" href="/login">
                    ログイン画面へ
                </a>
            </div>
        </div>
    </main>
</body>