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
                                    <p>Ghi rõ vấng đề của bạn:</p>
                                    <input type="text" name="content">
                                    @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="checkout__input">
                                    <p>Quãng đường</p>
                                    <select name="id_distance" id="selectionKm" onchange="myFunction()">
                                        <option value="0">Chọn quãng đường</option>
                                        <option value="1"> 1 -> 3km </option>
                                        <option value="2"> 3 -> 5km </option>
                                        <option value="3"> 5 -> 10km </option>
                                        <option value="4"> > 10km </option>
                                      </select>
                                    @error('id_distance')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="checkout__input">
                                    <p>Loại phương tiện:</p>
                                    <select name="type_driver" id="selectiondriver" onchange="myFunction()">
                                        <option value="0">Chọn loại xe</option>
                                        <option value="1">Xe tải</option>
                                        <option value="2">Xe 4 chổ</option>
                                        <option value="3">Xe 7 chỗ</option>
                                      </select>
                                    @error('type_driver')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <p>Tổng tiền của bạn: </p><input style="border: none; color: red" type="text" id="price" name="price"> VNĐ
                                @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
<script>
    function myFunction() {
      var selectiondriver = document.getElementById("selectiondriver").value;
      var selectionKm = document.getElementById("selectionKm").value;
      var x =0;
      if(selectiondriver == 1){
        x = 1;
      }
      if(selectiondriver == 2){
        x = 2;
      }
      if(selectiondriver == 3){
        x = 3;
      }
      var y =0;
      if(selectionKm == 1){
        y = 50000;
      }
      if(selectionKm == 2){
        y = 55000;
      }
      if(selectionKm == 3){ 
        y = 60000;
      }
      if(selectionKm == 4){
        y = 45000;
      }
      var price = selectiondriver +selectionKm;
      //document.getElementById("price").innerHTML = x*y;
      document.getElementById("price").value =x*y ;
    }
    </script>
<form method="POST" action="" id="formDelete">
    @csrf @method('DELETE')
</form>
<!-- Blog Section End -->
@endsection
