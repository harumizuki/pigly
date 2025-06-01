<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;

class WeightController extends Controller
{
    /**
     * 一覧表示
     */
    public function index()
    {
        $weightLogs = WeightLog::all();
        return view('weights.index', compact('weightLogs'));
    }

    /**
     * 登録画面の表示
     */
    public function create()
    {
        return view('weights.create');
    }

    /**
     * 登録処理
     */
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'date' => 'required|date',
            'weight' => 'required|numeric',
            'calories' => 'nullable|numeric',
            'exercise_time' => 'nullable',
            'exercise_content' => 'nullable|string',
        ]);

        // 保存
        WeightLog::create($validated);

        // 一覧画面にリダイレクト
        return redirect()->route('weights.index')->with('success', '体重を記録しました！');
    }

    /**
     * 編集画面の表示
     */
    public function edit(string $id)
    {
        $weightLog = WeightLog::findOrFail($id);
        return view('weights.edit', compact('weightLog'));
    }

    /**
     * 更新処理
     */
    public function update(Request $request, string $id)
    {
        // バリデーション
        $validated = $request->validate([
            'date' => 'required|date',
            'weight' => 'required|numeric',
            'calories' => 'nullable|numeric',
            'exercise_time' => 'nullable',
            'exercise_content' => 'nullable|string',
        ]);

        // 更新処理
        $weightLog = WeightLog::findOrFail($id);
        $weightLog->update($validated);

        // リダイレクト
        return redirect()->route('weights.index')->with('success', '更新しました！');
    }

    public function show(string $id) { /* 未実装 */ }

    /**
     * 削除（次のタスク用）
     */
    public function destroy(string $id) { $weightLog = WeightLog::findOrFail($id);
    $weightLog->delete();

    return redirect()->route('weights.index')->with('success', '削除しました！');
} }

