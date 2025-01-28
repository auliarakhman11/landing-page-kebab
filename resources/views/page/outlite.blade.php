@extends('template.master')
@section('content')
<div class="page-content-wrapper py-3">
    <div class="container">
      <div class="row gy-3">

        @foreach ($outlet as $o)
        <div class="col-12">
            <!-- Single Vendor -->
            <div class="single-vendor-wrap bg-img p-4 bg-overlay" style="background-image: url('{{asset('suha')}}/img/bg-img/16.jpg')">
              <h6 class="vendor-title text-white">{{ $o->nama }}</h6>
              <div class="vendor-info">
                <p class="mb-1 text-white"><i class="ti ti-map-pin me-1"></i>{{ $o->alamat }}</p>
                <div class="ratings lh-1"><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i></div>
              </div>
              @if ($o->map)
              <a class="btn btn-primary btn-sm mt-3" target="_blank" href="{{ $o->map }}">Google Maps<i class="ti ti-map-pin ms-1"></i></a>
              @endif
              <!-- Vendor Profile-->
              {{-- <div class="vendor-profile shadow">
                <figure class="m-0"><img src="{{ asset('img') }}/kebab-yasmin-putih.png" alt=""></figure>
              </div> --}}
            </div>
          </div>
        @endforeach
        

        {{-- <div class="col-12">
          <!-- Single Vendor -->
          <div class="single-vendor-wrap bg-img p-4 bg-overlay" style="background-image: url('img/bg-img/12.jpg')">
            <h6 class="vendor-title text-white">Designing World</h6>
            <div class="vendor-info">
              <p class="mb-1 text-white"><i class="ti ti-map-pin me-1"></i>Dhaka, Bangladesh</p>
              <div class="ratings lh-1"><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><span class="text-white">(99% Positive Seller)</span></div>
            </div><a class="btn btn-primary btn-sm mt-3" href="vendor-shop.html">Go to store<i class="ti ti-arrow-right ms-1"></i></a>
            <!-- Vendor Profile-->
            <div class="vendor-profile shadow">
              <figure class="m-0"><img src="img/product/dw.png" alt=""></figure>
            </div>
          </div>
        </div>
        <div class="col-12">
          <!-- Single Vendor -->
          <div class="single-vendor-wrap bg-img p-4 bg-overlay" style="background-image: url('img/bg-img/16.jpg')">
            <h6 class="vendor-title text-white">Stylie Wear</h6>
            <div class="vendor-info">
              <p class="mb-1 text-white"><i class="ti ti-map-pin me-1"></i>Dhaka, Bangladesh</p>
              <div class="ratings lh-1"><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><span class="text-white">(99% Positive Seller)</span></div>
            </div><a class="btn btn-primary btn-sm mt-3" href="vendor-shop.html">Go to store<i class="ti ti-arrow-right ms-1"></i></a>
            <!-- Vendor Profile-->
            <div class="vendor-profile shadow">
              <figure class="m-0"><img src="img/product/stylie.png" alt=""></figure>
            </div>
          </div>
        </div>
        <div class="col-12">
          <!-- Single Vendor -->
          <div class="single-vendor-wrap bg-img p-4 bg-overlay" style="background-image: url('img/bg-img/14.jpg')">
            <h6 class="vendor-title text-white">Suha</h6>
            <div class="vendor-info">
              <p class="mb-1 text-white"><i class="ti ti-map-pin me-1"></i>Dhaka, Bangladesh</p>
              <div class="ratings lh-1"><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><span class="text-white">(99% Positive Seller)</span></div>
            </div><a class="btn btn-primary btn-sm mt-3" href="vendor-shop.html">Go to store<i class="ti ti-arrow-right ms-1"></i></a>
            <!-- Vendor Profile-->
            <div class="vendor-profile shadow">
              <figure class="m-0"><img src="img/core-img/logo-small.png" alt=""></figure>
            </div>
          </div>
        </div>
        <div class="col-12">
          <!-- Single Vendor -->
          <div class="single-vendor-wrap bg-img p-4 bg-overlay" style="background-image: url('img/bg-img/15.jpg')">
            <h6 class="vendor-title text-white">Affan</h6>
            <div class="vendor-info">
              <p class="mb-1 text-white"><i class="ti ti-map-pin me-1"></i>Dhaka, Bangladesh</p>
              <div class="ratings lh-1"><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><span class="text-white">(99% Positive Seller)</span></div>
            </div><a class="btn btn-primary btn-sm mt-3" href="vendor-shop.html">Go to store<i class="ti ti-arrow-right ms-1"></i></a>
            <!-- Vendor Profile-->
            <div class="vendor-profile shadow">
              <figure class="m-0"><img src="img/product/affan.png" alt=""></figure>
            </div>
          </div>
        </div>
        <div class="col-12">
          <!-- Single Vendor -->
          <div class="single-vendor-wrap bg-img p-4 bg-overlay" style="background-image: url('img/bg-img/17.jpg')">
            <h6 class="vendor-title text-white">News Ten</h6>
            <div class="vendor-info">
              <p class="mb-1 text-white"><i class="ti ti-map-pin me-1"></i>Dhaka, Bangladesh</p>
              <div class="ratings lh-1"><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><span class="text-white">(99% Positive Seller)</span></div>
            </div><a class="btn btn-primary btn-sm mt-3" href="vendor-shop.html">Go to store<i class="ti ti-arrow-right ms-1"></i></a>
            <!-- Vendor Profile-->
            <div class="vendor-profile shadow">
              <figure class="m-0"><img src="img/product/newsten.png" alt=""></figure>
            </div>
          </div>
        </div> --}}

      </div>
    </div>
  </div>
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
            

        });
</script>
@endpush