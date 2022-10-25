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
        <form method="POST" action="{{ route('truyen.update', [$truyen->id]) }}" enctype = "multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên truyện</label>
                <input type="text" class="form-control" name="tentruyen" value="{{$truyen->tentruyen}}" id="slug" onkeyup="ChangeToSlug();"
                    placeholder="Tên truyện">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Slug truyện</label>
                <input type="text" class="form-control" name="slugtruyen" value="{{$truyen->slugtruyen}}" id="convert_slug" placeholder="Slug truyện">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Danh mục</label>
                <select name="danhmuc" class="custom-select custom-select-sm">
                    @foreach ($danhmuc as $key => $dm)
                    <option {{ $dm->id==$truyen->danhmuc_id ? 'selected' : '' }} value="{{$dm->id}}">{{$dm->tendanhmuc}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Hình ảnh truyện</label>
                <input type="file" class="form-control-file" name="hinhanh">
                <img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" height="200px" width="" alt="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tóm tắt truyện</label>
                <textarea class="form-control" name="tomtat" id="" cols="30" rows="10">{{$truyen->tomtat}}</textarea>
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Kích hoạt</label>
                <select name="kichhoat" class="custom-select custom-select-sm">
                    @if ($truyen->kichhoat == 0)
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
