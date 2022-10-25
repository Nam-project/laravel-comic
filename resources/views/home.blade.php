@extends('layouts.app')
@section('content')
    @include('layouts.header')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{ __('Đăng nhập thành công') }}
    @include('layouts.footer')
@endsection
