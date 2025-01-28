@extends('template.master')
@section('content')

<section class="bg0 p-t-55 p-b-20 mt-4">
    <div class="container">

        

        <div class="row justify-content-center p-b-20">

            {{-- <div class="col-12 col-md-8">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('auth') }}/images/kebabyasmin-removebg.png" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum mollitia, fugit fugiat nam odit beatae, architecto sunt cupiditate ullam, maiores magnam numquam? Architecto, culpa aut tempore doloribus perspiciatis quas inventore!</p>
                          </div>
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('auth') }}/images/kebabyasmin-removebg.png" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('auth') }}/images/kebabyasmin-removebg.png" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum mollitia, fugit fugiat nam odit beatae, architecto sunt cupiditate ullam, maiores magnam numquam? Architecto, culpa aut tempore doloribus perspiciatis quas inventore!</p>
                          </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div> --}}

            <div class="col-12 col-md-8">
                <h3 class="mtext-113 cl2 p-b-16 text-center">
                    <u>Tentang Kami</u>
                 </h3>

                 <p class="mtext-101 cl6 p-b-26 text-center">
                    Kebab Yasmin Adalah Salah Satu Kebab Yang Berasal Dari Kota Banjarmasin, Berdiri Sejak Tahun 2012, Outlet Kebab Yasmin Sudah Tersebar Diwilayah Profinsi Kalimantan Selatan Seperti Di Banjarmasin, Banjarbaru, Martapura, Rantau, Tanjung Dan InsyaAllah Akan Membuka Dikota-Kota Lain
                 </p>
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
            $('.carousel').carousel({
                interval: 3000
                })

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

