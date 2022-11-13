<div class="content__slide-name title-name"><i class="fa-solid fa-sliders"></i> Truyện đề cử</div>
<div class="content__slide swiper mySwiper">
    <div class="swiper-wrapper">
        @foreach ($slider as $key => $value)
            <div class="card swiper-slide">
                <div class="card__content">
                    <div class="card__image">
                        <img src="{{ asset('public/uploads/truyen/'.$value->hinhanh) }}" alt="">
                        <div class="card__image-information">
                            <div class="card__image-view">
                                <i class="fa-solid fa-eye"></i> 128K
                            </div>
                            <div class="card__image-heart">
                                <i class="fa-solid fa-heart"></i> 12K
                            </div>

                        </div>
                    </div>
                    <div class="card__name">{{$value->tentruyen}}</div>
                    <div class="card__chap">
                        <div class="card__chap-name">Chap 607</div>
                        <div class="card__chap-time">3 giờ trước</div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div class="swiper-button-next btn-hover"></div>
    <div class="swiper-button-prev btn-hover"></div>
    <div class="swiper-pagination"></div>
</div>
