@extends('layouts.landing', ['title' => 'Berita'])

@section('content')
    <section class="page-header" style="background: none">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-8">
                    <div class="title-block">
                        <h1>Berita</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="page-wrapper">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-xl-6">
                        <div class="blog-item mb-30">
                            <div class="post-thumb">
                                <a href="blog-single.html"><img src="assets/images/blog/blog1.png" alt=""
                                                                class="img-fluid"></a>
                            </div>
                            <div class="blog-content">
                                <div class="post-meta">
                                    <span class="post-author">by Admin</span>
                                    <span class="post-date"><i
                                            class="fa fa-calendar-alt mr-2"></i>May 9, 2021</span>
                                    <span class="post-comments"><i class="far fa-comments"></i>15 </span>
                                </div>
                                <h3 class="post-title"><a href="blog-single.html">The Challenge Of Global Learning
                                        In Public Education</a></h3>

                                <p>Amet consectetur adipisicing elit. Libero repudiandae provident quas
                                    necessitatibus placeat provident elit</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
