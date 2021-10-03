@extends('layouts.frontend_app')

@section('front_title',$post->name)

@section('frontend_app_content')
<div class="container mt-5">
    <div class="row">
      <!-- Latest Posts -->
      <main class="post blog-post col-lg-8">
        <div class="container">
          <div class="post-single">
            <div class="post-thumbnail"><img src="{{ asset($post->image) }}" alt="..." class="img-fluid"></div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="category"><a href="#">{{ $post->category->name }}</a><a href="#"> {{ $post->sub_category->name }}</a></div>
              </div>
              <h1>{{ $post->name }}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
              <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                  <div class="avatar"><img src="{{ asset($post->author->image) }}" alt="..." class="img-fluid"></div>
                  <div class="title"><span>{{ $post->author->name }}</span></div></a>
                <div class="d-flex align-items-center flex-wrap">
                  <div class="date"><i class="icon-clock"></i> {{ $post->created_at->diffForHumans() }}</div>
                  <div class="views"><i class="icon-eye"></i> {{ $post->view }}</div>
                  <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                </div>
              </div>
             <div class="post_body">
                 <p class="lead">
                     {{ $post->long_des }}
                 </p>
             </div>
              <div class="post-tags">
                  @foreach ($post->tags as $tag)
                  <a href="#" class="tag">#{{ $tag->name }}</a>
                  @endforeach
                </div>


              <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row"><a href="#" class="prev-post text-left d-flex align-items-center">
                  <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                  <div class="text"><strong class="text-primary">Previous Post </strong>
                    <h6>I Bought a Wedding Dress.</h6>
                  </div></a><a href="#" class="next-post text-right d-flex align-items-center justify-content-end">
                  <div class="text"><strong class="text-primary">Next Post </strong>
                    <h6>I Bought a Wedding Dress.</h6>
                  </div>
                  <div class="icon next"><i class="fa fa-angle-right">   </i></div></a></div>
              <div class="post-comments">
                <header>
                  <h3 class="h6">Post Comments<span class="no-of-comments">({{ $post->comments->count() }})</span></h3>
                </header>
                @foreach ($post->comments as $comment)
                <div class="comment">
                  <div class="comment-header d-flex justify-content-between">
                    <div class="user d-flex align-items-center">
                      <div class="image"><img src="{{ asset($comment->user->image ) }}" alt="..." class="img-fluid rounded-circle"></div>
                      <div class="title"><strong>{{ $comment->user->name }}</strong><span class="date">{{ $comment->created_at->diffForHumans() }}</span></div>
                    </div>
                  </div>
                  <div class="comment-body">
                    <p>{{ $comment->comments }}</p>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="add-comment">
                <header>
                  <h3 class="h6">Leave a reply</h3>
                </header>
                <form action="{{route('post.comment',$post->slug)}}" class="commenting-form" method="POST">
                    @csrf
                  <div class="row">
                    <div class="form-group col-md-6">
                      <input type="text" name="name" id="username" placeholder="Name" class="form-control" value="{{ auth('user')->user() ? auth('user')->user()->name : old('name') }}">
                    </div>
                    <div class="form-group col-md-6">
                      <input type="email" name="email" id="useremail" placeholder="Email Address (will not be published)" class="form-control" value="{{ auth('user')->user() ? auth('user')->user()->email : old('email') }}">
                    </div>
                    <div class="form-group col-md-12">
                      <textarea name="comment" id="usercomment" placeholder="Type your comment" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                      <button type="submit" class="btn btn-secondary">Submit Comment</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
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
        <!-- Widget [Latest Posts Widget]        -->
        <!-- Pass this value in componest        -->
        <x-partial.blog-sidebar :tags="$tags" :categories="$categories" :latestPosts="$latestPosts" />
      </aside>
    </div>
  </div>
@stop
