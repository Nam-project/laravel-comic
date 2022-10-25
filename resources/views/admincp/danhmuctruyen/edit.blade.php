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
        <form method="POST" action="{{ route('danhmuc.update', [$danhmuc->id]) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <input type="text" value="{{$danhmuc->tendanhmuc}}" class="form-control" name="tendanhmuc" id="slug" onkeyup="ChangeToSlug();"
                    placeholder="Tên danh mục">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Slug danh mục</label>
                <input type="" class="form-control" name="slugdanhmuc" value="{{$danhmuc->slugdanhmuc}}" id="convert_slug" placeholder="Slug danh mục">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả</label>
                <input type="text" value="{{$danhmuc->mota}}" class="form-control" name="mota" placeholder="Mô tả">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Kích hoạt</label>
                <select name="kichhoat" class="custom-select custom-select-sm">
                    @if ($danhmuc->kichhoat == 0)
                        <option selected value="0">Kích hoạt</option>
                        <option value="1">Không kích hoạt</option>
                    @else
                        <option value="0">Kích hoạt</option>
                        <option selected value="1">Không kích hoạt</option>
                    @endif
                    
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>

    </div>


    @include('layouts.footer')
@endsection
