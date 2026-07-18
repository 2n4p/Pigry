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
        <p>STEP2. 体重データの入力</p>
        <form action="/register/step2" method="post">
            @csrf

            {{-- 現在の体重 --}}
            <label for="current">現在の体重</label>
            <input type="text" name="current" id="current" value="{{ old('current') }}">kg
            @error('current')
                <p style="color:red;">{{ $message }}</p>
            @enderror

            {{-- 目標の体重 --}}
            <label for="target">目標の体重</label>
            <input type="text" name="target" id="target" value="{{ old('target') }}">kg
            @error('target')
                <p style="color:red;">{{ $message }}</p>
            @enderror

            <button type="submit">アカウント作成</button>
        </form>
    </div>
</body>

</html>