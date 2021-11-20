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
                        <th style="width:5%">ID</th>
                        <th style="width:20%">Tên địa điểm</th>
                        <th style="width:20%">Danh mục</th>
                        <th style="width:30%">Mô tả địa điểm</th>
                        <th style="width:10%">Hình ảnh</th>
                        <th style="width:10%" class="text-center">Trạng thái</th>
                        <th>&nbsp</th>
                    </tr>
                </thead>

                <tbody>
                    
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

        <div class="card-footer clearfix">
            <!-- {{$count}} -->
            <strong>Số lượng địa điểm: </strong>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</section>
@endsection