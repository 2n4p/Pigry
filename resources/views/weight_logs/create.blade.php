@extends('layouts.app')

@section('title', '体重ログ作成')

@section('content')
    <div class="create">
        <h3>Weight Logを追加</h3>
        <form class="create-form" action="{{ route('weight.store') }}" method="post">
            @csrf

            {{-- 日付 --}}
            <div class="log-date">
                <label for="date">日付</label>
                <input type="date" name="date" id="date" value="{{ old('date') }}">
                @error('date')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- 体重 --}}
            <div class="log-weight">
                <label for="weight">体重</label>
                <input type="text" name="weight" id="weight" value="{{ old('weight') }}">kg
                @error('weight')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- 摂取カロリー --}}
            <div class="log-calories">
                <label for="calories">摂取カロリー</label>
                <input type="text" name="calories" id="calories" value="{{ old('calories') }}">cal
                @error('calories')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- 運動時間 --}}
            <div class="log-time">
                <label for="time">運動時間</label>
                <input type="time" name="time" id="exercise_time" value="{{ old('time') }}">
                @error('time')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- 運動内容 --}}
            <div class="log-content">
                <label for="content"></label>
                <input type="text" name="content" id="content" value="{{ old('content') }}">
                @error('content')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            <button class="search-form__button-submit" type="submit">登録</button>
            <a class="search-form__button-reset" href="{{ route('weight.index') }}">戻る</a>
        </form>
    </div>
@endsection