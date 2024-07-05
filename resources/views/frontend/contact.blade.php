@extends('layouts.site')

@section('title', 'Liên hệ')

@section('content')
    <div class="row" style="background-color:aqua; padding: 15px 0;">
        <x-main-menu class="menu-large" />
    </div>
    <section id="contact" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Liên hệ chúng tôi</h2>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ tên</label>
                            <input type="text" class="form-control" id="name" placeholder="Nhập họ tên của bạn">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Điện thoại</label>
                            <input type="phone" class="form-control" id="phone"
                                placeholder="Nhập số điện thoại của bạn">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Nhập email của bạn">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Tin nhắn</label>
                            <textarea class="form-control" id="message" rows="3" placeholder="Nhập tin nhắn của bạn"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
                <div class="col-md-6 border-start">
                    <h2>Thông tin liên hệ</h2>
                    <ul>
                        <li><i class="fa-solid fa-location-dot"></i>Thành phố Thủ Đức</li>
                        <li><i class="fa-solid fa-phone-volume"></i>0123456789</li>
                        <li><i class="fa-solid fa-envelope"></i>bookstore2024@gmail.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
