<x-app>
    <div class="create">
        <h3>Weight Logを追加</h3>
        <form class="create-form" action="{{ route('weight_logs.create') }}" method="post">
            @csrf

            {{-- 日付 --}}
            <div class="log-date">
                <label for="date">日付</label>
                <input type="date" name="date" id="date" value="{{ old('date') }}">
            </div>

            {{-- 体重 --}}
            <div class="log-weight">
                <label for="weight">体重</label>
                <input type="number" step="0.1" name="weight" id="weight" value="{{ old('weight') }}">kg
            </div>

            {{-- 摂取カロリー --}}
            <div class="log-calories">
                <label for="calories">摂取カロリー</label>
                <input type="number" name="calories" id="calories" value="{{ old('calories') }}">cal
            </div>

            {{-- 運動時間 --}}
            <div class="log-time">
                <label for="time">運動時間</label>
                <input type="time" name="time" id="exercise_time" value="{{ old('time') }}">
            </div>

            {{-- 運動内容 --}}
            <div class="log-content">
                <label for="content"></label>
                <input type="text" name="content" id="exercise_content" value="{{ old('content') }}">
            </div>
        </form>
    </div>
</x-app>