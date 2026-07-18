<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>

<body>
    <div class="login">
        <h1>PiGly</h1>
        <h3>ログイン</h3>
        <form action="{{ route('login') }}" method="post" novalidate>
            @csrf
            {{-- メールアドレス --}}
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <p style="color:red;">{{ $message }}</p>
            @enderror

            {{-- パスワード --}}
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}">
            @error('password')
                <p style="color:red;">{{ $message }}</p>
            @enderror

            <button type="submit">ログイン</button>
        </form>
        <a href="/register/step1">アカウント作成はこちら</a>
    </div>
</body>

</html>