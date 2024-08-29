@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <nav class="card">
                    <div class="card-header">フォルダを追加する</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul style="list-style: none">
                                    @foreach ($errors->all() as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('folders.create') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">フォルダ名</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ old('title') }}" />
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">送信</button>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
