@extends('home.index')
@section('content')

<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Giá tiền</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            @foreach ($products as $pro)
                            @if ($pro->id == $item->id_product)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="img/cart/cart-1.jpg" alt="">
                                    <h5>{{$pro->name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{$pro->price}}vnĐ
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <a href="{{ route('home.addcart', ["id_user"=>Auth::user()->id,"id_product"=>$pro->id]) }}">+</a>
                                            <input type="text" value="{{$item->amount}}">
                                            <a href="{{ route('home.trucart', ["id_user"=>Auth::user()->id,"id_product"=>$pro->id]) }}">-</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    {{$item->amount*$pro->price}}vnĐ
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a class="btnDelete" href="{{ route('home.deleteCart', ["id"=>$item->id]) }}"><span class="icon_close"></span></a>
                                </td>   
                            </tr>   
                            @endif 
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{ route('home') }}" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                    
                </div>
            </div>
            {{-- <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Tổng tiền trong giỏ của bạn</h5>
                    <ul>
                        <li>Tổng: <span>{{$total}} vnĐ</span></li>
                    </ul>
                    <a href="{{ route('booking') }}" class="primary-btn">Đặt các sản phẩm ngay</a>
                </div>
            </div>
        </div>
    </div>
</section>
<form method="POST" action="" id="formDelete">
    @csrf @method('DELETE')
</form>
<!-- Blog Section End -->
@endsection