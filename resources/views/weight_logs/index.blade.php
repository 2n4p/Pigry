@extends('layouts.app')

@section('title', '体重一覧')

@section('header')
    <header>
        <div class="header">
            <h1 class="header_title">Pigry</h1>
            <a href="{{ route('weight.goal') }}">目標体重設定</a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">
                    ログアウト
                </button>
            </form>
        </div>
    </header>
@endsection

@section('content')
    {{-- 体重表示 --}}
    <div class="weight-list">
        <table>
            <tr>
                <th>目標体重</th>
                <th>目標まで</th>
                <th>最新体重</th>
            </tr>
            <tr>
                <td>{{ $target->target_weight }}</td>
                <td>{{ $weight_difference }}</td>
                <td>{{ $latest_weight->weight }}</td>
            </tr>
        </table>
    </div>

    {{-- ログ表示 --}}
    <div class="logs">
        <div class="logs-search">
            <form class="search-form" action="{{ route('weight.search') }}" method="get">
                @csrf
                <div class="search-form__item">
                    <input class="search-form__item-date1" type="date" name="firstdate" value="{{ old('firstdate') }}">
                    ~
                    <input class="search-form__item-date2" type="date" name="lastdate" value="{{ old('lastdate') }}">
                </div>
                <div class="search-form__button">
                    <button class="search-form__button-submit" type="submit">検索</button>
                    <a class="search-form__button-reset" href="{{ route('weight.index') }}">リセット</a>
                </div>
            </form>
        </div>

        <div class="create-button">
            <a class="create-button" href="{{ route('weight.create') }}">データ追加</a>
        </div>

        <div class="logs-main">
            <table>
                <tr>
                    <th>日付</th>
                    <th>体重</th>
                    <th>食事摂取カロリー</th>
                    <th>運動時間</th>
                    <th>　</th>
                </tr>
                @foreach( $logs as $log )
                    <tr>
                        <td>{{ $log->date }}</td>
                        <td>{{ $log->weight }}</td>
                        <td>{{ $log->calories }}</td>
                        <td>{{ $log->exercise_time }}</td>
                        <td>
                            <!-- <a href="{{ route('weight.show', $log) }}">編集</a> -->
                            <form action="{{ route('weight.show', $log->id) }}" method="get">
                                @csrf
                                <button type="submit">編集</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection