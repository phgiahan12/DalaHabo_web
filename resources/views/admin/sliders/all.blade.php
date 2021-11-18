@extends('admin.main')

@section('content')
<section class="content">
    @include('admin.alert')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-normal"><strong>{{$title}}</strong></h3>

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
                        <th style="width:8%">ID</th>
                        <th style="width:20%">Tên slider</th>
                        <th style="width:20%">Đường dẫn</th>
                        <th style="width:20%">Hình ảnh</th>
                        <th style="width:15%" class="text-center">Trạng thái</th>
                        <th>&nbsp</th>
                    </tr>
                </thead>

                <tbody >
                   @foreach($sliders as $key => $slider)
                    <tr>
                        <td>{{$slider->id}}</td>
                        <td>{{$slider->name}}</td>
                        <td>{{$slider->url}}</td>
                        <td>
                            <a href="{{$slider->image}}" target="_blank">
                                <img src="{{$slider->image}}" width="80%">
                            </a>
                        </td>
                        <td class="text-center">
                            {!! \App\Helpers\Helper::active($slider->active) !!}
                        </td>
                        <td class="text-center">
                            <a class="btn btn-info btn-sm" href="/admin/sliders/edit/{{$slider->id}}">
                                <i class="fas fa-pencil-alt"></i> Sửa
                            </a>
                            <a class="btn btn-danger btn-sm" href="#"
                                onClick="removeRow('{{$slider->id}}', '/admin/sliders/destroy')">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                        </td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

        <div class="card-footer clearfix">
            <strong>Số lượng slider: {{$count}}</strong>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</section>
@endsection