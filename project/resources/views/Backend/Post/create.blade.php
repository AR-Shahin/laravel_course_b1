
@extends('layouts.backend_master')
@section('title', 'Post Create')
@section('master_content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Add New Post</h4>
        <a href="" class="btn btn-success btn-sm"><i class="fa fa-angle-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">Post Name</label>
                        <input type="text" class="form-control @error('name')
                        is-invalid
                        @enderror" name="name" placeholder="Enter Post Name" id="name">
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
        </form>
    </div>
</div>
@endsection

@push('script')
    <script>
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
