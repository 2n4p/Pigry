<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
</head>

<body>
    <div class="register__step1">
        <h1>PiGLy</h1>
        <h3>新規会員登録</h3>
        <p>STEP1. アカウント情報の登録</p>
        <form action="/register/step1" method="post">
            @csrf

            {{-- お名前 --}}
            <label for="name">お名前</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror

            {{-- メールアドレス --}}
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <p>{{ $message }}</p>
            @enderror

            {{-- パスワード --}}
            <label for="password">パスワード</label>
            <input type="text" id="password" name="password" value="{{ old('password') }}">
            @error('password')
                <p>{{ $message }}</p>
            @enderror

            <button type="submit">次に進む</button>
        </form>
        <a href="/login">ログインはこちら</a>
    </div>
</body>

</html>