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
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Tìm kiếm...">

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
            <table class="table table-hover" id="placestable">
                <thead>
                    <tr>
                        <!-- <th style="width:5%">STT</th> -->
                        <th style="width:15%">Tên địa điểm</th>
                        <th style="width:10%">Danh mục</th>
                        <th style="width:20%">Địa chỉ</th>
                        <th style="width:20%">Tóm tắt</th>
                        <th style="width:10%" class="text-center">Hình ảnh</th>
                        <th style="width:10%" class="text-center">Sửa/Xóa</th>
                    </tr>
                </thead>
                    
                <tbody>
                    @foreach($places as $key => $place)
                        <tr>
                            <!-- <td>{{$key + 1}}.</td> -->
                            <td>{{$place->name}}</td>
                            <td>{{$place->category_id}}</td>
                            <td>{{$place->address}}</td>
                            <td>{{$place->summary}}</td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-sm " href="/admin/places/galleries/{{$place->id}}">
                                    <span class="font-weight-bold">Xem</span>
                                </a>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm " href="/admin/places/edit/{{$place->id}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="#"
                                    onClick="removeRow('{{$place->id}}', '/admin/places/destroy')">
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
            <div class="row">
                <div class="col-md-6">
                    <?php if($count === 0) : ?>
                        <strong>Chưa có địa điểm nào</strong>
                    <?php else : ?>
                        <strong>Số lượng địa điểm: {{$count}}</strong>
                    <?php endif; ?>
                </div>
                
                <div class="col-md-6">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-end">
                           {!! $places->links() !!}
                        </ul>
                    </nav>
                </div>
                
            </div>
            
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</section>
@endsection

@section('footer')
<script>
  $(function () {
    $('#placestable').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "info": false,
      
        "aaSorting": [],
        columnDefs: [
            {
                orderable: false,
                targets: 2,
            }, {
                orderable: false,
                targets: 3,
            }, {
                orderable: false,
                targets: 4,
            }, {
                orderable: false,
                targets: 5,
            }
        ],
        "autoWidth": false,
        "responsive": true,
  });
});
</script>
@endsection