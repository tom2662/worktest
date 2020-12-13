@extends('layout.testlayout')
@section('title', 'Multi Array')
@section('content')
<div class="upload-files">
<div><h3>Multi Array</h3></div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-primary">
        <thead><tr class="bg-primary"><td>Order No</td><td>Ingredients</td></tr></thead>
        <tbody>
        @foreach($data as $dataVal)
        <tr>
        <td>
            {{$dataVal[0]}}

        </td>
        <td>
        <a id="toggleButton" onClick="getDetail({{$loop->index}})">Detail</a>
        <div id="detail[{{$loop->index}}]" style="display: none;">
            <table class="table table-bordered table-hover table-secondary">
            <thead><tr class="bg-primary"><td>Name</td><td>Value</td></tr></thead>
            <tbody>
                @foreach($dataVal[1] as $subData)
                    <tr><td>{{$subData[0]}}</td><td>{{$subData[1]}}</td></tr>
                @endForeach
            </tbody>
            </table>
        </div>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</div>
<script>
    function getDetail(index) {   
        console.log(index); 
            if (document.getElementById("detail["+index+"]").style.display === "none"){
                document.getElementById("detail["+index+"]").style.display = "block";
            }              
             else {
                document.getElementById("detail["+index+"]").style.display = "none";
             }          
    };
</script>
@endsection