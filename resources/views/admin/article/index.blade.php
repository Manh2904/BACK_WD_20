@extends('layout.admin')
@section('content')
    <title>Thông tin bài viết</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Bài viết
                <small><a href="{{ route('admin.article.create') }}" class="btn btn-success">Thêm mới</a></small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <table class="table text-center">
                <thead>
                <td>#</td>
                <td>Tên bài viết</td>
                <td>Nổi bật</td>
                <td>Trạng thái</td>
                <td>Thể loại</td>
                <td>Lượt xem</td>
                <!-- <td>Mô tả</td> -->
                <td>Ảnh</td>
                <!-- <td>Nội dung</td> -->
                <td>Tạo lúc</td>
                <td>Sửa lúc</td>
                <td>Hành động</td>
                </thead>
                @foreach($article as $list )
                    <tbody>
                    <td>{{ $list->id}}</td>
                    <td>{{ $list->a_name}}</td>

                    <td>
                        @if($list->a_hot == 1)
                            <a href="{{route('admin.article.hot',$list->id) }}" class="btn btn-primary">Nổi bật</a>
                        @else
                            <a href="{{route('admin.article.hot',$list->id) }}" class="btn btn-success">Không</a>
                        @endif
                    </td>

                    <td>
                        @if($list->a_active == 0)
                            <a href="{{route('admin.article.active',$list->id) }}" class="btn btn-success">Ẩn</a>
                        @else
                            <a href="{{route('admin.article.active',$list->id) }}" class="btn btn-primary">Hiện</a>
                        @endif
                    </td>
                    <td><span class="label label-info">{{ $list->a_menu_id }}</span></td>
                    <td>{{ $list->a_view}}</td>
                    <!-- <td>{{$list->a_description }}</td> -->
                    <td><img src="{{ pare_url_file($list->a_avatar) }}" style="width:80px;height:100px"></td>

                    <!-- <td>{{$list->a_content }}</td> -->
                    <td>{{$list->created_at}}</td>
                    <td>{{$list->updated_at }}</td>
                    <td>
                        <a href="{{route('admin.article.update',$list->id) }}" class="btn btn-primary"><i
                                    class="fa fa-edit"></i> Sửa</a>
                        <a href="{{route('admin.article.delete',$list->id) }}"
                           class="btn btn-danger js-query-confirm"><i class="fa fa-times"></i> Xóa</a>
                    </td>
                    </tbody>
                @endforeach
            </table>
        </section>
        <div class="box-footer">
            {!! $article->links() !!}
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@stop