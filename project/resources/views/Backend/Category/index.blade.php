
@extends('layouts.backend_master')
@section('title', 'Category')
@section('master_content')

<div class="row">
    <div class="col-6">
        <table class="table table-bordered">
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        {{-- @foreach ($categories as  $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>actions</td>
        </tr>
        </tr>
        @endforeach --}}
        <tbody id="catTbody"></tbody>
        </table>
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
                rows += '<a class="btn btn-sm btn-info text-light" id="editRow" data-id="'+value.id+'" data-toggle="modal" data-target="#editModal">Edit</a> ';
                rows += '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="'+value.id+'" >Delete</a> ';
                rows += '</td>';
                rows += '</tr>';
            });

            $('#catTbody').html(rows)
 }
</script>
@endpush
