@extends('template.master')
@section('content')
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="alert alert-warning" role="alert">
            <div class="row">
                <div class="col-2 col-md-1"><strong>100%<br>Aman</strong></div>
                <div class="col-10 col-md-11">Nomor digunakan untuk membantu mengetahui detail pesanan Anda.</div>
            </div>
          </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form id="form-check-no">
                        <h4 class="mtext-101 cl2 txt-center p-b-30">
                            Verifikasi nomor WhatsApp anda untuk melanjutkan
                        </h4>
    
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="number" name="no_tlpn" placeholder="Masukan nomor Whatsapp Anda">
                            <img class="how-pos4 pointer-none" src="{{ asset('assets') }}/images/icons/whatsapp.png" width="20px;" alt="ICON">
                        </div>
    
                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Verifikasi
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).ready(function () {
            loadCart();
            loadTableCart();
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

                function loadTableCart(){
                $.ajax({
                            url:"{{ route('loadTableCart') }}",
                            method:"GET",
                            success:function(data){
                                $('#table-cart').html(data);                
                            }
                        });
                }

                $(document).on('submit', '#form-check-no', function(event){  
                event.preventDefault();
                    $.ajax({  
                            url:"{{ route('checkNo') }}",  
                            method:'POST',  
                            data:new FormData(this),  
                            contentType:false,  
                            processData:false,  
                            success:function(data)  
                            {  
                            if(data == 'success'){
                                swal("berhasil !", "success");
                            }else{
                                swal('Ada', "Masalah !", "error");
                            }
                            }  
                        });        
                    });

        });
</script>
@endpush