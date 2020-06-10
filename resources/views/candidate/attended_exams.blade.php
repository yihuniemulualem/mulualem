@extends('adminlte::page')

@section('title', 'Exams')

@section('content')

@if(isset($status))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    Successfully submitted the exam.
</div>
@endif

<table id="attended_exams" class="display" style="width:100%">
    <thead>
        <tr>
            <th width="10%">SL No</th>
            <th width="30%">Exam Name</th>
            <th width="20%">Exam Date</th>
            <th width="20%" class="text-center">Action</th>
        </tr>
    </thead>
</table>

@stop

@section('js')
<script>
$(function() {
    getTable();
});

function getTable() {
    $('#attended_exams').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "attended_exams",
        },
        columns: [{
                data: 'id',
            },
            {
                data: 'exam_name',
            },
            {
                data: 'exam_date',
            },
            {
                data: 'action',
                orderable: false
            }
        ],
        fnRowCallback: function(nRow, aData, iDisplayIndex) {
            $("td:first", nRow).html(iDisplayIndex + 1);
            return nRow;
        },
    });
}
</script>
@stop