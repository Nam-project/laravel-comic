@extends('../layout')
{{-- @section('slide')
    @include('pages.slider')
@endsection --}}
@section('content')




<div class="content__comic">
    {{-- <div class="content__comic-title title-name"><i class="fa-solid fa-arrows-spin">{{$id_dm->tendanhmuc}}</i></div> --}}
    
        <div>
            <div class="row">
            <div class="col l-8 m-12 c-12 content__comic--list">
                <div class="row ">
                    {{-- view comic --}}
                    @foreach ($truyen as $key => $value)
                        <div class="col l-3 m-4 c-6">
                            <div class="item">
                                <div class="item__image">
                                    <img src="{{ asset('public/uploads/truyen/'.$value->hinhanh) }}" />
        
                                </div>
                                <div class="item__name"><a href="">{{$value->tentruyen}}</a></div>
                                <div class="item__information">
                                    <div class="item__information-chap"><a href="">Chap 600</a></div>
                                    <div class="item__information-time">7 giờ trước</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col l-4 m-0 c-0">
                <div class="content__comic--ratings">
                    <div class="content__comic--ratings-title"><i class="fa-solid fa-ranking-star"></i>Bảng xếp hạng</div>
                    @foreach ($truyenxh as $key => $value)
                        <div class="ratings__item">
                            <img src="{{ asset('public/uploads/truyen/'.$value->hinhanh) }}" />
                            <div class="ratings__item-name">{{$value->tentruyen}}</div>
                            <div class="ratings__item-order">{{$key+1}}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection