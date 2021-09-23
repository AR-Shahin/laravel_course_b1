
@extends('layouts.backend_master')
@section('title', 'Post Create')
@push('css')
<link rel="stylesheet" href="{{ asset('Backend') }}/plugins/summernote/summernote-bs4.min.css">
@endpush
@section('master_content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Add New Post</h4>
        <a href="{{ route('admin.post.index') }}" class="btn btn-success btn-sm"><i class="fa fa-angle-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">Post Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Post Name" id="name" >
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <span id="customMessage"></span>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="">Category </label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select A Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="">Sub Category </label>
                      <select name="sub_cat_id" id="sub_cat_id" class="form-control">
                          <option value="">Select A SubCategory</option>

                      </select>
                        @error('sub_cat_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-gorup">
                        <label for="">Short Description</label>
                        <textarea name="short_des" id="short_des" class="form-control" cols="30" rows="10" placeholder="Enter a short descripton in your psot"></textarea>
                        @error('short_des')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-gorup">
                        <label for="">Long Description</label>
                        <textarea name="long_des" id="long_des" class="form-control" cols="30" rows="10" placeholder="Enter a short descripton in your psot"></textarea>
                        @error('long_des')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-gorup">
                <label for="">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-gorup">
                <label class="mt-2" for="">Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="1" id="status">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Post Active
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="0" id="status" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                      Post Inactive
                    </label>
                  </div>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
            <div class="form-group mt-2">
                <label for="">Tags :</label>
                @foreach ($tags as $tag)
                <span>{{ $tag->name }}</span>
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"> |
                @endforeach
            </div>
            <div class="form-gorup">
                <button type="submit" class="form-control btn btn-success btn-block mt-5">Create Post</button>
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
