
@extends('layouts.backend_master')
@section('title', 'Sub Category')
@section('master_content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-info">Manage Sub Category</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                <tbody id="catTbody"></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h2 class="text-info">Add Sub Category</h2>
            </div>
            <div class="card-body">
                <form id="addSubCategoryForm">
                    <div class="form-group">
                        <label for="">Parent Category</label>
                        <select name="" id="category_id" class="form-control">
                            <option value="">Select A Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Sub Category Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Sub Category Name">
                        <span class="text-danger" id="catError"></span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block">Add New Sub Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="editForm">
            <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" class="form-control" id="edit_name" placeholder="Enter Category Name">
                <input type="hidden" id="edit_cat_slug">
                <span class="text-danger" id="catEditError"></span>
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-block">Update Category</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection


@push('script')
    <script>
    $('body').on('submit','#addSubCategoryForm',function(e){
    e.preventDefault();
    let name = $('#name');
    let category_id = $('#category_id')
    let catError = $('#catError');
    // console.log(name.val());
    catError.text('');
    if(name.val() === ''){
        catError.text('Field Must not be Empty!')
        return null;
    }
    axios.post("{{ route('admin.sub-category.store') }}",{
        name: name.val(),
        category_id : category_id.val()
    })
    .then((res) => {
        category_id.val('')
        name.val('');
        setSuccessMessage();
    })
    .catch((err)=>{
       if(err.response.data.errors.name){
           catError.text(err.response.data.errors.name[0])
       }
    })
 })
    </script>
@endpush
