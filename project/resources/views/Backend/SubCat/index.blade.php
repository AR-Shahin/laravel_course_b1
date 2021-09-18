
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
                <tbody id="subCatTable"></tbody>
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
                        <span class="text-danger" id="subCatIdError"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Sub Category Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Sub Category Name">
                        <span class="text-danger" id="subCatNameError"></span>
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
          <h5 class="modal-title" id="exampleModalLabel">Edit Sub Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" id="updateSubCategoryForm">
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="" id="edit_category_id" class="form-control">
                        <option value="">Select A Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger" id="edit_sub_cat_id_error"></span>
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="hidden" name="" id="edit_sub_cat_slug">
                    <input type="text" name="name" id="edit_sub_name" class="form-control" placeholder="Enter a Sub Category Name">
                    <span class="text-danger" id="edit_sub_cat_name_error"></span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-block">Add Sub Category</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection


@push('script')
    <script>
    // const base_url = window.location.origin;

    function table_data_row(data) {
                var	rows = '';
                var i = 0;
                $.each( data, function( key, value ) {
                    rows += '<tr>';
                    rows += '<td>'+ ++i +'</td>';
                    rows += '<td>'+value.name+'</td>';
                    rows += '<td data-id="'+value.id+'" class="text-center">';
                    rows += '<a class="btn btn-sm btn-info text-light" id="editRow" data-id="'+value.slug+'" data-toggle="modal" data-target="#editModal">Edit</a> ';
                    rows += '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="'+value.slug+'" >Delete</a> ';
                    rows += '</td>';
                    rows += '</tr>';
                });
                $('#subCatTable').html(rows)
            }

    // Fetch
    function getAllSubCategory(){
                axios.get("{{ route('admin.fetch-sub-category') }}")
                .then((res) => {
                    // console.log(res)
                    table_data_row(res.data)
                })
            }

        getAllSubCategory();

    // Store      
    $('body').on('submit','#addSubCategoryForm',function(e){
    e.preventDefault();
    let name = $('#name');
    let category_id = $('#category_id')
    let subCatNameError = $('#subCatNameError');
    let subCatIdError = $('#subCatIdError');

        subCatNameError.text('');
        if(name.val() === ''){
            subCatNameError.text('Field Must Be Not Empty!');
            return null;
        }
        subCatIdError.text('');
        if(category_id.val() === ''){
            subCatIdError.text('Field Must Be Not Empty!');
            return null;
        }

    axios.post("{{ route('admin.sub-category.store') }}",{
        name: name.val(),
        category_id : category_id.val()
    })
    .then((res) => {
        category_id.val('')
        name.val('');
        getAllSubCategory();
        setSuccessMessage();
    })
    .catch((err)=>{
       if(err.response.data.errors.name){
        subCatNameError.text(err.response.data.errors.name[0]);
       }
    })
 })

    // Edit
        $('body').on('click', '#editRow', function (){
            let slug = $(this).attr('data-id');
            let url = base_url + '/admin/sub-category/' + slug;

            console.log(url);

            let edit_sub_cat_id = $('#edit_category_id');
            let edit_name = $('#edit_sub_name');
            let edit_sub_cat_slug = $('#edit_sub_cat_slug');
            let subCatEditIdError = $('#edit_sub_cat_id_error');
            let subCatEditNameError = $('#edit_sub_cat_name_error');

            axios.get(url)
            .then((res) => {
                let data = res.data; 
                edit_sub_cat_id.val(data.category_id);
                edit_name.val(data.name);
                edit_sub_cat_slug.val(data.slug);
            })
            .catch((err) => {
                console.log(err);
            })

        })
    
        // Update
        $('body').on('submit', "#updateSubCategoryForm", function(e){
            e.preventDefault();

            let slug = $('#edit_sub_cat_slug').val();
            let url = base_url + '/admin/sub-category/' + slug;

            // console.log(url);

            let edit_sub_cat_id = $('#edit_category_id').val();
            let update_name = $('#edit_sub_name').val();
            let subCatEditIdError = $('#edit_sub_cat_id_error');
            let subCatEditNameError = $('#edit_sub_cat_name_error');

            axios.put(url, {
                category_id : edit_sub_cat_id,
                name : update_name
            })
            .then((res) => {
                $('#editModal').modal('toggle');
                getAllSubCategory();
                setSuccessMessage('Data update Successfully!');
            })
            .catch((err) => {           
                if(err.response.data.errors.name){
                    subCatEditNameError.text(err.response.data.errors.name[0]);
                }
            })
        })

        // Delete
        $('body').on('click','#deleteRow',function(){
            let slug = $(this).attr('data-id');
            let url = base_url + '/admin/sub-category/' + slug;
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true,
            margin : '5em',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(url).then(res => {
                getAllSubCategory();
        })
        swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })

        })

    </script>
@endpush
