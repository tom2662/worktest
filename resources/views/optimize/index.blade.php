@extends('layout.testlayout')
@section('title', 'Optimize Query')
@section('content')
<div class="upload-files">
<div><h3>Optimize Query</h3></div>


                <div class="row">
                    <div class="table-responsive" >

                        <table id="example" class="table table-bordered table-hover table-primary" style="width:100%">
                            <thead>
                                <tr class="bg-primary">
                                    <td>Id</td>
                                    <td>Name</td>
                                </tr>
                            </thead>
                            <tbody>

                        </table>
                    </div>

                </div>


<script>
$(document).ready(function() {
    $('#example').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [[1,'asc']],
                "paging": true,
                "lengthMenu": [10, 25, 50, 75, 100],
                ajax: {
                    url: "{{url('/recordshowall')}}",
                },
                "bLengthChange": false,
                "pageLength": 10,
                "columns":[
                    {"data":"id"},
                    {"data":"name"},
                ],
                "initComplete": function(){
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                        }
                    });
                },
                "bDestroy": true,
                "language":{
                    "emptyTable":"No data available"
                },
            });


} );
</script>



</div>
@endsection