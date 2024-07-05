@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chỉnh sửa thông tin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.contact.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa thông tin</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.contact.update', $contact->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Họ tên</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $contact->name }}" required>
                </div>

                <div class="form-group">
                    <label for="phone">Điện thoại</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $contact->phone }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $contact->email }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $contact->title }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="content">Nội dung</label>
                    <textarea name="content" id="content" class="form-control" rows="3"
                        required>{{ $contact->content }}</textarea>
                </div>

                <div class="form-group">
                    <label for="reply_content">Nội dung trả lời</label>
                    <textarea name="reply_content" id="reply_content" class="form-control"
                        rows="3">{{ $contact->reply_content }}</textarea>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Gửi trả lời</button>
                    <a href="{{ route('admin.contact.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection