<?php

namespace App\Http\Controllers;



use App\Http\Requests\TodoRequest;

use App\Todo;

class TodoController extends Controller
{
    private $todo; 

    public function __construct(Todo $todo)
    {
        $this->todo = $todo; 

    }

    public function index()
    {
        $todos = $this->todo->all();

    return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create'); 
    }

    public function store(TodoRequest $request) 
{
    $inputs = $request->all(); 
    $this->todo->fill($inputs); 
    $this->todo->save(); 
    return redirect()->route('todo.index'); 
}

public function show($id)
{
    $todo = $this->todo->find($id);
    return view('todo.show', ['todo' => $todo]);
}

public function update(TodoRequest $request, $id)
{
    // リクエストで送られたデータをすべて取得
    $inputs = $request->all();

    // 更新対象のデータを取得（idが一致するTodoレコード）
    $todo = Todo::find($id);

    // 更新したい値を代入し、DBに反映
    $todo->fill($inputs);
    $todo->save();

    // 更新後、詳細画面にリダイレクト
    return redirect()->route('todo.show', $todo->id);
}

public function edit($id)
{
    // 編集対象のレコード（idが一致するもの）を取得
    $todo = Todo::find($id);

    // todo.editビューにデータを渡して表示
    return view('todo.edit', compact('todo'));
}

public function rules()
{
    return [
        'content' => 'required|max:255',
    ];
}

// 追加
public function messages()
{
    return [
        // 入力欄のname属性.ルール => メッセージ
        'content.required' => 'ToDoが入力されていません。',
        'content.max' => 'ToDoは :max 文字以内で入力してください。',
    ];
}

public function delete($id)
{
    // 指定されたIDのToDoを取得（見つからなければ404エラー）
    $todo = Todo::findOrFail($id);

    // ToDoを削除
    $todo->delete();

    // 削除後に一覧ページへリダイレクト
    return redirect()->route('todo.index')->with('success', 'ToDoを削除しました。');
}


}
