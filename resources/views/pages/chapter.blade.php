@extends('../layout')

@section('content')

    <div class="">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            {{-- <li><a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slugdanhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
            <li>{{$truyen->tentruyen}}</li> --}}
        </ul>
        <div class="nav__chapter">
            <a href="{{ url('xem-chapter/'.$backID.'/'.$backSlug) }}" class="chapter-btn {{$chapter->id == $minID->id ? 'inactive' : ''}}"><i class="fa-solid fa-angle-left"></i></a>
            <select class="select__chapter" id="select-chapter">
                @foreach ($allchapter as $key => $value)
                    <option id="chapter-option" {{$value->slug_chapter==$chapter->slug_chapter ? "selected": ""}}  value="{{url('xem-chapter/'.$value->id.'/'.$value->slug_chapter)}}">{{$value->tieude}}</option>
                @endforeach
            </select>
            <a href="{{ url('xem-chapter/'.$nextID.'/'.$nextSlug) }}" class="chapter-btn {{$chapter->id == $maxID->id ? 'inactive' : ''}}"><i class="fa-solid fa-angle-right"></i></a>
        </div>
        
        {{-- {{$chapter->noidung}} --}}
        <div class="title__chapter">{{$chapter->tieude}}</div>
        <div class="content__chapter">
            {!! $chapter->noidung !!}
        </div>
        
    </div>
    <script type="text/javascript">
        var chapterElement = document.getElementById('select-chapter');
        chapterElement.onchange = ( function() {
            var url = chapterElement.value;
            if(url) {
                window.location = url;
            }
            return false;
        });

    </script>
@endsection
