
@extends('layouts.backend_master')
@section('title', 'Update Post')
@push('css')
<link rel="stylesheet" href="{{ asset('Backend') }}/plugins/summernote/summernote-bs4.min.css">
@endpush
@section('master_content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Update Post</h4>
        <a href="{{ route('admin.post.index') }}" class="btn btn-success btn-sm"><i class="fa fa-angle-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.post.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">Post Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $post->name }}" id="name" >
                        <span id="customMessage"></span>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="">Category </label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($post->category->id === $category->id)
                                selected
                            @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="">Sub Category </label>
                      <select name="sub_cat_id" id="sub_cat_id" class="form-control">

                          @foreach($category->subCategories as $subCategory)
                          <option value="{{ $subCategory->id }}" @if ($subCategory->id === $post->sub_category->id )
                              selected
                          @endif>{{ $subCategory->name }}</option>
                          @endforeach
                      </select>
                    </div>
                    @error('sub_cat_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-gorup">
                        <label for="">Short Description</label>
                        <textarea name="short_des" id="short_des" class="form-control" cols="30" rows="10" >{{ $post->short_des }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-gorup">
                        <label for="">Long Description</label>
                        <textarea name="long_des" id="long_des" class="form-control" cols="30" rows="10" >{{ $post->long_des }}</textarea>
                    </div>
                </div>
            </div>
            <div>
                <img width="100px" src="{{ asset($post->image) }}" alt="">
            </div>
            <div class="form-gorup">
                <label for="">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            {{-- @php
                dd($post->tags)
            @endphp --}}
            <div class="form-group mt-2">
                <label for="">Tags :</label>
                @foreach ($tags as $tag)
                <span>{{ $tag->name }}</span>
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" @if (in_array($tag->id,$postTags))
checked
                @endif> |
                @endforeach
            </div>
            <div class="form-gorup">
                <button type="submit" class="form-control btn btn-success btn-block mt-5">Update Post</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('Backend') }}/plugins/summernote/summernote-bs4.min.js"></script>

    <script>
        $('#short_des').summernote();
        $('#long_des').summernote();
        // dependency select

        let category = select('#category_id');

        category.addEventListener('change',(e)=>{
            let id = e.currentTarget.value;
            let url = `${base_path}/admin/get-sub-category-by-category/${id}`;
            if(id){
                axios.get(url).then(res => {
                let html = '';
                html += '<option value="">Select A Sub Category</option>'
                res.data.forEach(element => {
                    html += "<option value="+element.id+">"+ element.name +"</option>"
                });

                select('#sub_cat_id').innerHTML = html
               // console.log(category);
            }).catch(err => {
                log(err)
            })
            }else{

                select('#sub_cat_id').innerHTML = '<option value="">Select A Sub Category</option>'
            }
        })

        // check post exist or not
        let post = select('#name');
        let customMessage = select('#customMessage');
        post.addEventListener('focusout',function(e){
            // console.log();
            let url = `${base_path}/admin/check-post-exists-or-not/${this.value}`
            axios.get(url)
            .then(res =>{
                if(res.data.flag === 'EXIST'){
                    customMessage.textContent = 'Post Already Exist!';
                    customMessage.className = 'text-danger';
                }else{
                    customMessage.textContent = "Post Doesn't Exist!";
                    customMessage.className = 'text-success';
                }
            })
        })
    </script>
@endpush
