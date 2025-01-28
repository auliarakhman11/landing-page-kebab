@extends('template.master')
@section('content')

<div class="page-content-wrapper">
  <div class="blog-details-post-thumbnail" style="background-image: url('{{asset('img')}}/bg-kebab-yasmin.png')">
    <div class="container">
      {{-- <div class="post-bookmark-wrap">
        <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="ti ti-bookmark"></i></a>
      </div> --}}
    </div>
  </div>
  <div class="product-description pb-3">
    <!-- Product Title & Meta Data-->
    <div class="product-title-meta-data bg-white mb-3 py-3 dir-rtl">
      <div class="container">
        <h5 class="post-title">Kebab Yasmin</h5><a class="post-catagory mb-3 d-block" href="#">Surganya Ngebab!</a>
        {{-- <div class="post-meta-data d-flex align-items-center justify-content-between">
          <a class="d-flex align-items-center" href="#"><img src="{{asset('suha')}}/img/bg-img/9.jpg" alt="">Sarah<span>Follow</span></a>
          <span class="d-flex align-items-center">
            <svg class="bi bi-clock me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path>
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path>
            </svg>Sejak 2012</span>
        </div> --}}
      </div>
    </div>
    <div class="post-content bg-white py-3 mb-3 dir-rtl">
      <div class="container">
        {{-- <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta delectus distinctio officiis! Quisquam blanditiis voluptatibus, quod doloribus modi, impedit in dolores voluptates, aliquam facilis architecto eligendi laudantium eos!</p> --}}
        <h6>Sekilas Tentang Kebab Yasmin</h6>
        <p>Kebab Yasmin Adalah Salah Satu Kebab Yang Berasal Dari Kota Banjarmasin, Berdiri Sejak Tahun 2012, Outlet Kebab Yasmin Sudah Tersebar Diwilayah Profinsi Kalimantan Selatan Seperti Di Banjarmasin, Banjarbaru, Martapura, Rantau, Tanjung Dan InsyaAllah Akan Membuka Dikota-Kota Lain</p>
        {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis cupiditate quis molestias molestiae minus vel, ipsam corporis aut error libero tenetur facere assumenda soluta esse? Perferendis, eum!</p><a class="mb-3 d-block h6" href="#">How to easily buy a product?</a>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto quasi quas eligendi adipisci quaerat totam. Veritatis ratione a numquam molestias, sit at molestiae excepturi totam dolore, hic fugiat. Incidunt modi odit iure ipsam amet illo placeat laboriosam.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet porro, consectetur cum ea aut dolores officia magni laudantium, sed hic ad nulla laborum quam minima voluptatum, labore ipsam.</p> --}}
      </div>
    </div>
    <!-- All Comments-->
    <div class="rating-and-review-wrapper bg-white py-3 mb-3 dir-rtl">
      <div class="container">
        <h6>Info Kemitraan</h6>
        <div class="rating-review-content">
          <ul class="ps-0">
            <li class="single-user-review d-flex">
              <div class="user-thumbnail mt-0"><img src="{{asset('img')}}/whatsapp.png" alt="Whatsapp"></div>
              <div class="rating-comment">
                <p class="comment mb-0"><a href="https://wa.me/+6285654858718" target="_blank" style="text-decoration: none;">+62 856-5485-8718</a></p><span class="name-date">Syarif</span>
              </div>
            </li>
            {{-- <li class="single-user-review d-flex">
              <div class="user-thumbnail mt-0"><img src="{{asset('suha')}}/img/bg-img/8.jpg" alt=""></div>
              <div class="rating-comment">
                <p class="comment mb-0">Very excellent product. Love it.</p><span class="name-date">Designing World 8 Dec 2024</span>
              </div>
            </li>
            <li class="single-user-review d-flex">
              <div class="user-thumbnail mt-0"><img src="{{asset('suha')}}/img/bg-img/9.jpg" alt=""></div>
              <div class="rating-comment">
                <p class="comment mb-0">What a nice product it is. I am looking it's.</p><span class="name-date">Designing World 28 Nov 2024</span>
              </div>
            </li> --}}
          </ul>
        </div>
      </div>
    </div>
    <!-- Comment Form-->
    {{-- <div class="ratings-submit-form bg-white py-3 dir-rtl">
      <div class="container">
        <h6>Submit A Comment</h6>
        <form action="#" method="">
          <div class="mb-3">
            <textarea class="form-control" id="comments" name="comment" cols="30" rows="10" placeholder="Write your comment..."></textarea>
          </div>
          <button class="btn btn-primary" type="submit">Post Comment</button>
        </form>
      </div>
    </div> --}}

  </div>
</div>

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

            

        });
</script>
@endpush

