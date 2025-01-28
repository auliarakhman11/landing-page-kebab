@extends('template.master')
@section('content')
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            

            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Address
                        </span>
                        <a href="https://goo.gl/maps/X23CW7orc6dt36ns8" style="text-decoration: none;">
                            <p class="stext-115 cl6 size-213 p-t-18">
                                Jl. Kp. Melayu Darat, Melayu, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70121
                            </p>
                        </a>                        
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <i class="fa fa-whatsapp"></i>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Whatsapp
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            <a href="https://wa.me/+6285753944552" style="text-decoration: none;">085753944552</a>
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <i class="fa fa-instagram"></i>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Instagram
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            <a href="https://www.instagram.com/kebabyasmin.id/" style="text-decoration: none;">@kebabyasmin.id</a>
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <i class="fa fa-youtube"></i>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Youtube
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            <a href="https://www.youtube.com/channel/UCYE2Pz0GC_ZXPsQW9Wa92rg" style="text-decoration: none;">Kebab Yasmin</a>
                        </p>
                    </div>
                </div>

                {{-- <div class="flex-w w-full">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-envelope"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Sale Support
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            email@example.com
                        </p>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>
<!-- Map -->
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
            // loadCart();
            // loadTableCart();
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

            //     function loadTableCart(){
            //     $.ajax({
            //                 url:"{{ route('loadTableCart') }}",
            //                 method:"GET",
            //                 success:function(data){
            //                     $('#table-cart').html(data);                
            //                 }
            //             });
            //     }

        });
</script>
@endpush