<div>
    <div class="row">
        <div class="col-xs-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                Tambah Data Barang 
              </button>
            @if (session()->has('sukses') )
                <div class="alert alert-success text-center">{{ session('sukses') }}</div>
            @endif       
                    
                     <br>
                     <br>
        <div class="box box-primary">
                <div class="box-header">
                <h3 class="box-title">Data Barang</h3>
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
                        @php
                            $no = 1;
                        @endphp
                    @foreach ($barang as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>Rp{{  number_format($item->harga,0,",",".")  }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" wire:click="editBarangData({{ $item->Id }})">
                                Edit
                              </button>
                              <button type="button" class="btn btn-danger" data-toggle="modal" wire:click="deleteKonfirmasi({{ $item->Id }})" >
                                Hapus
                              </button>
                        </td>
                     </tr>
                    @endforeach
                   </tbody>
                  
                </table>
                </div>
                <!-- /.box-body -->
            </div>
            </div>
         
        </div>

        <div wire:ignore.self class="modal fade" id="modal-default">
            <div class="modal-dialog ">
              <div class="modal-content">
                    <form wire:submit.prevent="storebarangData" class="form-horizontal">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Form Tambah Barang</h4>
                </div>
                <div class="modal-body">
                       
                            <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Nama Barang</label>
            
                                <div class="col-sm-8">
                                <input wire:model="nama_barang" type="text" class="form-control"  id="" placeholder="Masukan Nama Barang" >
                                @error('nama_barang')
                                <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror  
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Harga</label>
            
                                <div class="col-sm-8">
                                {{-- <input type="text" class="form-control" id="" wire:model="harga" placeholder="Masukan Harga"  > --}}
                                <input type="text" id="dengan-rupiah" class="form-control" wire:model="harga" placeholder="Masukan Harga">
                                @error('harga')
                                <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                            </div>
                                 
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Stok</label>
            
                                <div class="col-sm-8">
                                 <input type="text" class="form-control" id="" wire:model="stok" placeholder="Stok">
                                 @error('stok')
                                 <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror 
                                </div>
                               
                            </div>
                          
                           
                         </div>
                      
                          
                </div>
                <div class="modal-footer">
            
                  <button type="submit" class="btn btn-primary btn-block">S I M P A N</button>
                </div>
            </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>


          <div wire:ignore.self class="modal fade" id="modal-edit">
            <div class="modal-dialog ">
              <div class="modal-content">
                    <form wire:submit.prevent="updateBarangData" class="form-horizontal">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Form Edit Barang</h4>
                </div>
                <div class="modal-body">
                       
                            <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Nama Barang</label>
            
                                <div class="col-sm-8">
                                <input wire:model="nama_barang" type="text" class="form-control"  id="" placeholder="Masukan Nama Barang" >
                                @error('nama_barang')
                                <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror  
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Harga</label>
            
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="" wire:model="harga" placeholder="Masukan Harga"  >
                                @error('harga')
                                <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                            </div>
                                 
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Stok</label>
            
                                <div class="col-sm-8">
                                 <input type="text" class="form-control" id="" wire:model="stok" placeholder="Stok">
                                 @error('stok')
                                 <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror 
                                </div>
                               
                            </div>
                          
                           
                         </div>
                      
                          
                </div>
                <div class="modal-footer">
            
                  <button type="submit" class="btn btn-primary btn-block">S I M P A N</button>
                </div>
            </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>


          <div wire:ignore.self class="modal fade" id="modal-hapus">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Form Hapus</h4>
                </div>
                <div class="modal-body">
                  <p>Apakah Kamu Akan Menghapus File ini ? </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="button" wire:click="deleteBarangdata()">Save changes</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
 
</div>
@push('js')

<script>
  var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

      function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
{{-- <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
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
</script> --}}
    <script>
        window.addEventListener('close-modal', event =>{
            $('#modal-default').modal('hide')
            $('#modal-edit').modal('hide')
        });
        window.addEventListener('show-edit-barang-modal', event =>{
            $('#modal-edit').modal('show')
        });
        window.addEventListener('show-hapus-barang-modal', event =>{
            $('#modal-hapus').modal('show')
        });
    </script>
@endpush
{{-- @push('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush --}}
@section('barang','active')
@section('script')
<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
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

@section('css')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection