@extends('layouts.site')

@section('title', 'Chính sách vận chuyển')

@section('content')
    <div class="row" style="background-color:aqua; padding: 15px 0;">
        <x-main-menu class="menu-large" />
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4 text-center">Chính sách vận chuyển</h1>
                <div class="policy-content">
                    <h2>1. Phạm vi áp dụng</h2>
                    <p>
                        Chính sách vận chuyển này áp dụng cho tất cả các đơn hàng được đặt trên website của chúng tôi.
                    </p>

                    <h2>2. Thời gian giao hàng</h2>
                    <p>
                        Thời gian giao hàng tiêu chuẩn là từ 3-5 ngày làm việc tùy thuộc vào địa chỉ giao hàng của quý
                        khách.
                        Các đơn hàng ở vùng sâu, vùng xa có thể mất thêm thời gian.
                    </p>

                    <h2>3. Phí vận chuyển</h2>
                    <p>
                        Phí vận chuyển sẽ được tính dựa trên trọng lượng và kích thước của đơn hàng, cũng như địa chỉ giao
                        hàng.
                        Quý khách sẽ được thông báo phí vận chuyển chính xác khi đặt hàng.
                    </p>

                    <h2>4. Đóng gói và vận chuyển</h2>
                    <p>
                        Tất cả các sản phẩm sẽ được đóng gói cẩn thận để đảm bảo an toàn trong quá trình vận chuyển.
                        Chúng tôi sử dụng các đối tác vận chuyển uy tín để giao hàng đến quý khách.
                    </p>

                    <h2>5. Kiểm tra hàng hóa khi nhận</h2>
                    <p>
                        Khi nhận hàng, quý khách vui lòng kiểm tra kỹ sản phẩm trước khi ký nhận.
                        Nếu phát hiện bất kỳ hư hỏng hoặc thiếu sót nào, vui lòng thông báo ngay cho nhân viên giao hàng
                        hoặc liên hệ với chúng tôi để được hỗ trợ kịp thời.
                    </p>

                    <h2>6. Chính sách đổi trả hàng</h2>
                    <p>
                        Trong trường hợp sản phẩm bị hư hỏng hoặc không đúng như mô tả, quý khách có thể áp dụng chính sách
                        đổi trả hàng của chúng tôi.
                        Vui lòng xem thêm thông tin chi tiết trong mục <a href="{{ route('policy.return') }}">Chính sách đổi
                            trả</a>.
                    </p>

                    <h2>7. Liên hệ hỗ trợ</h2>
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
