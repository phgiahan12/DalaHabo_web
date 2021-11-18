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
                                <input type="text" name="name" class="form-control" placeholder="Tiêu đề">
                            </div>

                            <div class="col-md-6">
                                <label for="name" class="col-form-label">Đường dẫn</label>
                                <input type="text" name="url" class="form-control" placeholder="Đường dẫn">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-11">
                                <label class="col-form-label">Hình ảnh</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="upload">
                                    <label class="custom-file-label" for="upload" name="file" id="file"></label>
                                    <input type="hidden" name="image" id="image">
                                </div>
                                <div id="image_show" class="mt-3"></div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-11">
                                <label class="col-form-label">Trạng thái</label>
                                <div class="mt-2 ml-1 row">
                                    <div class="custom-control custom-radio col-5">
                                        <input class="custom-control-input" type="radio" value="1" id="active" name="active" checked>
                                        <label for="active" class="custom-control-label font-weight-normal">Hiển thị</label>
                                    </div>
                                    <div class="custom-control custom-radio col-5">
                                        <input class="custom-control-input" type="radio" value="0" id="inactive" name="active">
                                        <label for="inactive" class="custom-control-label font-weight-normal">Ẩn</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Thêm slider</button>
                    </div>
                    @csrf
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
@endsection