
@extends('layouts.backend_master')
@section('title', 'Category')
@section('master_content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-info">Manage Category</h2>
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
                <h2 class="text-info">Add Category</h2>
            </div>
            <div class="card-body">
                <form id="addCategoryForm">
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Category Name">
                        <span class="text-danger" id="catError"></span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block">Add New Category</button>
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
    function getAllCategory(){
        axios.get("{{ route('admin.fetch-category') }}")
        .then((res) => {
            table_data_row(res.data)
        })
    }
    getAllCategory();

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

            $('#catTbody').html(rows)
 }

 // store
 $('body').on('submit','#addCategoryForm',function(e){
    e.preventDefault();
    let name = $('#name');
    let catError = $('#catError');
    // console.log(name.val());
    catError.text('');
    if(name.val() === ''){
        catError.text('Field Must not be Empty!')
        return null;
    }
    axios.post("{{ route('admin.category.store') }}",{
        name: name.val()
    })
    .then((res) => {
        getAllCategory();
        name.val('');
        setSuccessMessage();
    })
    .catch((err)=>{
       if(err.response.data.errors.name){
           catError.text(err.response.data.errors.name[0])
       }
    })
 })

 // delete

$('body').on('click','#deleteRow',function(){
    let slug = $(this).attr('data-id');
    let url = base_url + '/admin/category/' + slug;
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
   getAllCategory();
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

// edit
$('body').on('click','#editRow',function(){
    let slug = $(this).data('id');
    let url = `${base_path}/admin/category/${slug}`;
    let edit_name = $('#edit_name');
    let edit_cat_slug = $('#edit_cat_slug');
    let catEditError = $('#catEditError');

    axios.get(url).then(res => {
        let {data} = res;
        edit_name.val(data.name)
        edit_cat_slug.val(data.slug);
    }).catch(err => {
        console.log(err);
    })
})

// update
$('body').on('submit','#editForm',function(e){
    e.preventDefault()
    let slug = $('#edit_cat_slug').val();
    let url = `${base_path}/admin/category/${slug}`;
    axios.put(url,{
        name : $('#edit_name').val()
    }).then(res =>{
        $('#editModal').modal('toggle')
        getAllCategory();
        setSuccessMessage('Data Updated Successfully!')
    }).catch(err =>{
        if(err.response.data.errors.name){
           $('#catEditError').text(err.response.data.errors.name[0])
       }
    })
})
</script>
@endpush
