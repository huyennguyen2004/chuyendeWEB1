@extends('layouts.site')
@section('title', 'Chính sách')
@section('content')
    <style>
        main {
            padding-top: 80px;
            padding-bottom: 200px;
        }

        .policy-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .policy-item {
            flex: 1 1 calc(25% - 40px);
            text-align: center;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 10px;
            transition: transform 0.3s ease;
            display: block;
            text-decoration: none;
            color: #333;
        }

        .policy-item:hover {
            transform: scale(1.05);
        }

        .policy-item i {
            font-size: 24px;
            margin-bottom: 10px;
            display: block;
        }

        @media (max-width: 1200px) {
            .policy-item {
                flex-basis: calc(33.33% - 40px);
            }
        }

        @media (max-width: 768px) {
            .policy-item {
                flex-basis: calc(50% - 40px);
            }
        }

        @media (max-width: 576px) {
            .policy-item {
                flex-basis: 100%;
            }
        }
    </style>

    <div class="policy-container">
        <a href="{{ route('policy.purchase') }}" class="policy-item">
            <i class="fa-solid fa-store"></i>
            <span>Chính sách mua hàng</span>
        </a>
        <a href="{{ route('policy.warranty') }}" class="policy-item">
            <i class="fa-solid fa-award"></i>
            <span>Chính sách bảo hành</span>
        </a>
        <a href="{{ route('policy.shipping') }}" class="policy-item">
            <i class="fa-solid fa-truck-field"></i>
            <span>Chính sách vận chuyển</span>
        </a>
        <a href="{{ route('policy.return') }}" class="policy-item">
            <i class="fa-solid fa-rotate"></i>
            <span>Chính sách đổi trả</span>
        </a>
    </div>
@endsection
