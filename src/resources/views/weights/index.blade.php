@extends('layouts.app')

@section('content')
<div class="container">
    <h2>体重記録一覧</h2>

    {{-- 成功メッセージ --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- 新規登録ボタン --}}
    <a href="{{ route('weights.create') }}" class="btn btn-primary mb-3">新規登録</a>

    {{-- 一覧テーブル --}}
    <table class="table">
        <thead>
            <tr>
                <th>日付</th>
                <th>体重</th>
                <th>カロリー</th>
                <th>運動時間</th>
                <th>運動内容</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weightLogs as $weightLog)
                <tr>
                    <td>{{ $weightLog->date }}</td>
                    <td>{{ $weightLog->weight }}</td>
                    <td>{{ $weightLog->calories }}</td>
                    <td>{{ $weightLog->exercise_time }}</td>
                    <td>{{ $weightLog->exercise_content }}</td>
                    <td>
                        {{-- 編集ボタン --}}
                        <a href="{{ route('weights.edit', $weightLog->id) }}" class="btn btn-warning btn-sm">編集</a>

                        {{-- 削除ボタン --}}
                        <form action="{{ route('weights.destroy', $weightLog->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('本当に削除しますか？')">
                                削除
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
