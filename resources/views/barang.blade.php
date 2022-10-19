@extends('template')
@section('barang','active')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('isi')
<div class="row">
    <div class="col-xs-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                    Tambah Data
                 </button>
                 <br>
                 <br>
    <div class="box box-primary">
            <div class="box-header">
            <h3 class="box-title">Data Approve Pendaftar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    {{-- @php
                        $no = 1;
                    @endphp
                @foreach ($register as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>
                        @if ($item->status == "belum acc")
                        <a href="{{ url('/admin/aprove/'.$item->email) }}"><button class="btn btn-success">Disetujui</button></a>
                        <a href="{{ url('/admin/tolakaprove/'.$item->email) }}"><button class="btn btn-danger">Ditolak</button></a>
                        @else
                            @if ($item->status == "acc")
                                Pengajuan DI ACC
                            @else
                                Pengajuan Ditolak
                            @endif
                        @endif
                        
                    </td>
                 </tr>
                @endforeach --}}
               </tbody>
              
            </table>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
    </div>
@endsection
@section('modal')
<div class="modal fade" id="modal-default">
    <div class="modal-dialog ">
      <div class="modal-content">
            <form class="form-horizontal" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Form Tambah Barang</h4>
        </div>
        <div class="modal-body">
               
                    @csrf
                    <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4">Nama Barang</label>
    
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Barang" name="full_name" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4">Harga</label>
    
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" placeholder="Masukan Harga" name="full_name" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4">Stok</label>
    
                        <div class="col-sm-8">
                         <input type="text" class="form-control" id="nama" placeholder="Stok" name="full_name" >
                        </div>
                    </div>
                   
                 </div>
              
                  
        </div>
        <div class="modal-footer">
    
          <button type="button" class="btn btn-primary btn-block">S I M P A N</button>
        </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection
@section('js')
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
        $(function () {
          $('#example1').DataTable()
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
        })
</script>
@endsection