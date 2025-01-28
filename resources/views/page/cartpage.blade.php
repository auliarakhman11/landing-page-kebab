@extends('template.master')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <!-- breadcrumb -->
	
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{ route('product') }}" class="stext-109 cl8 hov-cl1 trans-04">
				Produk
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
		
		

	</div>
		

	<!-- Shoping Cart -->
	<form method="POST" class="bg0 p-t-75 p-b-85" id="form-checkout">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart" id="table-cart">
								
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

				
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2 subtotal">
									
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Checkout:
								</span>
							</div>

							<input type="hidden" id="status" value="">

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								{{-- <p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p> --}}
								
								<div class="p-t-15">
									{{-- <span class="stext-112 cl8">
										Calculate Shipping
									</span> --}}

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="nama" placeholder="Masukan nama..." id="nama" required>
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="number" name="nomor" placeholder="Masukan no HP..." id="nomor" required>
									</div>

									<button class="btn btn-sm btn-info js-show-modal1" type="button" id='btn_lokasi'>
										Cari alamat
									</button>

									<div class="bor8 bg0 m-b-22">
										<textarea class="form-control" placeholder="Masukan alamat lengkap..." rows="5" id="alamat" name="alamat" required></textarea>
									</div>
									
									<input type="hidden" name="lat" id="lat">
									<input type="hidden" name="long" id="long">
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2 subtotal">
									
								</span>
							</div>
						</div>
						

						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit" id='btn-checkout'>
							Checkout
						</button>

						

					</div>
				</div>
			</div>
		</div>
	</form>


	<!-- Modal -->

	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20" id="modal_location">
		<div class="overlay-modal1 js-hide-modal1"></div>
	
		<div class="container">
			
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1 btn btn-sm btn-info">
					Tutup
				</button>
				<div id="map" style="width: 100%; height: 600px;"></div>
			</div>
		</div>
	</div>

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

			function getLocation() {
				
			}

			

			$(document).on('click', '#btn_lokasi', function() {
				if (navigator.geolocation) {
					
					navigator.geolocation.getCurrentPosition(showPosition);

				} else { 
					alert("Geolocation tidak suppot dengan browser anda, Gunakan browser seperti google chrome atau mozilla");
				}
			});

			function showPosition(position) {

			const map = L.map('map').setView([position.coords.latitude, position.coords.longitude],17);

				const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
					maxZoom: 30,
					attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
				}).addTo(map);

				const marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map)
					.bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

			const popup = L.popup()
			.setLatLng([position.coords.latitude, position.coords.longitude])
			.setContent('I am a standalone popup.')
			.openOn(map);

				$('#modal_location').show();

				function onMapClick(e) {
				// popup
				// 	.setLatLng(e.latlng)
				// 	.setContent(`You clicked the map at ${e.latlng.toString()}`)
				// 	.openOn(map);

					// console.log(e.latlng);

					var newLatLng = new L.LatLng(e.latlng.lat, e.latlng.lng);
    				marker.setLatLng(newLatLng).bindPopup('Lokasi Anda').openPopup();

					$('#lat').val(e.latlng.lat);
					$('#long').val(e.latlng.lng);

					var url = "https://nominatim.openstreetmap.org/reverse?lat="+e.latlng.lat+"&lon="+e.latlng.lng+"&format=json"

					$.ajax({
						type: "GET",
						url: url,
						cache: false,
						data: JSON,

						success: function(data){
							if(data.address.road){
								var alamat = "Jalan " +data.address.road + ", ";
							}else{
								var alamat = "";
							}

							$('#alamat').val(alamat + data.address.village + ", " + data.address.city);
							
						// console.log(alamat + data.address.village);

						// console.log(data);
						}
					});

				// 	const marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map)
				// .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();
			}

			map.on('click', onMapClick);

			// console.log(position.coords.latitude);

			// x.innerHTML = "Latitude: " + position.coords.latitude + 
			// "<br>Longitude: " + position.coords.longitude;
			}

			

			cekAuth();

			function cekAuth(){
				$.ajax({
						url:"{{ route('checkAuth') }}",
						method:"GET",
						dataType:"json",
						success:function(data){

							if(data.status == 'not authenticated'){
								const nomor = localStorage.getItem('nomor');
								if(nomor){
									$.ajax({
										url:"{{ route('getDataUser') }}",
										method:"POST",
										dataType:"json",
										data:{nomor:nomor},						
										success:function(hasil){

											// if(hasil.status == 'authenticated'){
											// 	$('#nama').val(hasil.nama);
											// 	$('#nomor').val(hasil.nomor);
											// 	$('#alamat').text(hasil.alamat);
											// 	$('#status').val(hasil.status); 
											// }else{
											// 	$('#status').val('not authenticated');
											// }                                   
										}
									});

									cekAuth();
								}else{
									$('#status').val('not authenticated');
								}
							}else{
								$('#nama').val(data.nama);
								$('#nomor').val(data.nomor);
								$('#alamat').text(data.alamat);
								$('#status').val(data.status);
								$('#lat').val(data.lat);
								$('#long').val(data.long);
							}					                                
						}

					});
			}
			

            // loadCart();
            loadTableCart();
            // subtotal();
            // function loadCart(){
            //     $.ajax({
            //                 url:"{{ route('loadCart') }}",
            //                 method:"GET",
            //                 success:function(data){
            //                     $('#cart').html(data);                
            //                 }
            //             });
                
            //     $.ajax({
            //             url:"{{ route('loadCount') }}",
            //             method:"GET",
            //             success:function(data){
            //                 $('.count-cart').attr('data-notify',data);                
            //             }
            //         });

            //     }

                function loadTableCart(){
                $.ajax({
                            url:"{{ route('loadTableCart') }}",
                            method:"GET",
                            success:function(data){
                                $('#table-cart').html(data.table);
								$('.count-cart').attr('data-notify',data.count);
								$('#cart').html(data.cart);
								$('.subtotal').html('Rp. '+data.subtotal);                
                            }
                        });
                }

                // function subtotal(){
                // $.ajax({
                //             url:"{{ route('subtotal') }}",
                //             method:"GET",
                //             success:function(data){
                //                 $('.subtotal').html('Rp. '+data);                
                //             }
                //         });

                // }

        $(document).on('submit', '#form-checkout', function(event){  
           event.preventDefault();
		   var status =  $('#status').val();
		   $("#btn-checkout").attr("disabled", true);
           $("#btn-checkout").text("loading...");
		   if(status == 'not authenticated' || status == '' || status == 'sementara'){
				$.ajax({  
                     url:"{{ route('verification') }}",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                      if(data == true){
						Swal.fire({
						title: 'Masukan kode OTP',
						input: 'text',
						confirmButtonText: 'Verifikasi',
						showLoaderOnConfirm: true,
						allowOutsideClick: false,
  						allowEscapeKey: false,
						preConfirm: (otp) => {
							if (!otp) {
							Swal.showValidationMessage(
								'gagal'
							);
							}
								// var response = '';
							return	$.ajax({
									url:"{{ route('checkOtp') }}",
									method:"POST",
									data:{otp:otp},
									success:function(data){
										if(data == 'sesuai'){
											Swal.fire({
											toast: true,
											position: 'top-end',
											showConfirmButton: false,
											timer: 3000,
											icon: 'success',
												title: 'Verifikasi Berhasil'
												});
												var no = $('#nomor').val();
												localStorage.setItem('nomor', no);
												cekAuth();
												window.location.href = "{{ route('redirectCheckout') }}";
										}else if(data == 'kosong'){
											Swal.fire({
											icon: 'error',
											title: 'Keranjang kosong',
											text: 'Isi keranjang terlebih dahulu sebelum melakukan checkout'
											});
											var no = $('#nomor').val();
											localStorage.setItem('nomor', no);
											cekAuth();
											$("#btn-checkout").removeAttr("disabled");
                        					$("#btn-checkout").text("checkout");
										}else{
											Swal.showValidationMessage(
												'kode OTP tidak sesuai!'
											);
										}                                  
									}
								});
								
								
							
						}
						});

						cekAuth();
						
                      }else{
                        Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Nomor yang anda masukan tidak sesuai, silahkan masukan nomor HP dengan benar'
						});
						$("#btn-checkout").removeAttr("disabled");
                        $("#btn-checkout").text("checkout");
                      }
                     },
                        error: function (data) { //jika error tampilkan error pada console
                                    console.log('Error:', data);
                                    
                                }
                });
		   }else{
			// $.ajax({
            //             url:"{{ route('loadCount') }}",
            //             method:"GET",
            //             success:function(data){
            //                 if(data == 0){
			// 					Swal.fire({
			// 								icon: 'error',
			// 								title: 'Keranjang kosong',
			// 								text: 'Isi keranjang terlebih dahulu sebelum melakukan checkout'
			// 								});
			// 				$("#btn-checkout").removeAttr("disabled");
            //             	$("#btn-checkout").text("checkout");				
			// 				}else{
			// 					window.location.href = "{{ route('checkOut') }}";
			// 				}                
            //             }
            //         });

				if(parseInt($('.count-cart').attr('data-notify')) > 0){
					$.ajax({  
						url:"{{ route('checkOut') }}",  
						method:'POST',  
						data:new FormData(this),  
						contentType:false,  
						processData:false,  
						success:function(data)  
						{

						if(data == 'sesuai'){
							window.location.href = "{{ route('redirectTransaksi') }}";
						}else if(data == 'kosong'){
							window.location.href = "{{ route('product') }}";
						}else if(data == 'tidak'){
							cekAuth();
							Swal.fire({
							icon: 'error',
							title: 'Nomor yang anda masukan berbeda',
							text: 'Kami perlu melakukan verifikasi ulang terhadap nomor yang anda masukan. Tekan tombol checkout untuk verifikasi!'
							});
							$("#btn-checkout").removeAttr("disabled");
							$("#btn-checkout").text("checkout");
							localStorage.removeItem('nomor');
						}

						}  
					}); 
				}else{
					Swal.fire({
					icon: 'error',
					title: 'Keranjang kosong',
					text: 'Isi keranjang terlebih dahulu sebelum melakukan checkout'
					});
					$("#btn-checkout").removeAttr("disabled");
					$("#btn-checkout").text("checkout");
				}
			
		   }
                      
            });

            $(document).on('click', '.plus-qty', function() {
                var rowId = $(this).attr("rowId");
                
                $.ajax({
                url:"{{ route('plusQty') }}",
                method:"POST",
                data:{rowId:rowId},
                success:function(data){
                   if(data == 'success'){
					// loadCart();
                       loadTableCart();
                    //    subtotal();
                   }else{
                    swal('Ada', "Masalah !", "error");
                   }                                   
                }

              });

            });

            $(document).on('click', '.min-qty', function() {
                var rowId = $(this).attr("rowId");
                
                $.ajax({
                url:"{{ route('minQty') }}",
                method:"POST",
                data:{rowId:rowId},
                success:function(data){
                   if(data == 'success'){
					// loadCart();
                       loadTableCart();
                    //    subtotal();
                   }else{
                    swal('Ada', "Masalah !", "error");
                   }                                   
                }

              });

            });


			

			// const circle = L.circle([51.508, -0.11], {
			// 	color: 'red',
			// 	fillColor: '#f03',
			// 	fillOpacity: 0.5,
			// 	radius: 500
			// }).addTo(map).bindPopup('I am a circle.');

			// const polygon = L.polygon([
			// 	[51.509, -0.08],
			// 	[51.503, -0.06],
			// 	[51.51, -0.047]
			// ]).addTo(map).bindPopup('I am a polygon.');


			

			

        });
</script>
@endpush
    