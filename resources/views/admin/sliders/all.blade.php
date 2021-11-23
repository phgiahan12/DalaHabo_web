@extends('admin.main')

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
                    <li class="breadcrumb-item">{{$title}}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$menu}}</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    @include('admin.alert')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><strong>{{$menu}}</strong></h3>

            <div class="pl-3 m-0 float-right">
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 350px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Tiêu đề, đường dẫn, trạng thái,...">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->

        <div class="card-body p-0 table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width:8%">STT</th>
                        <th style="width:15%">Tên slider</th>
                        <th style="width:15%">Đường dẫn</th>
                        <th style="width:15%">Hình ảnh</th>
                        <th style="width:15%">Ngày cập nhật</th>
                        <th style="width:10%" class="text-center">Trạng thái</th>
                        <th style="width:10%" class="text-center">Sửa/ Xóa</th>
                    </tr>
                </thead>

                <tbody >
                   @foreach($sliders as $key => $slider)
                        <tr>
                            <td>{{$key + 1}}.</td>
                            <td>{{$slider->name}}</td>
                            <td>{{$slider->url}}</td>
                            <td>
                                <a href="{{$slider->image}}" target="_blank">
                                    <img src="{{$slider->image}}" width="60%">
                                </a>
                            </td>
                            <td class="timestamp">{{$slider->updated_at}}</td>
                            <td class="text-center">
                                {!! \App\Helpers\Helper::active($slider->active) !!}
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm " href="/admin/sliders/edit/{{$slider->id}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="#"
                                    onClick="removeRow('{{$slider->id}}', '/admin/sliders/destroy')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

        <div class="card-footer clearfix">
            <?php if($count === 0) : ?>
                <strong>Chưa có slider nào</strong>
            <?php else : ?>
                <strong>Số lượng slider: {{$count}}</strong>
            <?php endif; ?>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</section>
@endsection