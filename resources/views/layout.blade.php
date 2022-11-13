<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Truyện</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    {{-- <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('public/js/app.js') }}"> --}}

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet" href="{{ asset('public/css/grid.css') }}">

    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">

    <style>

    </style>
</head>


<body>
    <div class="main">
        <!---------Header--------->
        <header class="header">
            <div class="grid wide">
                <div class="header-width-search row no-gutters">
                    <div class="header__logo col l-2 m-1 c-1">
                        <a href="{{ url('/') }}" class="header__logo-link">
                            <span>N</span>COMIC
                        </a>
                        <a href="{{ url('/') }}" class="header__logo-mc">
                            <img src="{{ asset('public/uploads/images/logo.png') }}" />
                        </a>
                    </div>
                    <div class="header__search col l-7 m-10 c-10">
                        <form class="header__search--f" action="{{ url('tim-kiem') }}" method="GET">
                            <input class="header__search--input" id="search-input" autocomplete='off' type="search"
                                name="search" id="Search" placeholder="Search">
                            <button class="header__search--btn" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                        <div class="search-autocomplete">
                            {{-- auto search --}}
                        </div>
                    </div>


                    <div class="header__register-login col l-3 m-0 c-0">
                        <a href="" class="header__register">Sign Up</a>
                        <a href="" class="header__login">Sign In</a>
                    </div>
                    {{-- btn mobile --}}
                    <label for="nav__mobile-input" class="menu-btn col l-0 m-1 c-1">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                </div>
            </div>
            <div class="header__nav l-12 m-0 c-0">
                <div class="grid wide">
                    <ul class="header__nav-list">
                        <li class="header__nav-item header__nav-item-cotegory">
                            <span class="header__nav-cotegory">Thể loại</span>
                            <i class="fa-solid fa-caret-down"></i>
                            <ul class="header__nav-cotegory-list">
                                <div class="grid wide list-wrap">
                                    @foreach ($danhmuc as $key => $dm)
                                        @if ($dm->kichhoat == 0)
                                            <a href="{{ url('danh-muc/' . $dm->slugdanhmuc) }}">
                                                <li class="header__nav-cotegory-item">{{ $dm->tendanhmuc }}</li>
                                            </a>
                                        @endif
                                    @endforeach

                                </div>
                            </ul>
                        </li>
                        <li class="header__nav-item">Xếp hạng</li>
                        <li class="header__nav-item">Theo dõi</li>
                        <li class="header__nav-item">Lịch sử</li>
                    </ul>
                </div>
            </div>
            <!---------Nav mobile--------->
            <input type="checkbox" name="" class="nav__input" id="nav__mobile-input">
            <label for="nav__mobile-input" class="nav__overlay"></label>
            <nav class="nav__mobile">
                <label for="nav__mobile-input" class="nav__mobile-close">
                    <i class="fa-solid fa-xmark"></i>
                </label>
                <ul class="nav__mobile-list">
                    <li class="nav__mobile-logo">
                        <span>N</span>COMIC
                    </li>
                    <li class="nav__mobile-link"><a class="btn-cotegory" href="">Thể loại<i
                                class="fa-solid fa-caret-down"></i></a>
                        <div class="hover-cotegory">
                            <ul class="nav__mobile-cotegory ">
                                <li class="nav__mobile-cotegory-item">Manhua</li>
                                <li class="nav__mobile-cotegory-item">Manga</li>
                                <li class="nav__mobile-cotegory-item">Manhwa</li>
                                <li class="nav__mobile-cotegory-item">Manhua</li>
                                <li class="nav__mobile-cotegory-item">Manga</li>
                                <li class="nav__mobile-cotegory-item">Manhwa</li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav__mobile-link">Xếp hạng</li>
                    <li class="nav__mobile-link">Theo dõi</li>
                    <li class="nav__mobile-link">Lịch sử</li>
                    <li class="nav__mobile-link">Đăng nhập</li>
                    <li class="nav__mobile-link">Đăng xuất</li>
                </ul>
            </nav>
        </header>

        <div class="content">
            <div class="grid wide">
                <!---------Slide--------->
                @yield('slide')

                <!---------Truyện mới--------->
                @yield('content')

            </div>
        </div>

        <footer class="footer">
            <div class="line"></div>
            <div class="grid wide">
                <div class="row">
                    <div class="col l-6">
                        <div class="header__logo">
                            <a href="{{ url('/') }}" class="header__logo-link">
                                <span>N</span>COMIC
                            </a>
                        </div>
                    </div>
                    <div class="col l-6"></div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 2,
            spaceBetween: 10,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 5000,
            },
            breakpoints: {
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 50,
                },
            },
        });

        const $ = document.querySelector.bind(document)

        // auto search
        const searchInput = document.getElementById('search-input')
        const autoSearch = $('.search-autocomplete')

        searchInput.addEventListener('keyup', () => {
            let input = searchInput.value
            if (input.length) {
                let headers = {};
                headers['X-Requested-With'] = "XMLHttpRequest";

                // var data = new FormData();
                // data.append('e', e);

                fetch("{{ url('/search-auto') }}?e=" + input, {
                    headers: headers,
                    method: "GET",
                    // params : {a:345},
                    credentials: "same-origin"
                }).then((res) => {
                    if (res.status !== 200)
                        console.log('Failed to edit customer.');
                    // console.log(res.clone().text());
                    return res.json();
                }).then((data) => {
                    var content = ''
                    autoSearch.style.display = 'block'
                    data.map(function (value) {
                        content += '<div class=\"search__auto-item\"> <a href = \"\" ><img src = \"{{ asset('public/uploads/truyen/') }}/'+value?.hinhanh+'\"><span >'+ value?.tentruyen +'</span> </a> </div>';
                    })
                    autoSearch.innerHTML = content 
                    // autoSearch.style.display = 'block'
                    // autoSearch.innerHTML = '<div class=\"search__auto-item\"> <a href = \"\" ><img src = \"{{ asset('public/uploads/truyen/dai-vuong-tha-mang.jpg') }}\"alt = \"\" ><span >'+ data[0]?.tentruyen +'</span> </a> </div>'
                    // console.log(data);
                    // console.log(data[0]?.tentruyen);
                }).catch((e) => {
                    console.log("Error! " + e);
                });
            };

        })
    </script>

</body>

</html>
