@extends('layout.testlayout')
@section('title', 'Mouse Over')
@section('content')
<div class="upload-files">
<div><h3>Mouse Over</h3></div>


    @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
    @endif

    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
    @endif

    <form action="{{ url('mouseoverresult')}}" method="POST" >
    {{ csrf_field() }}
    <div class="form-group">
        <label  title='type 1 desc ... '>
            <input type="radio" name="data" id="data" value="type 1"> type 1 
        </label>
    </div>
    <div class="form-group">
        <label title='type 2 desc ... '>
            <input type="radio" name="data" id="data" value="type 2"> type 2 
        </label>
    </div>
    <div class="form-group">
        <label  title='type 3 desc ... '>
            <input type="radio" name="data" id="data" value="type 3"> type 3
         </label>
    </div>
    <div class="form-group">
        <label  title='type 4 desc ... '>
            <input type="radio" name="data" id="data" value="type 4"> type 4 
        </label>
    </div>

    <div class="form-group">
        <button class="btn btn-default">save</button>
    </div>
    </form>

    <script>
        $("input[type*=radio]").each(function(i,value){ 
    $(this).attr("title"," "+$(this).val());
    });
    </script>


</div>
@endsection