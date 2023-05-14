@extends('layouts.landing', ['title' => 'Welcome'])

@section('content')
    <!-- Banner Section Start -->
    <div class="swiper" style="height: 600px;">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @forelse($sliders as $slider)
                <div class="swiper-slide">
                    <img src="{{ $slider->image }}" alt="" style="width: 100%;height: 600px;object-fit: cover;">
                </div>
            @empty
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/images/banner/banner-1.png') }}" alt="">
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
                    <img src="{{ asset('frontend/images/banner/illustration.png') }}" alt="" class="img-fluid">
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

                <div class="col-xl-6 col-lg-7">
                    <ul class="course-filter text-center text-lg-end">
                        <li><a href="#"> View All</a></li>
                    </ul>
                </div>
            </div>

            <div class="row course-gallery ">
                @forelse($posts->data as $post)
                    <div class="course-item cat1 cat5 col-lg-6 col-md-6">
                        <div class="single-course style-2 bg-shade border-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-xl-5">
                                    <div class="course-thumb"
                                         style="background:url({{ $post->thumbnail }})">
                                        @isset($post->category)
                                            <span class="category">{{ $post->category }}</span>
                                        @endisset
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <div class="course-content">
                                        <h3 class="course-title"><a href="#">{{ $post->title }}</a>
                                        </h3>
                                        <div class="course-meta d-flex align-items-center">
                                            <span class="students"><i
                                                    class="far fa-clock"></i>{{ $post->created_at }}</span>
                                        </div>
                                    </div>
                                </div>
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

    <!-- Testimonial section start -->
    <section class="testimonial-2 section-padding-top pb-70 ">
        <div class="container">
            <div class="row ">
                <div class="col-xl-4">
                    <div class="section-heading mb-5 mb-xl-0">
                        <span class="subheading">Students Feedback</span>
                        <h2 class="font-lg mb-10">Our Students Says</h2>
                        <p class="mb-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium officia
                            cupiditate .</p>

                        <a href="#" class="btn btn-main rounded">Join Now</a>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-8">
                    <div class="testimonials-slides-2 owl-carousel owl-theme">
                        <div class="testimonial-item">
                            <div class="testimonial-inner">
                                <div class="quote-icon"><i class="flaticon-left-quote"></i></div>

                                <div class="testimonial-text mb-30">
                                    Cras vel purus fringilla, lobortis libero ut Proin a velit convallis, fermentum orci
                                    in,
                                    rutrum diam. Duis elementum odio a pharetra commodo.
                                </div>

                                <div class="client-info d-flex align-items-center">
                                    <div class="client-img">
                                        <img src="assets/images/clients/testimonial-avata-01.jpg" alt=""
                                             class="img-fluid">
                                    </div>
                                    <div class="testimonial-author">
                                        <h4>Cory Zamora</h4>
                                        <span class="meta">Marketing Specialist</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial-item">
                            <div class="testimonial-inner">
                                <div class="quote-icon"><i class="flaticon-left-quote"></i></div>

                                <div class="testimonial-text  mb-30">
                                    Cras vel purus fringilla, lobortis libero ut Proin a velit convallis, fermentum orci
                                    in,
                                    rutrum diam. Duis elementum odio a pharetra commodo.
                                </div>

                                <div class="client-info d-flex align-items-center">
                                    <div class="client-img">
                                        <img src="assets/images/clients/testimonial-avata-02.jpg" alt=""
                                             class="img-fluid">
                                    </div>
                                    <div class="testimonial-author">
                                        <h4>Jackie Sanders</h4>
                                        <span class="meta">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial-item">
                            <div class="testimonial-inner">
                                <div class="quote-icon"><i class="flaticon-left-quote"></i></div>

                                <div class="testimonial-text  mb-30">
                                    Cras vel purus fringilla, lobortis libero ut Proin a velit convallis, fermentum orci
                                    in,
                                    rutrum diam. Duis elementum odio a pharetra commodo.
                                </div>

                                <div class="client-info d-flex align-items-center">
                                    <div class="client-img">
                                        <img src="assets/images/clients/testimonial-avata-03.jpg" alt=""
                                             class="img-fluid">
                                    </div>
                                    <div class="testimonial-author">
                                        <h4>Nikolas Brooten</h4>
                                        <span class="meta">Sales Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial-item">
                            <div class="testimonial-inner">
                                <div class="quote-icon"><i class="flaticon-left-quote"></i></div>

                                <div class="testimonial-text mb-30">
                                    Cras vel purus fringilla, lobortis libero ut Proin a velit convallis, fermentum orci
                                    in,
                                    rutrum diam. Duis elementum odio a pharetra commodo.
                                </div>

                                <div class="client-info d-flex align-items-center">
                                    <div class="client-img">
                                        <img src="assets/images/clients/testimonial-avata-04.jpg" alt=""
                                             class="img-fluid">
                                    </div>
                                    <div class="testimonial-author">
                                        <h4>Terry Ambady</h4>
                                        <span class="meta">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial-item">
                            <div class="testimonial-inner">
                                <div class="quote-icon"><i class="flaticon-left-quote"></i></div>

                                <div class="testimonial-text mb-30">
                                    Cras vel purus fringilla, lobortis libero ut Proin a velit convallis, fermentum orci
                                    in,
                                    rutrum diam. Duis elementum odio a pharetra commodo.
                                </div>

                                <div class="client-info d-flex align-items-center">
                                    <div class="client-img">
                                        <img src="assets/images/clients/testimonial-avata-03.jpg" alt=""
                                             class="img-fluid">
                                    </div>
                                    <div class="testimonial-author">
                                        <h4>Nikolas Brooten</h4>
                                        <span class="meta">Sales Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial section End -->

    <!-- Feature Section Start -->
    <section class="features section-padding-btm">
        <div class="container">
            <div class="row align-items-center justify-content-end mb-50">
                <div class="col-xl-6 pe-xl-5 col-lg-6">
                    <img src="{{ asset('frontend/images/banner/banner_img.png') }}" alt="" class="img-fluid">
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
