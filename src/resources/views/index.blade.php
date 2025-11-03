<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dictionary</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <header class="header">
        <div class="header-inner">
            <div class="header-logo">
                検索画面
            </div>
            <a class ="header-link" href="/dictionaries/register">
                登録画面へ
            </a>
            @if (Auth::check())
            <div class="logout">
                <form class="logout-form" action="/logout" method="post">
                    @csrf
                    <button class="logout-form__button">
                        ログアウト
                    </button>
                </form>
            </div>
            @endif
        </div>
    </header>
    <main class="main">
        <div class="main-inner">

            <div class="main-header">
                <form class="form-search" action="/dictionaries/search" method="get">
                    @csrf
                    <div class="form-search__input">
                        <input class="form-search__input-name" type="text" name="text" value="{{ old('text') }}"/>
                        <div class="error-message">
                        @error('keyword')
                        {{ $message }}
                        @enderror
                    </div>
                    </div>
                    <div class="form-search__button">
                        <button class="form-search__button-submit" type="submit">
                        検索
                        </button>
                    </div>
                </form>
            </div>

            @foreach ($dictionaries as $dictionary)
            <div class="main-content">
                <table class="dictionary-table">
                    <tr class="dictionary-table__inner">
                        <td class="dictionary-table__inner-date">
                            {{ $dictionary->created_at->format('Y/m/d') }}
                        </td>
                        <td class="dictionary-table__inner-update">
                            <form class="dictionary-table__form-update" action="/dictionaries/update" method="post">
                                @method('PATCH')
                                @csrf
                                <div class="dictionary-table__form-input">
                                    <input class="dictionary-table__form-keyword" type="text" name="keyword" value="{{ $dictionary['keyword'] }}">
                                    <input class="dictionary-table__form-description" type="text" name="description" value="{{ $dictionary['description'] }}">
                                    <input type="hidden" name="id" value="{{ $dictionary['id'] }}">
                                </div>
                                <div class="dictionary-table__update-button">
                                    <button class="dictionary-table__update-submit"type="submit">
                                        更新
                                    </button>
                                </div>
                            </form>
                        </td>
                        <td class="dictionary-table__inner-delete">
                            <form class="dictionary-table__form-delete" action="/dictionaries/delete" method="post">
                                @method('DELETE')
                                @csrf
                                <div class="dictionary-table__delete-button">
                                    <input type="hidden" name="id" value="{{ $dictionary['id'] }}">
                                    <button class="dictionary-table__delete-submit"type="submit">
                                        削除
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
            @endforeach
        </div>
        <style>
            svg.w-5.h-5 {
                width: 30px;
                height: 30px;
            }
        </style>
        {{ $dictionaries->links() }}
    </main>
</body>
</html>