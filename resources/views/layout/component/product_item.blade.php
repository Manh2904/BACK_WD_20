@if(isset($product))
<div class='item itemBox'>
    <div class='khungAnh'>
        <a class='khungAnhCrop' href="{{ route('get.product.detail',$product->pro_slug.'-'.$product->id )}}" title='{{ $product->pro_name}}'>
            <img alt="{{ $product->pro_name}}" class="lazyload" src='{{ $product->pro_avatar }}'/>
        </a>
    </div>
    <div class='itemDetail'>
        <h3 class='itemTitle'>
            <a href="{{ route('get.product.detail',$product->pro_slug.'-'.$product->id )}}" title="{{ $product->pro_name}}">{{ $product->pro_name}}</a>
        </h3>
        <div class='listPrice'><div class='subItem'><span>
            @if($product->pro_sale)
                <p class="new">{{ number_format( ($product->pro_price * (100 - $product->pro_sale)) / 100,0,',','.') }}đ</p>
                <p class="old">{{ number_format($product->pro_price,0,',','.') }}đ</p>
            @else
                <p class="new">{{ number_format($product->pro_price,0,',','.') }}đ</p>
            @endif
        </span> (Hàng Chính Hãng)</div></div>
        <a class='viewDetail' href="{{ route('get.product.detail',$product->pro_slug.'-'.$product->id )}}" title='Xem chi tiết'>Xem chi tiết</a>
    </div>
</div>
@endif
