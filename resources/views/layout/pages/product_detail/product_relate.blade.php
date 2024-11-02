@if(isset($product))
    <div class="item">
        <div class="wImage">
            <a href="{{ route('get.product.detail',$product->pro_slug.'-'.$product->id)}}" class="image">
                <img data-src="{{ $product->pro_avatar }}" alt="{{$product->pro_name}}" class="lazy"
                     src="/view/lazy.jpg"/>
            </a>
        </div>
        <h3 class="info">
            <a href="{{ route('get.product.detail',$product->pro_slug.'-'.$product->id)}}" class="name">
                {{ $product->pro_name}}               </a>
            <div class="price">
                <p class="new">{{ number_price($product->pro_price,0) }} đ</p>
            </div>
        </h3>
    </div>
@endif