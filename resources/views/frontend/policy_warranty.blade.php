@extends('layouts.site')

@section('title', 'Chính sách bảo hành')

@section('content')
    <div class="row" style="background-color:aqua; padding: 15px 0;">
        <x-main-menu class="menu-large" />
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4 text-center">Chính sách bảo hành</h1>
                <div class="policy-content">
                    <h2>1. Điều kiện bảo hành</h2>
                    <p>
                        Chúng tôi cam kết bảo hành sản phẩm cho các trường hợp lỗi kỹ thuật từ nhà sản xuất.
                        Các điều kiện sau đây phải được đảm bảo để sản phẩm được bảo hành:
                    <ul>
                        <li>Sản phẩm còn trong thời gian bảo hành.</li>
                        <li>Sản phẩm gặp lỗi kỹ thuật do nhà sản xuất.</li>
                        <li>Sản phẩm phải còn nguyên tem bảo hành, không có dấu hiệu bị tháo mở, sửa chữa từ bên ngoài.</li>
                    </ul>
                    </p>

                    <h2>2. Thời gian bảo hành</h2>
                    <p>
                        Thời gian bảo hành được ghi rõ trong phần mô tả sản phẩm và trên phiếu bảo hành kèm theo.
                        Thời gian bảo hành thường là 12 tháng kể từ ngày mua.
                    </p>

                    <h2>3. Quy trình bảo hành</h2>
                    <p>
                        Để yêu cầu bảo hành, quý khách vui lòng thực hiện các bước sau:
                    <ul>
                        <li>Liên hệ với bộ phận chăm sóc khách hàng của chúng tôi qua số điện thoại 0123-456-789 hoặc email
                            support@example.com.</li>
                        <li>Cung cấp thông tin chi tiết về sản phẩm và lỗi gặp phải.</li>
                        <li>Gửi sản phẩm cùng với phiếu bảo hành và hóa đơn mua hàng về địa chỉ bảo hành của chúng tôi.</li>
                    </ul>
                    </p>

                    <h2>4. Các trường hợp không được bảo hành</h2>
                    <p>
                        Sản phẩm không được bảo hành trong các trường hợp sau:
                    <ul>
                        <li>Sản phẩm đã hết thời gian bảo hành.</li>
                        <li>Sản phẩm bị hư hỏng do lỗi người dùng (rơi, va đập, ngập nước, cháy nổ, sử dụng sai cách,...).
                        </li>
                        <li>Sản phẩm bị can thiệp sửa chữa bởi bên thứ ba mà không phải là trung tâm bảo hành của chúng tôi.
                        </li>
                    </ul>
                    </p>

                    <h2>5. Thời gian xử lý bảo hành</h2>
                    <p>
                        Thời gian xử lý bảo hành thường từ 7-15 ngày làm việc kể từ ngày nhận được sản phẩm.
                        Chúng tôi sẽ thông báo cho quý khách ngay khi việc bảo hành hoàn tất.
                    </p>

                    <h2>6. Liên hệ hỗ trợ</h2>
                    <p>
                        Nếu quý khách có bất kỳ thắc mắc hoặc cần hỗ trợ thêm, vui lòng liên hệ với chúng tôi qua:
                    <ul>
                        <li>Điện thoại: 0123-456-789</li>
                        <li>Email: support@example.com</li>
                        <li>Địa chỉ: Số 123, Đường ABC, Quận XYZ, Thành phố HCM</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
