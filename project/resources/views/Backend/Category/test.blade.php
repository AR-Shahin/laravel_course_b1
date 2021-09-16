
@extends('layouts.backend_master')
@section('title', 'Category')
@section('master_content')
<div class="container">
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Row 1 Data 1</td>
                <td>Row 1 Data 2</td>
            </tr>
            <tr>
                <td>Row 2 Data 1</td>
                <td>Row 2 Data 2</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
@endpush
@push('script')
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script>
   $('#table_id').DataTable();
</script>
@endpush
