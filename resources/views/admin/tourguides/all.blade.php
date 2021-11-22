@extends('admin.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><strong>{{$menu}}</strong></h3>

            <div class="pl-3 m-0 float-right">
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 350px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Tên địa điểm, địa chỉ, trạng thái,...">

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
                        <th style="width:15%">Họ tên</th>
                        <th style="width:10%">Ngày sinh</th>
                        <th style="width:10%">Giới tính</th>
                        <th style="width:15%">Email</th>
                        <th style="width:10%">SDT</th>
                        <th style="width:10%" class="text-center">Hình ảnh</th>
                        <th style="width:10%">Giá thuê</th>
                        <th class="text-center">Sửa/Xóa</th>
                    </tr>
                </thead>
                    @foreach($tourguides as $key => $tourguide)
                        <tr>
                            <td>{{$key + 1}}.</td>
                            <td>{{$tourguide->name}}</td>
                            <td>{{$tourguide->dob}}</td>
                            @if($tourguide->gender === 0)
                                <td>Nam</td>
                            @else
                                <td>Nữ</td>
                            @endif
                           
                            <td>{{$tourguide->email}}</td>
                            <td>{{$tourguide->phone}}</td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-sm " href="/admin/tourguides/galleries/{{$tourguide->id}}">
                                    <span class="font-weight-bold">Xem</span>
                                </a>
                            </td>
                            <td>{{$tourguide->rental_price}}</td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm " href="/admin/tourguides/edit/{{$tourguide->id}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="#"
                                    onClick="removeRow('{{$tourguide->id}}', '/admin/tourguides/destroy')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                   @endforeach
                <tbody>
                    
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

        <div class="card-footer clearfix">
            <?php if($count === 0) : ?>
                <strong>Chưa có hướng dẫn viên nào</strong>
            <?php else : ?>
                <strong>Số lượng hướng dẫn viên: {{$count}}</strong>
            <?php endif; ?>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</section>
@endsection