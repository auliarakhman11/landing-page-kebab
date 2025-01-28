@extends('template.master')
@section('content')
    <!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{ route('product') }}" class="stext-109 cl8 hov-cl1 trans-04">
				Produk
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Transaksi
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85" >
		<div class="container">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
			<div class="row">
				<div class="col-lg-12 col-xl-12 col-12 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
                                
                                <tr class="table_head">
                                    <th class="column-1">Tanggal</th>
                                    <th class="column-1">Jumlah<br>Produk</th>
                                    <th class="column-1">Total</th>
                                    <th class="column-1">Status</th>
                                </tr>
                                
                                @foreach ($invoice as $i)
                                <tr class="table_row js-show-modal1 modal-btn check-detail" inv="{{$i->no_invoice }}">
                                    <td class="column-1">
                                        {{ date('d M Y' , strtotime($i->tgl)) }}
                                    </td>
                                    <td class="column-1">{{ $i->jumlah }}</td>
                                    <td class="column-1">Rp. {{ number_format($i->total,0) }}</td>
                                    <td class="column-1">{{ $i->status }}</td>
                                </tr>
                                @endforeach

							</table>
						</div>

						{{-- <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
						</div> --}}

					</div>
				</div>

                
			</div>
		</div>
	</div>

	@section('modal')
<form  method="post" id="form-cart">
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20" id="modal-detail-produk">
    <div class="overlay-modal1 js-hide-modal1"></div>

    <div class="container">
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">

            <div class="row">
                <div class="col-12">
					<div class="wrap-table-shopping-cart" id="form-detail">
						
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
</form>

@endsection
@endsection


@push('scripts')
<script src="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
    $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).ready(function () {

			$(document).on('click', '.check-detail', function() {
                var inv = $(this).attr("inv");
                
                $.ajax({
                url:"{{ route('detail') }}",
                method:"POST",
                data:{inv:inv},
                success:function(data){
					$('#form-detail').html(data);                            
                }

              });

            });

			// cekAuth();

			// function cekAuth(){
			// 	$.ajax({
			// 			url:"{{ route('checkAuth') }}",
			// 			method:"GET",
			// 			dataType:"json",
			// 			success:function(data){

			// 				if(data.status == 'not authenticated'){
			// 					const nomor = localStorage.getItem('nomor');
			// 					if(nomor){
			// 						$.ajax({
			// 							url:"{{ route('getDataUser') }}",
			// 							method:"POST",
			// 							data:{nomor:nomor},
			// 							success:function(data){
			// 								if(data.status == 'authenticated'){
			// 									$('#nama').val(data.nama);
			// 									$('#nomor').val(data.nomor);
			// 									$('#alamat').text(data.alamat);
			// 									$('#status').val(data.status); 
			// 								}else{
			// 									$('#status').val('not authenticated');
			// 								}                                   
			// 							}
			// 						});
			// 					}else{
			// 						$('#status').val('not authenticated');
			// 					}
			// 				}else{
			// 					$('#nama').val(data.nama);
			// 					$('#nomor').val(data.nomor);
			// 					$('#alamat').text(data.alamat);
			// 					$('#status').val(data.status);  
			// 				}					                                
			// 			}

			// 		});
			// }
			

            loadCart();
            function loadCart(){
                $.ajax({
                            url:"{{ route('loadCart') }}",
                            method:"GET",
                            success:function(data){
                                $('#cart').html(data);                
                            }
                        });
                
                $.ajax({
                        url:"{{ route('loadCount') }}",
                        method:"GET",
                        success:function(data){
                            $('.count-cart').attr('data-notify',data);                
                        }
                    });

                }


                function subtotal(){
                $.ajax({
                            url:"{{ route('subtotal') }}",
                            method:"GET",
                            success:function(data){
                                $('.subtotal').html('Rp. '+data);                
                            }
                        });

                }


        });
</script>
@endpush
    