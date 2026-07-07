<x-app>
    <div class="log-detail">
        <h3>Weight Log</h3>
        <form action="{{ route('weight_logs.update'), $log }}" method="post">
            @csrf
            @method('PUT')
            
            {{-- 日付 --}}
            <div class="log-date">
                <label for="date">日付</label>
                <input type="date" name="date" id="date" value="{{ old('date'), $log->date }}">
            </div>

            {{-- 体重 --}}
            <div class="log-weight">
                <label for="weight">体重</label>
                <input type="number" step="0.1" name="weight" id="weight" value="{{ old('weight'), $log->weight }}">kg
            </div>

            {{-- 摂取カロリー --}}
            <div class="log-calories">
                <label for="calories">摂取カロリー</label>
                <input type="number" name="calories" id="calories" value="{{ old('calories'), $log->calories }}">cal
            </div>

            {{-- 運動時間 --}}
            <div class="log-time">
                <label for="time">運動時間</label>
                <input type="time" name="time" id="exercise_time" value="{{ old('time'), $log->exercise_time }}">
            </div>

            {{-- 運動内容 --}}
            <div class="log-content">
                <label for="content"></label>
                <input type="text" name="content" id="exercise_content" value="{{ old('content'), $log->exercise_content }}">
            </div>
        </form>
    </div>
</x-app>