<div class="row">
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-8">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin cơ bản</h3>
                </div>
                <div class="box-body">
                    <div class="form-group {{$errors->first('a_name') ?'has-error' : ''}}"><label for="email">Tên bài
                            viết</label>
                        <input type="text" class="form-control" name="a_name" id="email"
                               value="{{  $article->a_name ?? old('a_name') }}" placeholder="Iphone 5s..."
                               autocomplete="off">
                        @if($errors->first('a_name'))
                            <p class="text-danger">{{ $errors->first('a_name') }}</p>
                        @endif
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group {{$errors->first('a_description') ?'has-error':''}}">
                                <label for="des">Tiêu đề</label>
                                <textarea name="a_description" id="des" cols="5" rows="2" autocomplete="off"
                                          class="form-control">{{$aduct->a_description ?? old('a_description',"Đang cập nhật")}}</textarea>
                                @if($errors->first('a_description'))
                                    <p class="text-danger">{{ $errors->first('a_description') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fs" class="control-label">Danh mục <b class="col-red">(*)</b></label>
                                <select name="a_menu_id" id="fs" class="form-control">

                                    <option value="EVENT" {{ ($article->a_menu_id ?? '') == 'EVENT' ?"selected='selected'" : ''}}>
                                        Sự kiện
                                    </option>
                                    <option value="KIẾN THỨC BÓNG ĐÁ" {{ ($article->a_menu_id ?? '') == 'KIẾN THỨC BÓNG ĐÁ' ?"selected='selected'" : ''}}>
                                        KIẾN THỨC BÓNG ĐÁ
                                    </option>
                                    <option value="KIẾN THỨC ĐỒ TẬP" {{ ($article->a_menu_id ?? '') == 'KIẾN THỨC ĐỒ TẬP' ?"selected='selected'" : ''}}>
                                        KIẾN THỨC ĐỒ TẬP
                                    </option>
                                    <option value="HỎI ĐÁP VỀ QUẦN ÁO" {{ ($article->a_menu_id ?? '') == 'HỎI ĐÁP VỀ QUẦN ÁO' ?"selected='selected'" : ''}}>
                                        HỎI ĐÁP VỀ QUẦN ÁO
                                    </option>
                                    <option value="BÁO CHÍ VIẾT VỀ CHÚNG TÔI" {{ ($article->a_menu_id ?? '') == 'BÁO CHÍ VIẾT VỀ CHÚNG TÔI' ?"selected='selected'" : ''}}>
                                        BÁO CHÍ VIẾT VỀ CHÚNG TÔI
                                    </option>

                                </select>
                                @if($errors->first('a_menu_id'))
                                    <p class="text-danger">{{ $errors->first('a_menu_id') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Nội dung</h3>
                </div>
                <div class="box-body ">
                    <div class="form-group {{$errors->first('a_content') }}">
                        <textarea name="a_content"
                                  id="content">{{ $article->a_content ?? old('a_content',"Content") }}</textarea>
                        @if($errors->first('a_content'))
                            <p class="text-danger">{{ $errors->first('a_content') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Ảnh đại diện</h3>
                </div>
                <div class="box-body block-images">
                    <div style="margin-bottom: 10px">
                        <img src="{{ pare_url_file($article->a_avatar ?? '') ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTzMcYWJkLEXnPD7zTbRwdnNRjjNPJDdP4ePQ&usqp=CAU' }}"
                             onerror="this.onerror=null;this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTzMcYWJkLEXnPD7zTbRwdnNRjjNPJDdP4ePQ&usqp=CAU';"
                             class="img-thumbnail" style="width: 200px;height: 200px;">
                    </div>
                    <div style="position:relative;"><a class="btn btn-primary" href="javascript:"> Choose File...
                            <input type="file" accept="image/*"
                                   style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:&quot;agid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;"
                                   name="a_avatar" size="40" class="js-upload"> </a> &nbsp; <span
                                class="label label-info" id="upload-file-info"></span></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 clearfix">
            <div class="box-footer text-center">
                <a href="{{ route('admin.article.index')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i>Quay
                    lại</a>
                <button type="submit" class="btn btn-success"><i
                            class="fa fa-save"></i>{{ isset($article) ?" Cập nhật" :" Thêm mới"}}</button>
            </div>
    </form>
</div>
