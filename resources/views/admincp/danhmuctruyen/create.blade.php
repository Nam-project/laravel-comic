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
        <h1 class="h3 mb-0 text-gray-800">Thêm Danh Mục</h1>

    </div>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('danhmuc.store') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <input type="" class="form-control" name="tendanhmuc" value="{{old('tendanhmuc')}}" id="slug" onkeyup="ChangeToSlug();"
                    placeholder="Tên danh mục">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Slug danh mục</label>
                <input type="" class="form-control" name="slugdanhmuc" value="{{old('slugdanhmuc')}}" id="convert_slug" placeholder="Slug danh mục">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả</label>
                <input type="" class="form-control" name="mota" value="{{old('mota')}}" placeholder="Mô tả">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Kích hoạt</label>
                <select name="kichhoat" class="custom-select custom-select-sm">
                    <option value="0">Kích hoạt</option>
                    <option value="1">Không kích hoạt</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>

    </div>


    @include('layouts.footer')
@endsection
