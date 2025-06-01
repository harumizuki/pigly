@extends('layouts.app')

@section('content')
<div class="container">
    <h2>体重編集フォーム</h2>

    <form action="{{ route('weights.update', $weightLog->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="date" class="form-label">日付</label>
            <input type="date" name="date" class="form-control" value="{{ $weightLog->date }}">
        </div>

        <div class="mb-3">
            <label for="weight" class="form-label">体重 (kg)</label>
            <input type="number" name="weight" class="form-control" step="0.1" value="{{ $weightLog->weight }}">
        </div>

        <div class="mb-3">
            <label for="calories" class="form-label">摂取カロリー</label>
            <input type="number" name="calories" class="form-control" value="{{ $weightLog->calories }}">
        </div>

        <div class="mb-3">
            <label for="exercise_time" class="form-label">運動時間 (分)</label>
            <input type="number" name="exercise_time" class="form-control" value="{{ $weightLog->exercise_time }}">
        </div>

        <div class="mb-3">
            <label for="exercise_content" class="form-label">運動内容</label>
            <textarea name="exercise_content" class="form-control">{{ $weightLog->exercise_content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">更新する</button>
        <a href="{{ route('weights.index') }}" class="btn btn-secondary">戻る</a>
    </form>
</div>
@endsection
