@extends('layouts.app')

@section('title', '目標体重設定')

@section('content')
    <div class="change_target-weight">
        <h3>目標体重設定</h3>
        <form action="{{ route('weight.change') }}" method="post">
            @csrf
            <input type="text" name="target_weight" id="target_weight" value="{{ old('target_weight') }}">
            @error('target_weight')
                <p style="color:red;">{{ $message }}</p>
            @enderror

            <div class="form__button">
                <a class="form__button-back" href="{{ route('weight.index') }}">戻る</a>
                <button class="form__button-submit" type="submit">更新</button>
            </div>
        </form>
    </div>
@endsection