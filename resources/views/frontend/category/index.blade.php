@extends('layout.home-page')
@section('content')
    <title>{{ $title_page ?? $title_page}}</title>
    <br>
    <link rel="stylesheet" type="text/css" href="/core/Smarty/templates/paging/style.css">

    <div id="product">
        <div class="wrp">
            <div id="filter">
                <div class="order">
                    <div class="price">
                        <span>Giá: </span>
                        <div class="lstPrice">
                            <ul>
                                <li class="{{Request::get('price') == 1 ? 'active' :'' }}">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => 1]  ) }} ">
                                        Dưới 2 triệu
                                    </a>
                                </li>

                                <li class="{{Request::get('price') == 2 ? 'active' :'' }}">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => 2]  ) }} ">
                                        Từ 2 triệu - 5 triệu
                                    </a>
                                </li>

                                <li class="{{Request::get('price') == 5 ? 'active' :'' }}">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => 5]  ) }} ">
                                        Từ 5 triệu - 10 triệu
                                    </a>
                                </li>

                                <li class="{{Request::get('price') == 10 ? 'active' :'' }}">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => 10]  ) }} ">
                                        Từ 10 triệu - 25 triệu
                                    </a>
                                </li>


                                <li class="{{Request::get('price') == 50 ? 'active' :'' }}">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => 50]  ) }} ">
                                        Trên 50 triệu
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="right">
                        <div class="function odering">
                            <span class="openSubOrder">Sắp xếp <i class="fa fa-caret-down"></i></span>
                            <div class="sub filter">
                                <div class="group">
                                    <ul>
                                        <li>
                                            <label class="{{ Request::get('s') ?'':'active'}}">
                                                <span class="check"><i class="fa fa-check"></i></span>
                                                <span><a href="#" title="San pham noi bat">Sản phẩm nổi bật</a></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="{{ Request::get('s')==2 ? 'active' : '' }}">
                                                <span class="check"><i class="fa fa-check"></i></span>
                                                <span><a href="{{ request()->fullUrlWithQuery(['s' => 2]  ) }}"
                                                         title="Thap den cao">Giá thấp đến cao</a></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="{{ Request::get('s')==1 ? 'active' : '' }}">
                                                <span class="check"><i class="fa fa-check"></i></span>
                                                <span><a href="{{ request()->fullUrlWithQuery(['s' => 1]  ) }}"
                                                         title="Cao xuong thap">Giá cao xuống thấp</a></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <a href="javascript://" class="closeSub"><i class="fa fa-times-circle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="product">
                <div class="group active">
                    @if(!count($products))
                        <div class="text-center">
                            <img src="{{ asset('view/no_result.jpg') }}"/>
                        </div>
                    @endif
                    @foreach($products as $list)
                        @include('layout.component.list_product',['list'=>$list])
                    @endforeach
                </div>
                <div class="box-footer">
                    {!! $products->appends(request()->query())->links() !!}
                </div>
            </div>
        </div>

    </div>


    </div>
    </div>
@stop
