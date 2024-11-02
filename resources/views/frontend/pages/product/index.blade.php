@extends('layout.home-page')
@section('content')
<div class="breadCrumbBox">
    <div class=" container">
        <ul>
            <li class="home">
                <a href="/" title="Trang chủ"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a>
            </li>


<li>
    <a href="javascript:;" title="{{ $title_page }}">{{ $title_page }}</a>
</li>

        </ul>
    </div>
</div>
<div class="masterPage">
    <div class="container">
        <div class="bao_cate">
            <div class="title_Cate">
                <span class="title">
                {{ $title_page }}
                </span>

            </div>

        </div>

        <div class="list_sp spCate">
            @if (isset($products))
            @foreach($products as $product)
            @include('layout.component.product_item',['product'=>$product])
            @endforeach
            @endif
        </div>
    </div>
</div>
@stop
