<div>
    <div class="row">
        <div class="col-xs-12">
            <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#modal-default" >
               Tambah Transaksi
              </button>
        
            @if (session()->has('sukses') )
                <div class="alert alert-success text-center">{{ session('sukses') }}</div>
            @endif       
                    
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
                    <th>Nomor Transaksi</th>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Type</th>
                    <th>Harga </th>
                    <th>Jumlah</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($transaksi as $item)
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $item->nota }} </td>
                                <td> {{ $item->tanggal }}  </td>
                                <td> {{ $item->nama_barang }}  </td>
                                <td> {{ $item->type }}  </td>
                                <td> {{ $item->harga }}  </td>
                                <td> {{ $item->jumlah }}  </td>
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
                    <form wire:submit.prevent="storetransaksi" class="form-horizontal">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Lakukan Transaksi</h4>
                </div>
                <div class="modal-body">
                            <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Nomer Transaksi</label>
            
                                <div class="col-sm-8">
                                <input readonly wire:model="nota" type="text" class="form-control"  id="" placeholder="Masukan Nama Barang" value="{{ $nota }}" >
                                 
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4">Tanggal </label>
                                <div class="col-sm-8" >
                                
                                 
                                  <input wire:model="tanggal" type="date" class="form-control" id="datepicker">
                                  @error('tanggal')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror  
                                </div>
                                <!-- /.input group -->
                              </div>
        
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Nama Barang</label>
            
                                <div class="col-sm-8">
                                <select wire:model="Idbarang" name="" id="" class="form-control">
                                    <option value=""> Pilih Salah Satu </option>
                                    @foreach ($barang as $item)
                                    <option value=" {{ $item->Id }} "> {{ $item->nama_barang }} </option>
                                    @endforeach
                                </select>
                                @error('Idbarang')
                                <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror  
                      
                            </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-4">Type</label>
                              <div class="col-sm-8">
                                <div class="radio">
                                  <label>
                                    <input wire:model="type" type="radio" name="optionsRadios" id="optionsRadios1" value="pengurangan" checked>
                                      Pengurangan
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input wire:model="type" type="radio" name="optionsRadios" id="optionsRadios2" value="penambahan">
                                    Penambahan
                                  </label>
                                </div>
                                @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror 

                              </div>
                            
                  
                                {{-- <label for="inputEmail3" class="col-sm-4">Type</label>
            
                                <div class="col-sm-8">
                                    <label>
                                      
                                        <input type="radio"  wire:model="type" name="type" value="pengurangan">
                                        Pengurangan
                                    </label>
                                    <label>
                                      
                                      <input type="radio"  wire:model="type1" name="type1" value="penambahan">
                                      Penambahan
                                  </label> --}}
                                    
                                   
                        
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Harga</label>
            
                                <div class="col-sm-8">
                                <input wire:model="harga" type="text" class="form-control"  id="dengan-rupiah" placeholder="Masukan Harga" >
                                @error('harga')
                                <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror  
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">Jumlah</label>
            
                                <div class="col-sm-8">
                                <input wire:model="jumlah" type="text" class="form-control"  id="" placeholder="Masukan Jumlah" >
                                @error('jumlah')
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
</div>
@push('js')
<script>
    window.addEventListener('close-modal', event =>{
        $('#modal-default').modal('hide')
    });
   
</script>
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
@endpush
@section('transaksi','active')
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


