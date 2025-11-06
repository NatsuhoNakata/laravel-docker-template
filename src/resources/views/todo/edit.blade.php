@extends('layouts.base')  <!-- 親テンプレートを指定 -->
@section('content')  <!-- sectionの開始 -->
<form method="POST" action="{{ route('todo.update', $todo->id) }}"> <!-- action属性を追加 -->
  @csrf
  @method('PUT') <!-- ここを追加 -->
  <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">ToDo入力</label>
    <div class="col-md-6">
      <input type="text" class="form-control" name="content" value="{{ $todo->content }}">
    </div>
  </div>
  <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
    <input type="text" class="form-control @if($errors->has('content')) border-danger @endif" name="content" value="{{ $todo->content }}">
    @if($errors->has('content'))
      <span class="text-danger">{{ $errors->first('content') }}</span>
    @endif
      <button type="submit" class="btn btn-primary">更新</button>
    </div>
  </div>
</form>
@endsection