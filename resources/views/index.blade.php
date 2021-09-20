<!DOCTYPE html>
<html lang="jp">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TodoList</title>
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
  </head>
  <body>
    <div class="contents-outer">
      <h1>Todo List</h1>
      @if (count($errors) > 0)
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      @endif
      <form action="/todo/create" method="POST">
        @csrf
        <div class="contents">
          <input type="text" name="content" class="content">
          <input type="submit" class="submit-button">
        </div>
      </form>
    <table>
      <tr>
        <th>作成日</th>
        <th>タスク名</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
      @foreach ($items as $item)
        <tr>
          <td>{{$item->updated_at}}</td>
          <form action="/todo/update?id={{$item->id}}" method="POST">
            @csrf
            <td><input type="text" name="content" class="content-update" value="{{$item->content}}"></td>
            <td><input type="submit" value="更新" class="update-button"></td>
          </form>
          <form action="/todo/delete?id={{$item->id}}" method="POST">
            @csrf
            <td>
              <input type="submit" value="削除" class="delete-button">
            </td>
          </form>
        </tr>
      @endforeach
    </table>
    </div>
  </body>
</html>