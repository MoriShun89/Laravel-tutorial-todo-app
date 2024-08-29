@extends('layout')

@section('styles')
    @include('share.flatpickr.styles')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">タスクを編集する</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $message)
                                    <p>{{ $message }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id]) }}"
                            method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">タイトル</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ old('title') ?? $task->title }}" />
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">状態</label>
                                <select name="status" id="status" class="form-select">
                                    @foreach (\App\Models\Task::STATUS as $key => $val)
                                        <option value="{{ $key }}"
                                            {{ $key == old('status', $task->status) ? 'selected' : '' }}>
                                            {{ $val['label'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="due_date" class="form-label">期限</label>
                                <input type="text" class="form-control" name="due_date" id="due_date"
                                    value="{{ old('due_date') ?? $task->formatted_due_date }}" />
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">送信</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('share.flatpickr.scripts')
@endsection