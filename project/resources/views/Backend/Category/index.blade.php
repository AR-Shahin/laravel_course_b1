
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
@endsection

@push('script')
<script>
   const setSuccessMessage = (title = 'Data Save Successfully!') => {
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: title,
      })
}
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
                rows += '<a class="btn btn-sm btn-info text-light" id="editRow" data-id="'+value.id+'" data-toggle="modal" data-target="#editModal">Edit</a> ';
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
let base_url = window.location.origin;
 // delete

$('body').on('click','#deleteRow',function(){
    let slug = $(this).attr('data-id');
    let url = base_url + '/admin/category/' + slug;
console.log(url);
axios.delete(url).then(res => {
   getAllCategory();
   setSuccessMessage('Data Delete Successfuly!')
})
})
</script>
@endpush
