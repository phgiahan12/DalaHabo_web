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
                            <div class="col-md-11">
                                <label for="category" class="col-form-label">Tên danh mục</label>
                                <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="Tên danh mục">
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-11">
                                <label class="col-sm-2 col-form-label">Mô tả danh mục</label>
                                <textarea style="resize:none" rows="5" name="description" class="form-control" id="category_description" placeholder="Mô tả danh mục">{{$category->description}}</textarea>
                            </div>
                            <!-- <textarea name="category_description" class="form-control" id="summernote" placeholder="Mô tả danh mục"></textarea> -->
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-11">
                                <label class="col-form-label">Trạng thái</label>
                                <div class="mt-2 ml-1 row">
                                    <div class="custom-control custom-radio col-4">
                                        <input class="custom-control-input" type="radio" value="1" id="active" name="active" {{$category->active == 1 ? 'checked' : ''}}>
                                        <label for="active" class="custom-control-label">Hiển thị</label>
                                    </div>
                                    <div class="custom-control custom-radio col-4">
                                        <input class="custom-control-input" type="radio" value="0" id="inactive" name="active" {{$category->active == 0 ? 'checked' : ''}}>
                                        <label for="inactive" class="custom-control-label">Ẩn</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Cập nhật danh mục</button>
                        <a class="btn btn-light" href="#" onClick="">
                            <i class="fas fa-chevron-left mr-2"></i>
                            <span>Trở về</span>
                        </a>
                    </div>
                    @csrf
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
@endsection