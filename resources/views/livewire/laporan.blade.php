<div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Filter Laporan Berdasarkan Nama Barang</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                 <form wire:submit.prevent="tampildata" class="form-horizontal">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4">Nama Barang</label>
                        {{-- <select name="" id="" wire:model="search" class="formc">
                            <option value="1">1</option>
                        </select> --}}
                        <div class="col-sm-8">
                                <select wire:model="idbarang" label="Contact" class="form-control">
                                        <option value="">Pilih</option>
                                            @foreach($barang as $item)
                                                <option value="{{ $item->Id }}">{{ $item->nama_barang }}</option>
                                            @endforeach
                                        </select>
                        </div>
               
                     
                      </div>
                      <div class="form-group">
                            <label class="col-sm-4"></label>
                            <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary">Cek</button>
                            </div>
                      </div>                   
                    </div>
                  </div>
                  </form>
                </div>
              </div>
        </div>

        

    </div>

    <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
                <div class="box-header">
                <h3 class="box-title">Laporan Transaksi</h3>
                </div>
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>Nomer Transaksi</th>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Stok</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($transaksi as $item)
                            <tr>
                                <td> {{ $item->nota }} </td>
                                <td> {{ $item->tanggal }} </td>
                                <td> {{ $item->nama_barang }} </td>
                                <td> {{ $item->type }} </td>
                                <td> Rp{{  number_format($item->harga,0,",",".")  }} </td>
                                <td> {{ $item->jumlah }} </td>
                                <td> {{ $item->stok }} </td>
                            </tr>
                        @endforeach
                   </tbody>
                  
                </table>
                </div>
                <!-- /.box-body -->
            </div>
            </div>
         
        </div>
</div>
@section('laporan','active')

