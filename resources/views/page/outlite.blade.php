@extends('template.master')
@section('content')
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="row justify-content-center p-b-20">
            <div class="col-6">
                <h3 class="mtext-113 cl2 p-b-16 text-center">
                    <u>Outlet Kami</u>
                 </h3>
            </div>
        </div>
        @php
            $i=1;
        @endphp
        @foreach ($outlite as $o)
        @if ($i % 2 == 0)
        <div class="row mb-5">
            <div class="order-md-2 col-md-7 col-lg-8">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-113 cl2 p-b-16">
                       {{ $o->nama }}
                    </h3>

                    <p class="mtext-101 cl6 p-b-26">
                        {{ $o->alamat }}
                    </p>

                    @if ($o->map)
                    <p class="stext-113 cl6 p-b-26">
                        <a href="{{ $o->map }}">
                            Lihat Outlet &#10132;
                        </a>                        
                    </p>
                    @endif
                    

                    {{-- <div class="bor16 p-l-29 p-b-9 m-t-22">
                        <p class="stext-114 cl6 p-r-40 p-b-11">
                            Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn't really do it, they just saw something. It seemed obvious to them after a while.
                        </p>

                        <span class="stext-111 cl8">
                            - Steve Job’s 
                        </span>
                    </div> --}}

                </div>
            </div>

            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    @if ($o->foto)
                    <div class="hov-img0">
                        <img src="https://admin.kebabyasmin.id/{{ $o->foto }}" alt="IMG">
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @else
        <div class="row mb-5">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-113 cl2 p-b-16">
                        {{ $o->nama }}
                    </h3>

                    <p class="mtext-101 cl6 p-b-26">
                        {{ $o->alamat }}
                    </p>

                    {{-- <p class="stext-113 cl6 p-b-26">
                        Donec gravida lorem elit, quis condimentum ex semper sit amet. Fusce eget ligula magna. Aliquam aliquam imperdiet sodales. Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci ut gravida. Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus sagittis. Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et maximus enim ligula ac ligula. 
                    </p> --}}

                    @if ($o->map)
                    <p class="stext-113 cl6 p-b-26">
                        <a href="{{ $o->map }}">
                            Lihat Outlet &#10132;
                        </a>                        
                    </p>
                    @endif

                </div>
            </div>

            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div class="how-bor1 ">
                    @if ($o->foto)
                    <div class="hov-img0">
                        <img src="https://admin.kebabyasmin.id/{{ $o->foto }}" alt="IMG">
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endif
            @php
                $i++
            @endphp
        @endforeach
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