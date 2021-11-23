@extends('admin.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <h1>{{$menu}}</h1>
            </div>
            <div class="col-sm-8">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="/admin">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">{{$title}}</li>
                    <li class="breadcrumb-item"><a href="/admin/tourguides/all">Danh sách hướng dẫn viên</a></li>
                    <li class="breadcrumb-item">{{$menu}}</li>
                    <li class="breadcrumb-item active" aria-current="page">Hình ảnh</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    @include('admin.alert')
    <div class="card collapsed-card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Thêm hình ảnh</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        
        <div class="card-body p-0">
            <form action="" method="POST">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <label class="col-form-label">Hình ảnh</label>
                        <div class="form-group custom-file">
                            <input type="file" class="custom-file-input" name="file[]" accept="image/*" id="mul-file-input" multiple>
                            <label class="custom-file-label" name="label" for="file"></label>
                        </div>
                        <div class="row" id="images-show"></div>
                        <input type="hidden" name="image" id="images">
                        <input type="hidden" name="folder" value="tourguides" id="folder">
                        <div class="row justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary">Thêm hình ảnh</button>
                        </div>
                    </div>
                </div>
                @csrf
            </form>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><strong>{{$title}}</strong></h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body p-0 table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <!-- <th style="width:25%">Tên hình ảnh</th> -->
                        <th style="width:30%">Hình ảnh</th>
                        <th>Ngày đăng</th>
                        <th class="text-center">Xóa</th>
                    </tr>
                </thead>
                   
                <tbody>
                    @foreach($images as $key => $image)
                        <tr>
                            <td>{{$key + 1}}.</td>
                            <!-- <td>{{$image->name}}</td> -->
                            <td>
                                <a href="{{$image->image}}" target="_blank">
                                    <img src="{{$image->image}}" width="40%">
                                </a>
                            </td>
                            <td>{{$image->updated_at}}</td>
                            <td class="text-center">
                                <a class="btn btn-danger btn-sm" href="#"
                                    onClick="removeRow('{{$image->id}}', '/admin/tourguides/galleries/destroy')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>                      
                  </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <?php if($count === 0) : ?>
                <strong>Chưa có hình ảnh nào</strong>
            <?php else : ?>
                <strong>Số lượng hình ảnh: {{$count}}</strong>
            <?php endif; ?>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</section>
@endsection