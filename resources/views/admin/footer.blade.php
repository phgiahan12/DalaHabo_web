<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Themme -->
<script src="/template/admin/dist/js/adminlte.min.js"></script>
<!-- Custom -->
<script src="/template/admin/js/main.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/template/admin/plugins/moment/moment.min.js"></script>
<script src="/template/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- jquery-validation -->
 <script src="/template/admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/template/admin/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/template/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/template/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/template/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/template/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/template/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/template/admin/plugins/jszip/jszip.min.js"></script>
<script src="/template/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/template/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/template/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/template/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/template/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L',
            //locale: 'vi'
        });
    })
</script>    
@yield('footer')