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

    <div>
        You select {{ $result }}
    </div>


</div>
@endsection