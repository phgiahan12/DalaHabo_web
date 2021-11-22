@extends('admin.main')

@section('header')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>{{$title}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="/admin">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#"></a>{{$title}}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$menu}}</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    @include('admin.alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{$menu}}</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="" method="POST" id="form">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="form-group col-md-6">
                                <label for="name" class="col-form-label">Họ tên</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Họ tên">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="name" class="col-form-label">Email</label>
                                <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email liên lạc">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="form-group col-md-6">
                                <label for="dob" class="col-form-label">Ngày sinh</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" name="dob" value="{{old('dob')}}" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Ngày sinh"/>
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="name" class="col-form-label">Số điện thoại</label>
                                <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Số điện thoại liên lạc">
                            </div> 
                        </div>

                        <div class="form-group row justify-content-center">
                            <!-- <div class="col-md-11"> -->
                                <div class="col-md-6">
                                    <label class="col-form-label">Giới tính</label>
                                    <div class="mt-2 ml-1 row">
                                        <div class="custom-control custom-radio col-5">
                                            <input class="custom-control-input" type="radio" value="0" id="male" name="gender" checked>
                                            <label for="male" class="custom-control-label font-weight-normal">Nam</label>
                                        </div>
                                        <div class="custom-control custom-radio col-5">
                                            <input class="custom-control-input" type="radio" value="1" id="female" name="gender">
                                            <label for="female" class="custom-control-label font-weight-normal">Nữ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="price" class="col-form-label">Giá thuê</label>
                                    <input type="text" name="rental_price" value="{{old('rental_price')}}" class="form-control" placeholder="Giá thuê">
                                </div>
                            <!-- </div> -->
                            
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-11">
                                <label class="col-form-label">Tóm tắt</label>
                                <textarea style="resize:none" rows="4" name="summary" class="form-control" id="summary" placeholder="Tóm tắt về hướng dẫn viên..">{{old('summary')}}</textarea>
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
                                    <input type="file" class="custom-file-input" name="file[]" value="{{old('file[]')}}" accept="image/*" id="mul-file-input" multiple>
                                    <label class="custom-file-label" name="label" for="upload" id="file">{{old('label')}}</label>
                                </div>
                                <div class="row" id="images-show"></div>
                                <input type="hidden" name="image" id="images">
                                <input type="hidden" name="folder" value="tourguides" id="folder">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Thêm hướng dẫn viên</button>
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
            height: 200,
            resize_minWidth: 200,
            resize_minHeight: 300,
            editorplaceholder: 'Mô tả chi tiết về hướng dẫn viên...',
            removeButtons: 'PasteFromWord',
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });

        CKEDITOR.config.toolbarGroups = [
            { name: 'mode'},
            { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
            { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
            { name: 'links' },
            { name: 'insert' },
            '/',
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'styles' },
            { name: 'colors' },
            { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align'] },
            { name: 'tools'}
        ]
    </script>

    <script>
        $(function () {
            $('#form').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    phone: {
                        required: true,
                    },
                    rental_price: {
                        required: true,
                    }
                },
                messages: {
                    name: {
                        required: "Vui lòng nhập họ tên"
                    },
                    email: {
                        required: "Vui lòng nhập email",
                        email: "Email không hợp lệ"
                    },
                    phone: {
                        required: "Vui lòng nhập số điện thoại"
                    },
                    rental_price: {
                        required: "Vui lòng nhập giá thuê"
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection