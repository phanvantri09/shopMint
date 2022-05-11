@extends('home.index')
@section('content')

<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Nhập Thông Tin Để Sửa Chữa Khẩn Cấp</h4>
            <form action="{{ route('postbooknow') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12">
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
                            <p>Địa chỉ cụ thể của bạn<span>*</span></p>
                            <input type="text" name="location">
                            @error('location')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Số Điện Thoại (<span>Ví dụ: 0372868775</span>)</p>
                                    <input type="text" name="numberPhone">
                                    @error('numberPhone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Loại phương tiện</p>
                                    <input type="text" name="type_driver">
                                    @error('type_driver')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Ghi rõ vấng đề của bạn:</p>
                                    <input type="text" name="content">
                                    @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Số KM:</p>
                                    <select name="id_distance" id="cars">
                                        @foreach ($distance as $item)
                                        <option value="{{$item->id}}">{{$item->km}}Km <--> {{$item->price}}$ </option>
                                        @endforeach
                                      </select>
                                    @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="submit" class="site-btn">Đặt Ngay</button>
                            </div>
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
