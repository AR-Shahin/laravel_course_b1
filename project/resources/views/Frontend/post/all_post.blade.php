@extends('layouts.frontend_app')

@section('front_title','All Posts')

@section('frontend_app_content')
<div class="container mt-lg-5">
    <div class="row mt-3">
      <!-- Latest Posts -->
      <main class="posts-listing col-lg-8">
        <div class="container">
          <div class="row">
            <!-- post -->
            {{-- @php
                print_r($posts->toArray());
            @endphp --}}

            @foreach ($posts as $post)
            <div class="post col-xl-6">
                <div class="post-thumbnail"><a href="{{ route('single-post',$post->slug) }}"><img src="{{ asset($post->image) }}" alt="{{ $post->name }}" class="img-fluid"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">

                    <div class="date meta-last">{{ $post->created_at->format('D M | Y') }}</div>
                    <div class="category"><a href="{{ route('single-post',$post->slug) }}">{{ $post->category->name }}</a></div>
                  </div><a href="{{ route('single-post',$post->slug) }}">
                    <h3 class="h4">{{ $post->name }}</h3></a>
                  <p class="text-muted">{{ $post->short_des }}</p>
                  <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                      <div class="avatar"><img src="{{ asset($post->author->image) }}" alt="..." class="img-fluid"></div>
                      <div class="title"><span>{{ $post->author->name }}</span></div></a>
                    <div class="date"><i class="icon-clock"></i> {{ $post->created_at->diffForHumans() }}</div>
                    <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                  </footer>
                </div>
              </div>
            @endforeach
          </div>
          {{-- <!-- Pagination -->
          <nav aria-label="Page navigation example">
            <ul class="pagination pagination-template d-flex justify-content-center">
              <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-left"></i></a></li>
              <li class="page-item"><a href="#" class="page-link active">1</a></li>
              <li class="page-item"><a href="#" class="page-link">2</a></li>
              <li class="page-item"><a href="#" class="page-link">3</a></li>
              <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-right"></i></a></li>
            </ul>
          </nav> --}}
        </div>
      </main>
      <aside class="col-lg-4">
        <!-- Widget [Search Bar Widget]-->
        <div class="widget search">
          <header>
            <h3 class="h6">Search the blog</h3>
          </header>
          <form action="#" class="search-form">
            <div class="form-group">
              <input type="search" placeholder="What are you looking for?">
              <button type="submit" class="submit"><i class="icon-search"></i></button>
            </div>
          </form>
        </div>
        {{-- @php
            print_r($latest_post);

        @endphp --}}
        <!-- Widget [Latest Posts Widget]        -->
        <x-partial.blog-sidebar :tags="$tags" :categories="$categories" :let="$latest_post"/>
      </aside>
    </div>
  </div>
@stop
