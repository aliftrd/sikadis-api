@extends('layouts.landing', ['title' => $post->title])

@section('content')
    <div class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-8">
                    <div class="post-single">
                        <div class="post-thumb">
                            <x-lazy-image src="{{ $post->firstImage->original_url }}" alt="{{ $post->title }}"
                                          class="img-fluid"/>
                        </div>
                        <div class="blog-footer-meta mt-0 d-md-flex justify-content-between align-items-center">
                            <div class="post-tags mb-0">
                                <a href="#">{{ $post->category->title ?? 'Uncategorized' }}</a>
                            </div>
                        </div>
                        <div class="single-post-content">
                            <div class="post-meta">
                                <span class="post-date"><i
                                        class="fa fa-calendar-alt mr-2"></i>{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                            <h3 class="post-title">{{ $post->title }}</h3>
                            <div class="post-content">
                                {!! $post->content !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="blog-sidebar mt-5 mt-lg-0">
                        <div class="widget widget_latest_post">
                            <h4 class="widget-title">Berita terbaru</h4>
                            <div class="recent-posts">
                                @foreach($latestPosts as $latestPost)
                                    <div class="single-latest-post"
                                         onclick="window.location.href='{{ route('landing.single-news', $post->slug) }}'"
                                         style="cursor: pointer;">
                                        <div class="widget-thumb">
                                            <img src="{{ $latestPost->firstImage->original_url }}"
                                                 alt="{{ $latestPost->title }}"
                                                 class="img-fluid">
                                        </div>
                                        <div class="widget-content">
                                            <h5>{{ str($latestPost->title)->limit(50, '...') }}</h5>
                                            <span><i class="fa fa-calendar-times"></i>{{ $post->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
