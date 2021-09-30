<div>
    {{-- @php
        print_r($tags)
    @endphp --}}
    <div class="widget latest-posts">
        <header>
          <h3 class="h6">Latest Posts</h3>
        </header>
        <div class="blog-posts">
          @foreach ($latestPosts as $post)
          <a href="{{ route('single-post',$post->slug) }}">
              <div class="item d-flex align-items-center">
                <div class="image"><img src="{{ asset($post->image) }}" alt="{{ $post->name }}" class="img-fluid"></div>
                <div class="title"><strong>{{ $post->name }}</strong>
                  <div class="d-flex align-items-center">
                    <div class="views"><i class="icon-eye"></i> {{ $post->view }}</div>
                    <div class="comments"><i class="icon-comment"></i>12</div>
                  </div>
                </div>
              </div></a>
          @endforeach
      </div>
      </div>
      <!-- Widget [Categories Widget]-->
      <div class="widget categories">
        <header>
          <h3 class="h6">Categories</h3>
        </header>
        @foreach ($categories->load('posts') as $category)
        <div class="item d-flex justify-content-between"><a href="{{ route('category-post',$category->slug) }}">{{ $category->name }}</a><span>{{ $category->posts->count() }}</span></div>
        @endforeach
      </div>
      <!-- Widget [Tags Cloud Widget]-->
      <div class="widget tags">
        <header>
          <h3 class="h6">Tags</h3>
        </header>
        <ul class="list-inline">
            @foreach ($tags as $tag)
            <li class="list-inline-item"><a href="{{ route('tags-post',$tag->id) }}" class="tag">#{{ $tag->name }}</a></li>
            @endforeach
        </ul>
      </div>
</div>
