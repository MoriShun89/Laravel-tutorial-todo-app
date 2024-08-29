@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        まずはフォルダを作成しましょう
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ route('folders.create') }}" class="btn btn-primary">
                                フォルダ作成ページへ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
