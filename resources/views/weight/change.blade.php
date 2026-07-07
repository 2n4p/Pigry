<x-app>
    <div class="change_target-weight">
        <h3>目標体重設定</h3>
        <form action="/weight_logs/goal_setting" method="post">
            @method('PATCH')
            @csrf
            <input type="number" step="0.1" name="weight_target" id="weight_target" value="{{ old('weight') }}">
            <div class="form__button">
                <a class="form__button-back" href="/weight_logs">戻る</a>
                <button class="form__button-submit" type="submit">更新</button>
            </div>
        </form>
    </div>
</x-app>