@extends('home.index')
@section('content')

<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Nhập Thông Tin Để Đặt Hàng</h4>
            <form action="{{ route('postbooking') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Họ Và Tên Đầy Đủ Của Bạn<span>*</span></p>
                                    <input type="text" name="name">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Đại Chỉ Cụ Thê: số nhà/Xã/Huyện-Thị Trấn/Tỉnh/Thành phố<span>*</span></p>
                            <input type="text" name="address">
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số Điện Thoại (<span>Ví dụ: 0372868775</span>)</p>
                                    <input type="text" name="numberPhone">
                                    @error('numberPhone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Sản Phẩm Của Bạn</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Tiền</span></div>
                            <ul>
                                @foreach ($cart as $item)
                                @foreach ($product as $pro)
                                @if ($pro->id == $item->id_product)
                                <li>{{$pro->name}}: {{$item->amount}} <span>{{$item->amount*$pro->price}} vnĐ</span></li>
                                @endif 
                                @endforeach
                                @endforeach
                            </ul>
                            <div class="checkout__order__total">Tổng tiền <span>{{$total}} vnĐ</span></div>
                            <input type="hidden" name="price" value="{{$total}}">
                            <button type="submit" class="site-btn">Đặt Sản Phẩm</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<form method="POST" action="" id="formDelete">
    @csrf @method('DELETE')
</form>
<!-- Blog Section End -->
@endsection
