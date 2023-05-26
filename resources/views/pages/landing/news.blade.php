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
                @foreach($posts->data as $post)
                    <div class="col-xl-6" style="cursor: pointer"
                         onclick="window.location.href='{{ route('landing.single-news', $post->slug) }}'">
                        <div class="blog-item mb-30">
                            <div class="post-thumb">
                                <x-lazy-image src="{{ $post->thumbnail }}" alt="Thumbnail" class="img-fluid"/>
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
                @endforeach
            </div>
        </div>
    </div>
@endsection
