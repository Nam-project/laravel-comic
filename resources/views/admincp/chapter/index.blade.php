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
        <h1 class="h3 mb-0 text-gray-800">Danh Mục</h1>
        <a href="{{ route('chapter.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Thêm chapter</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Slug danh mục</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Quản lý</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($danhmuctruyen as $key => $danhmuc)
            <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$danhmuc->tendanhmuc}}</td>
                <td>{{$danhmuc->slugdanhmuc}}</td>
                <td>{{$danhmuc->mota}}</td>
                <td>
                    @if ($danhmuc->kichhoat == 0)
                        <span class="text text-success">Kích hoạt</span>
                    @else
                    <span class="text text-danger">Không kích hoạt</span>
                    @endif    
                </td>
                <td class="form-row">
                    <a href="{{route('danhmuc.edit', [$danhmuc->id])}}" class="btn btn-info btn-circle btn-sm mx-2">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <form action="{{route('danhmuc.destroy', [$danhmuc->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Bạn có muốn xóa danh mục này hay không ?')" class="btn btn-danger btn-circle btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach --}}
        </tbody>
    </table>

    @include('layouts.footer')
@endsection
