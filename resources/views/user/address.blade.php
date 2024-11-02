@extends('layout.user')
@section('profile')
    <style>td span {
            font-size: 12px
        }</style>
    <div class="lzd-playground-right">
        <div class="breadcrumb"><a>Sổ địa chỉ</a></div>
        <div id="container" class="container">
            <div class="book">
                <div>
                    <div class="mod-address-book">
                        <div class="next-table only-bottom-border" type="shipping">
                            <div class="next-table-inner">
                                <div class="next-table-header">
                                    <div class="next-table-header-inner">
                                        <table>
                                            <colgroup>
                                                <col style="width: 100px;">
                                                <col style="width: 260px;">
                                                <col>
                                                <col style="width: 120px;">
                                                <col style="width: 190px;">
                                                <col style="width: 60px;">
                                            </colgroup>
                                            <tbody>
                                            <tr>
                                                <th class="next-table-header-node first">
                                                    <div class="next-table-cell-wrapper">Tên</div>
                                                </th>
                                                <th class="next-table-header-node">
                                                    <div class="next-table-cell-wrapper">Địa chỉ</div>
                                                </th>
                                                <th class="next-table-header-node">
                                                    <div class="next-table-cell-wrapper">Mã vùng</div>
                                                </th>
                                                <th class="next-table-header-node">
                                                    <div class="next-table-cell-wrapper">Số điện thoại</div>
                                                </th>
                                                <th class="next-table-header-node">
                                                    <div class="next-table-cell-wrapper"></div>
                                                </th>
                                                <th class="next-table-header-node last">
                                                    <div class="next-table-cell-wrapper"></div>
                                                </th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="next-table-body">
                                    <table>
                                        <colgroup>
                                            <col style="width: 100px;">
                                            <col style="width: 260px;">
                                            <col>
                                            <col style="width: 120px;">
                                            <col style="width: 190px;">
                                            <col style="width: 60px;">
                                        </colgroup>
                                        <tbody>
                                        @if(isset(Auth::user()->location))
                                            <tr class="next-table-row last first">
                                                <td class="next-table-cell first">
                                                    <div class="next-table-cell-wrapper">{{ Auth::user()->user}}</div>
                                                </td>
                                                <td class="next-table-cell">
                                                    <div class="next-table-cell-wrapper">
                                                        <div class=""><span>{{ Auth::user()->location}}</span></div>
                                                    </div>
                                                </td>
                                                <td class="next-table-cell">
                                                    <div class="next-table-cell-wrapper">
                                                        <div class=""><span>{{ Auth::user()->address}}</span></div>
                                                    </div>
                                                </td>
                                                <td class="next-table-cell">
                                                    <div class="next-table-cell-wrapper">{{Auth::user()->phone}}</div>
                                                </td>
                                                <td class="next-table-cell last">
                                                    <div class="next-table-cell-wrapper"><a
                                                                href="{{ route('get.user.edit_address')}}"
                                                                class="next-btn next-btn-text next-btn-primary next-btn-medium">Chỉnh
                                                            sửa</button></div>
                                                </td>
                                            </tr>
                                        @endif
                                        <tr class="next-table-expanded-row" style="display: none;">
                                            <td>&nbsp;</td>
                                            <td colspan="5">
                                                <div></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="mod-address-book-ft"><a href="{{ route('get.user.edit_address')}}"
                                                            class="next-btn next-btn-warning next-btn-normal next-btn-large">+
                                Thêm địa chỉ mới</a></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop