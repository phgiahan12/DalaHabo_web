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
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Tên danh mục, mô tả, trạng thái,...">

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
                        <th style="width:20%">Tên danh mục</th>
                        <th style="width:45%">Mô tả</th>
                        <th style="width:10%" class="text-center">Trạng thái</th>
                        <th style="width:10%" class="text-center">Sửa/ Xóa</th>
                    </tr>
                </thead>

                <tbody>
                    {!! \App\Helpers\Helper::category($categories) !!}
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

        <div class="card-footer clearfix">
            <?php if($count === 0) : ?>
                <strong>Chưa có danh mục nào</strong>
            <?php else : ?>
                <strong>Số lượng danh mục: {{$count}}</strong>
            <?php endif; ?>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</section>
@endsection