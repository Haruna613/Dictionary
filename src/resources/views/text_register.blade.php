<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dictionary</title>
    <link rel="stylesheet" href="{{ asset('css/text_register.css') }}">
</head>
<body>
    <header class="header">
        <div class="header-inner">
            <div class="header-logo">
                登録画面
            </div>
            <a class ="header-link" href="/">
                検索画面へ
            </a>
        </div>
    </header>

    <main class="main">
        <div class="main-inner">

            <div class="main-content">
                <form class="form-register" action="/" method="post">
                    @csrf
                    <div class="form-register__input">
                        <input class="form-register__input-keyword" type="text" name="keyword" value="{{ old('keyword') }}" placeholder="キーワード">
                        <div class="error-message">
                        @error('keyword')
                        {{ $message }}
                        @enderror
                        </div>
                        <textarea class="form-register__input-description" name="description" cols="30" rows="20" value="{{ old('description') }}" placeholder="説明"></textarea>
                        <div class="error-message">
                        @error('description')
                        {{ $message }}
                        @enderror
                        </div>
                    </div>
                    <div class="form-register__button">
                        <button class="form-register__button-submit" type="submit">
                            登録
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>