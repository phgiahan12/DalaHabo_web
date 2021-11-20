@extends('admin.main')

@section('header')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

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
                            <div class="col-md-6">
                                <label for="name" class="col-form-label">Tên địa điểm</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Tên địa điểm">
                            </div>

                            <div class="col-md-5">
                                <label for="name" class="col-form-label">Danh mục</label>
                                <select name="categoryId" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <label for="name" class="col-form-label">Địa chỉ</label>
                                <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="Địa chỉ">
                            </div>

                            <div class="col-md-5">
                                <label for="name" class="col-form-label">Định vị Google Maps</label>
                                <input type="text" name="location" value="{{old('location')}}" class="form-control" placeholder="Định vị Google Maps">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-11">
                                <label class="col-form-label">Tóm tắt</label>
                                <textarea style="resize:none" rows="4" name="summary" class="form-control" id="summary" placeholder="Tóm tắt về địa điểm...">{{old('summary')}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-11">
                                <label class="col-form-label">Mô tả chi tiết</label>
                                <textarea name="description" class="form-control" id="description" placeholder="Mô tả địa điểm">{{old('description')}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-11">
                                <label class="col-form-label">Hình ảnh</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file[]" value="{{old('file[]')}}"accept="image/*" id="mul-file-input"multiple>
                                    <label class="custom-file-label" name="label" for="upload" id="file">{{old('label')}}</label>
                                </div>
                                <div class="row" id="images-show"></div>
                                <input type="hidden" name="image" id="images">
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Thêm địa điểm</button>
                    </div>
                    @csrf
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('description', {
            extraPlugins: 'editorplaceholder',
            height: 400,
            resize_minWidth: 200,
            resize_minHeight: 300,
            editorplaceholder: 'Mô tả chi tiết về địa điểm...',
            removeButtons: 'PasteFromWord',
        });
    </script>
@endsection