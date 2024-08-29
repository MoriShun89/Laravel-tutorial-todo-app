@extends('layout')

@section('content')
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <nav class="card">
                    <div class="card-header">フォルダ</div>
                    <div class="card-body">
                        <a href="{{ route('folders.create') }}" class="btn btn-secondary btn-block">
                            フォルダを追加する
                        </a>
                    </div>
                    <div class="list-group">
                        @foreach ($folders as $folder)
                            <a href="{{ route('tasks.index', ['folder' => $folder->id]) }}"
                                class="list-group-item list-group-item-action {{ $current_folder_id === $folder->id ? 'active' : '' }}">
                                {{ $folder->title }}
                            </a>
                        @endforeach
                    </div>
                </nav>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">タスク</div>
                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('tasks.create', ['folder' => $current_folder_id]) }}"
                                class="btn btn-secondary btn-block">
                                タスクを追加する
                            </a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>タイトル</th>
                                <th>状態</th>
                                <th>期限</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>
                                        <span class="badge {{ $task->status_class }}">{{ $task->status_label }}</span>
                                    </td>
                                    <td>{{ $task->formatted_due_date }}</td>
                                    <td><a
                                            href="{{ route('tasks.edit', ['folder' => $task->folder_id, 'task_id' => $task->id]) }}">編集</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection
