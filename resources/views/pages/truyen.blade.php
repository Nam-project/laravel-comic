@extends('../layout')

@section('content')

    <div class="">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slugdanhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
            <li>{{$truyen->tentruyen}}</li>
        </ul>
        
        <div class="comic">
            <div class="row">
                <div class="col l-4 m-12 c-12 comic__image">
                    <img class="img-thumbnail" src="{{ asset('public/uploads/truyen/'.$truyen->hinhanh) }}" alt="">
                </div>
                <div class="col l-8 m-12 c-12 comic__information">
                    <div class="comic__name">{{$truyen->tentruyen}}</div>
                    <div class="comic__category">
                        <a href="" class="btn-category">{{$truyen->danhmuctruyen->tendanhmuc}}</a>
                    </div>
                    <div class="comic__status">
                        <div class="comic__status-l">
                            <i class="fa-solid fa-brush"></i>
                            Trạng thái
                        </div>
                        <div class="comic__status-r">Đang cập nhật</div>
                    </div>
                    <div class="comic__status">
                        <div class="comic__status-l">
                            <i class="fa-solid fa-rotate-right"></i>
                            Cập nhật
                        </div>
                        <div class="comic__status-r">1 ngày trước</div>
                    </div>
                    <div class="comic__status">
                        <div class="comic__status-l">
                            <i class="fa-solid fa-eye"></i>
                            Lượt xem
                        </div>
                        <div class="comic__status-r">3,771,269</div>
                    </div>
                    <div class="comic__status">
                        <div class="comic__status-l">
                            <i class="fa-solid fa-bookmark"></i>
                            Lượt theo dõi
                        </div>
                        <div class="comic__status-r">7,000</div>
                    </div>
                    <div class="comic__manipulation">
                        <a href="{{ !empty($chapter_first) ? url('xem-chapter/'.$chapter_first->id.'/'.$chapter_first->slug_chapter) : '' }}" class="btn btn-info">
                            <i class="fa-solid fa-book"></i>Đọc từ đầu</a>
                        <a href="" class="btn btn-default">
                            <i class="fa-solid fa-bell"></i>Theo dõi</a>
                        <a href="" class="btn btn-warning">
                            <i class="fa-solid fa-triangle-exclamation"></i>Báo lỗi</a>
                    </div>
                </div>
            </div>
            <div class="comic__content">
                <div class="comic__content-al">
                    <span><i class="fa-solid fa-circle-info"></i>Giới thiệu</span>
                    <div class="info-summary">{{$truyen->tomtat}}</div>
                </div>
                <div class="comic__content-al">
                    <span><i class="fa-solid fa-list"></i>Danh sách chương</span>
                    <ul>
                        @foreach ($chapter as $key => $value)
                            <li><a href="{{url('xem-chapter/'.$value->id.'/'.$value->slug_chapter)}}">{{$value->tieude}}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
