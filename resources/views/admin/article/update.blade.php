@extends('layout.admin')
@section('content')
    <title>Sửa bài viết</title>
    <div class="content-wrapper">

        <section class="content-header">
            <!-- Content Header (Page header) -->
            <h1> Sửa bài viết</h1>

        </section>
        <!-- Main content -->
        <section class="content">
            @include('admin.article.form')

        </section>
        <!-- /.content -->
        </section>
        <!-- /.content-wrapper -->
    </div>

@stop