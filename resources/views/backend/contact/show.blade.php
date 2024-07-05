@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết thông tin liên hệ</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.contact.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Chi tiết thông tin</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><strong>ID</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Họ tên</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Điện thoại</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Tiêu đề</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Người gửi</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Nội dung</strong></td>
                            </tr>
                            <tr>
                                <td><strong>ID Trả lời</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Ngày tạo</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Người tạo</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Ngày cập nhật</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Người cập nhật</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Trạng thái</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>{{ $contact->id }}</td>
                            </tr>
                            <tr>
                                <td>{{ $contact->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ $contact->phone }}</td>
                            </tr>
                            <tr>
                                <td>{{ $contact->email }}</td>
                            </tr>
                            <tr>
                                <td>{{ $contact->title }}</td>
                            </tr>
                            <tr>
                                <td>{{ $contact->user_id }}</td>
                            </tr>
                            <tr>
                                <td>{{ $contact->content }}</td>
                            </tr>
                            <tr>
                                <td>{{ $contact->reply_id }}</td>
                            </tr>
                            <tr>
                                <td>{{ $contact->created_at }}</td>
                            </tr>
                            <tr>
                                <td>{{ $contact->created_by }}</td>
                            </tr>
                            <tr>
                                <td>{{ $contact->updated_at }}</td>
                            </tr>
                            <tr>
                                <td>{{ $contact->updated_by }}</td>
                            </tr>
                            <tr>
                                <td>{{ $contact->status }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-right">
                <a href="{{ route('admin.contact.index') }}" class="btn btn-default">Quay lại</a>
            </div>
        </div>
    </div>
</section>
@endsection