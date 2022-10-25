@extends('layouts.app')
@section('content')
    @include('layouts.header')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh sách truyện</h1>
        <a href="{{ route('truyen.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Thêm Truyện</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tên truyện</th>
                <th scope="col">Slug truyện</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Tóm tắt</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Quản lý</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_truyen as $key => $truyen)
            <tr>
                <th scope="row">{{$key}}</th>
                <td><img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" height="200px" width="" alt=""></td>
                <td>{{$truyen->tentruyen}}</td>
                <td>{{$truyen->slugtruyen}}</td>
                <td>{{$truyen->danhmuctruyen->tendanhmuc}}</td>
                <td>{{$truyen->tomtat}}</td>
                <td>
                    @if ($truyen->kichhoat == 0)
                        <span class="text text-success">Kích hoạt</span>
                    @else
                    <span class="text text-danger">Không kích hoạt</span>
                    @endif    
                </td>
                <td class="form-row">
                    <a href="{{route('truyen.edit', [$truyen->id])}}" class="btn btn-info btn-circle btn-sm mx-2">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <form action="{{route('truyen.destroy', [$truyen->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Bạn có muốn xóa truyện này hay không ?')" class="btn btn-danger btn-circle btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @include('layouts.footer')
@endsection
