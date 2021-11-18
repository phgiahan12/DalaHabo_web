@extends('admin.main')

@section('content')
<section class="content">
    @include('admin.alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="" method="POST">
                    <div class="card-body">
                        <div class="form-group row justify-content-center">
                            <div class="col-md-5">
                                <label for="name" class="col-form-label">Tiêu đề</label>
                                <input type="text" name="name" value="{{$slider->name}}" class="form-control" placeholder="Tiêu đề">
                            </div>

                            <div class="col-md-6">
                                <label for="name" class="col-form-label">Đường dẫn</label>
                                <input type="text" name="url" value="{{$slider->url}}" class="form-control" placeholder="Đường dẫn">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-11">
                                <label class="col-form-label">Hình ảnh</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" value="" id="upload">
                                    <label class="custom-file-label" for="upload" name="file" id="file"></label>
                                    <input type="hidden" name="image" value="{{$slider->image}}" id="image">
                                </div>
                                <div id="image_show" class="mt-3">
                                    <a href="{{$slider->image}}" target="_blank">
                                        <img src="{{$slider->image}}" width="100%" class="img-thumbnail">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-11">
                                <label class="col-form-label">Trạng thái</label>
                                <div class="mt-2 ml-1 row">
                                    <div class="custom-control custom-radio col-5">
                                        <input class="custom-control-input" type="radio" value="1" id="active" name="active" {{$slider->active == 1 ? 'checked' : ''}}>
                                        <label for="active" class="custom-control-label font-weight-normal">Hiển thị</label>
                                    </div>
                                    <div class="custom-control custom-radio col-5">
                                        <input class="custom-control-input" type="radio" value="0" id="inactive" name="active" {{$slider->active == 0 ? 'checked' : ''}}>
                                        <label for="inactive" class="custom-control-label font-weight-normal">Ẩn</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Cập nhật slider</button>
                    </div>
                    @csrf
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
@endsection