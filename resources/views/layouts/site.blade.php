<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.css">
</head>

<body>
    <header class="bg-dark text-light py-4">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-md-2">
                    <a href="{{ route('site.home') }}">
                        <img src="{{ asset('img/book1.jpg') }}" style="width: 110px; height: 100px;" alt="Logo">
                        <h3 class="text-light">BookStore</h3>
                    </a>
                </div>
                <!-- Search Form -->
                <div class="col-md-4 mx-auto p-2">
                    <form class="d-flex" action="{{ route('site.search') }}" method="GET">
                        <input class="form-control me-2" type="search" name="query" placeholder="Tìm kiếm"
                            aria-label="Tìm kiếm">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                <!-- Notifications -->
                <div class="col-md-1">
                    <i class="far fa-bell"></i>
                    <a href="#" class="text-light"></a>
                </div>
                <!-- Login -->
                <div class="col-md-1">
                    <a href="{{ route('site.dologin') }}" class="text-light">
                        <i class="far fa-user"></i>
                    </a>
                </div>
                <!-- Cart -->
                <div class="col-md-1">
                    @php
                        $count = count(session('carts', []));
                    @endphp
                    <a href="{{ route('site.cart') }}" class="text-light">
                        <i class="fas fa-shopping-cart">(<span id="showqty">{{ $count }}</span>)</i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3 border-end">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('img/book1.jpg') }}" style="width: 80px; height: 80px;" alt="Logo">
                        <p>Nhà sách BOOK2024</p>
                        <p>Địa chỉ: Thành phố Thủ Đức</p>
                        <p>Email:bookstore2024@gmail.com</p>
                        <p>Điện thoại: 0123456789</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <h5>Về chúng tôi</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('site.about-us') }}">Giới thiệu</a></li>
                        <li><a href="{{ route('site.contact') }}">Liên hệ</a></li>
                        <li><a href="#">Tuyển dụng</a></li>
                    </ul>
                </div>
                <div class="col-md-1">
                    <h5>Hỗ trợ</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('faq.index') }}">FAQ</a></li>
                        <li><a href="{{ route('site.policy') }}">Chính sách</a></li>
                        <li><a href="{{ route('policy.privacy') }}">Bảo mật</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>Phương thức thanh toán</h5>
                    <ul class="list-unstyled">
                        <p>Thanh toán tiền mặt</p>
                        <p>Thanh toán điện tử</p>
                        <p>Thẻ tín dụng/ghi nợ</p>
                        <p>Chuyển khoản ngân hàng</p>
                    </ul>
                </div>
                <!-- Google Map -->
                <img src="{{ asset('img/ggmap.png') }}" style="width:300px; height: 200px">
                <div class="row mt-3 border-top">
                    <div class="col-md-6 text-left">
                        <p>&copy; 2024 BookStore. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <h5>Theo dõi chúng tôi</h5>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="#" class="btn btn-outline-light"><i
                                        class="fa-brands fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="btn btn-outline-light"><i
                                        class="fa-brands fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="btn btn-outline-light"><i
                                        class="fa-brands fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="btn btn-outline-light"><i
                                        class="fa-brands fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
