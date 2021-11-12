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
                <form action="" method="POST" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="category" class="col-sm-2 col-form-label">Tên danh mục</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" placeholder="Tên danh mục">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Mô tả danh mục</label>
                            <div class="col-sm-10">
                                <textarea style="resize:none" rows="5" name="description" class="form-control" id="category_description" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <!-- <textarea name="category_description" class="form-control" id="summernote" placeholder="Mô tả danh mục"></textarea> -->
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Trạng thái</label>
                            <div class="col-sm-10 mt-2 ml-1 row">
                                <div class="custom-control custom-radio col-4">
                                    <input class="custom-control-input" type="radio" value="1" id="active" name="active" checked>
                                    <label for="active" class="custom-control-label font-weight-normal">Hiển thị</label>
                                </div>
                                <div class="custom-control custom-radio col-4">
                                    <input class="custom-control-input" type="radio" value="0" id="inactive" name="active">
                                    <label for="inactive" class="custom-control-label font-weight-normal">Ẩn</label>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Thêm danh mục</button>
                    </div>
                    @csrf
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
@endsection