<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '体重管理' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @auth
        <x-header />
    @endauth

    <main>
        {{ $slot }}
    </main>

</body>

</html>