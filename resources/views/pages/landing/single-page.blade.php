@extends('layouts.landing', ['title' => $page->title])

@section('content')
    <div class="page-wrapper">
        <div class="container">
            <div class="post-single">
                <div class="post-thumb">
                    <x-lazy-image src="{{ $page->firstImage->original_url }}" alt="{{ $page->title }}"
                                  class="img-fluid" style="width: 100%;height: 350px;object-fit: cover;"/>
                </div>
                <div class="single-post-content">
                    <div class="post-meta">
                                <span class="post-date"><i
                                        class="fa fa-calendar-alt mr-2"></i>{{ $page->created_at->diffForHumans() }}</span>
                    </div>
                    <h3 class="post-title">{{ $page->title }}</h3>
                    <div class="post-content">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
