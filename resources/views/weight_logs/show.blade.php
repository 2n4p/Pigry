@extends('layouts.app')

@section('title', '体重ログ詳細')

@section('content')
    <div class="log-detail">
        <h3>Weight Log</h3>
        <form action="{{ route('weight.update', $log->id) }}" method="post">
            @csrf
            @method('PUT')

            {{-- 日付 --}}
            <div class="log-date">
                <label for="date">日付</label>
                <input type="date" name="date" id="date" value="{{ old('date'), $log->date }}">
                @error('date')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- 体重 --}}
            <div class="log-weight">
                <label for="weight">体重</label>
                <input type="text" name="weight" id="weight" value="{{ old('weight'), $log->weight }}">kg
                @error('weight')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- 摂取カロリー --}}
            <div class="log-calories">
                <label for="calories">摂取カロリー</label>
                <input type="text" name="calories" id="calories" value="{{ old('calories'), $log->calories }}">cal
                @error('calories')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- 運動時間 --}}
            <div class="log-time">
                <label for="time">運動時間</label>
                <input type="time" name="time" id="exercise_time" value="{{ old('time'), $log->exercise_time }}">
                @error('time')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- 運動内容 --}}
            <div class="log-content">
                <label for="content"></label>
                <input type="text" name="content" id="exercise_content" value="{{ old('content'), $log->exercise_content }}">
                @error('content')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            <button class="search-form__button-submit" type="submit">更新</button>
            <a class="search-form__button-reset" href="/weight_logs">戻る</a>
            <form action="{{ route('weight.destroy', $log->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">
                    削除
                </button>
            </form>
        </form>
    </div>
@endsection