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
                        <th>ID</th>
                        <th style="width:15%">Tên danh mục</th>
                        <th style="width:50%">Mô tả</th>
                        <th style="width:10%" class="text-center">Trạng thái</th>
                        <th>&nbsp</th>
                    </tr>
                </thead>

                <tbody>
                    {!! \App\Helpers\Helper::category($categories) !!}
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

        <div class="card-footer clearfix">
            <!-- <span>Số lượng:</span> -->
            <strong>Số lượng danh mục: {{$count}}</strong>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</section>
@endsection