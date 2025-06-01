@extends('layouts.app') {{-- 認証なしならこの行は削除OK --}}

@section('content')
<div class="container">
    <h1>体重を記録</h1>

    <form action="{{ route('weights.store') }}" method="POST">
        @csrf
        <div>
            <label>日付:</label>
            <input type="date" name="date" value="{{ old('date') }}">
            @error('date') <div style="color:red;">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>体重 (kg):</label>
            <input type="number" step="0.1" name="weight" value="{{ old('weight') }}">
            @error('weight') <div style="color:red;">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>カロリー:</label>
            <input type="number" name="calories" value="{{ old('calories') }}">
        </div>

        <div>
            <label>運動時間 (分):</label>
            <input type="number" name="exercise_time" value="{{ old('exercise_time') }}">
        </div>

        <div>
            <label>運動内容:</label>
            <input type="text" name="exercise_content" value="{{ old('exercise_content') }}">
        </div>

        <button type="submit">記録する</button>
    </form>
</div>
@endsection
