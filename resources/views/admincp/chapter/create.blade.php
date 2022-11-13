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
        <h1 class="h3 mb-0 text-gray-800">Thêm chapter</h1>

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
        <form method="POST" action="{{ route('chapter.store') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tiêu đề</label>
                <input type="" class="form-control" name="tieude" value="{{old('tieude')}}" id="slug" onkeyup="ChangeToSlug();"
                    placeholder="Tên chapter">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Slug chapter</label>
                <input type="" class="form-control" name="slug_chapter" value="{{old('slug_chapter')}}" id="convert_slug" placeholder="Slug chapter">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Thuộc truyện</label>
                <select name="truyen_id" class="custom-select custom-select-sm">
                    @foreach ($truyen as $key => $value)
                        <option value="{{$value->id}}">{{$value->tentruyen}}</option>
                    @endforeach
                    

                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nội dung</label>
                <textarea name="noidung" id="" class="form-control"></textarea>
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
