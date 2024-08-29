@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">パスワード再発行</div>
                    <div class="card-body">
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">メールアドレス</label>
                                <input type="email" class="form-control" id="email" name="email" />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">新しいパスワード</label>
                                <input type="password" class="form-control" id="password" name="password" />
                            </div>
                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">新しいパスワード（確認）</label>
                                <input type="password" class="form-control" id="password-confirm"
                                    name="password_confirmation" />
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">送信</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
