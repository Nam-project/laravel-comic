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
        <h1 class="h3 mb-0 text-gray-800">Thêm Truyện</h1>

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
        <form method="POST" action="{{ route('truyen.store') }}" enctype = "multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên truyện</label>
                <input type="text" class="form-control" name="tentruyen" value="{{old('tentruyen')}}" id="slug" onkeyup="ChangeToSlug();"
                    placeholder="Tên truyện">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Slug truyện</label>
                <input type="text" class="form-control" name="slugtruyen" value="{{old('slugtruyen')}}" id="convert_slug" placeholder="Slug truyện">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Danh mục</label>
                <select name="danhmuc" class="custom-select custom-select-sm">
                    @foreach ($danhmuc as $key => $dm)
                    <option value="{{$dm->id}}">{{$dm->tendanhmuc}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Hình ảnh truyện</label>
                <input type="file" class="form-control-file" name="hinhanh">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tóm tắt truyện</label>
                <textarea class="form-control" name="tomtat" id="" cols="30" rows="10"></textarea>
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
