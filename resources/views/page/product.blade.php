@extends('template.admin')
@section('admincontent')
<section class="bg0 p-t-23 p-b-130 mt-5">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Product
            </h3>
        </div>

        <div class="card">
            <div class="alert alert-success" role="alert">
                This is a success alert—check it out!
              </div>
            <div class="card-header">
                <button type="button" class="btn btn-sm btn-secondary float-right" data-toggle="modal" data-target="#tambah-produk"><i class="fa fa-plus"></i>Tambah Produk</button>

                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm" id="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tse</td>
                                <td>Tse</td>
                                <td>Tse</td>
                                <td>Tse</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<form action="" method="post" enctype="multipart/form-data" class="form-inline">
    @csrf
 
<div class="modal fade" id="tambah-produk">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-costume">
                <h4 class="modal-title majoo">Tambah Produk</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            

            <div class="modal-body">
                <div class="row form-group ">
                    <div class="col-sm-4 ol-md-6 col-xs-12 mb-2">
                        <label for="">Masukkan Gambar</label>
                        <input type="file" class="dropify" data-height="150" name="foto" placeholder="Image">
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group row">

                            <div class="col-lg-4 mb-2">
                                <label for="">
                                    <dt>Nama Produk</dt>
                                </label>
                                <input type="text" name="nm_produk" class="form-control" placeholder="Nama Produk" required>
                            </div>
                            
                            <div class="col-lg-4 mb-2">
                                <label for="">
                                    <dt>Kategori</dt>
                                </label>
                                <select name="kategori_id" class="form-control select" required>
                                    <option value="">-Pilih Kategori-</option>
                                    @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                                    @endforeach 
                                </select>
                            </div>
 

                            <div class="col-lg-4 mb-2">
                                <label for="">
                                    <dt>Harga</dt>
                                </label>
                                <input type="text" class="form-control" name="harga" required>
                            </div>

                            <div class="col-lg-4 mb-2">
                                <label for="">
                                    <dt>Diskon</dt>
                                </label>
                                <input type="text" class="form-control" name="diskon" value="0">
                            </div>

                            <div class="col-lg-4 mb-2">
                                <label for="">
                                    <dt>Status</dt>
                                </label>
                                <select name="komisi" class="form-control select" id="" required>                                   
                                        <option value="AKTIF">AKTIF</option>
                                        <option value="OFF">OFF</option>
                                </select>
                            </div>                      

                                                     
                            
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-costume">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
</form>   

@section('script')
<script>
    $(document).ready(function() {
        // Swal.fire({
        //       toast: true,
        //       position: 'top-end',
        //       showConfirmButton: false,
        //       timer: 10000,
        //       icon: 'error',
        //       title: 'Data penjual belum diisi'
        //     });

        $('#table').DataTable({
        "responsive": true,
        "bSort": true,
        // "scrollX": true,
        "paging": true,
        "stateSave": true,
        "scrollCollapse": true
        });
    });
</script>
@endsection

@endsection