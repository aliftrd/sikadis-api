@extends('layouts.landing')

@section('content')
    <!-- Banner Section Start -->
    <div class="swiper" style="height: 600px;">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @forelse($sliders as $slider)
                <div class="swiper-slide">
                    <x-lazy-image src="{{ $slider->image }}" alt="{{ $slider->title }}"
                                  style="width: 100%;height: 600px;object-fit: cover;"/>
                </div>
            @empty
                <div class="swiper-slide">
                    <x-lazy-image src="{{ asset('frontend/images/banner/banner-1.png') }}" alt="Empty Slider"
                                  style="width: 100%;height: 600px;object-fit: cover;"/>
                </div>
            @endforelse
        </div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <!-- Banner Section End -->

    <!--  Course style 1 -->
    <section class="section-padding bg-grey">
        <div class="container-fluid container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-6 pe-xl-6 col-lg-6">
                    <x-lazy-image src="{{ asset('frontend/images/banner/illustration.png') }}"
                                  alt="Greeting Illustration" class="img-fluid"/>
                </div>
                <div class="col-xl-6">
                    <div class="heading">
                        <h2>KATA SAMBUTAN</h2>
                        {!! $settings['KATA_SAMBUTAN'] !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Course style 1 End -->

    <!--course section start-->
    <section class="section-padding-btm course-filter-section pt-80">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-6 col-lg-5">
                    <div class="section-heading mb-50 text-center text-lg-start">
                        <h2 class="font-lg">Berita</h2>
                    </div>
                </div>
            </div>

            <div class="row course-gallery ">
                @forelse($posts->data as $post)
                    <div class="col-xl-6" style="cursor: pointer"
                         onclick="window.location.href='{{ route('landing.single-news', $post->slug) }}'">
                        <div class="blog-item mb-30">
                            <div class="post-thumb">
                                <x-lazy-image src="{{ $post->thumbnail }}" alt="Thumbnail" class="img-fluid"
                                              style="height: 360px;object-fit: cover;"/>
                            </div>
                            <div class="blog-content">
                                <div class="post-meta">
                                    <span class="post-date"><i class="fa fa-calendar-alt mr-2"></i>{{ $post->created_at }}</span>
                                </div>
                                <h3 class="post-title">{{ str($post->title)->limit(40, '...') }}</h3>
                                {!! str($post->content)->limit(70, '...') !!}
                            </div>
                        </div>
                    </div>
                @empty
                    <h5 class="text-center">Data Tidak Ditemukan</h5>
                @endforelse
            </div>
        </div>
        <!--course-->
    </section>
    <!--course section end-->

    <!-- Feature Section Start -->
    <section class="features section-padding-btm">
        <div class="container">
            <div class="row align-items-center justify-content-end mb-50">
                <div class="col-xl-6 pe-xl-5 col-lg-6">
                    <x-lazy-image src="{{ asset('frontend/images/banner/banner_img.png') }}" alt="Contact Illustration"
                                  class="img-fluid"/>
                </div>

                <div class="col-xl-6 col-lg-6 ">
                    <div class="section-heading mt-5 mt-lg-0 mb-4">
                        <h2 class="mb-20 font-lg">PUSAT BANTUAN</h2>
                        {!! $implicit_setting['PUSAT_BANTUAN'] !!}
                    </div>
                    <div class="single-course-category style-2">
                        <div class="course-cat-icon">
                            <i class="fas fa-phone-office font-md"></i>
                        </div>
                        <div class="course-cat-content">
                            <h4 class="course-cat-title">
                                <a href="#">{{ $implicit_setting['PHONE'] }}</a>
                            </h4>
                        </div>
                    </div>

                    <div class="single-course-category style-2 ">
                        <div class="course-cat-icon">
                            <i class="fas fa-clock font-md"></i>
                        </div>
                        <div class="course-cat-content">
                            <h4 class="course-cat-title">
                                <a href="#">{{ $implicit_setting['JAM_KANTOR'] }}</a>
                            </h4>
                        </div>
                    </div>
                    <div class="single-course-category style-2">
                        <div class="course-cat-icon">
                            <i class="fas fa-envelope font-md"></i>
                        </div>
                        <div class="course-cat-content">
                            <h4 class="course-cat-title text-lowercase">
                                <a href="#">{{ $implicit_setting['EMAIL'] }}</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Section END -->
@endsection
