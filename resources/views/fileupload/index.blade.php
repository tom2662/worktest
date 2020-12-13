@extends('layout.testlayout')
@section('title', 'File Upload')
@section('content')
<div class="upload-files">
<div><h3>file upload</h3></div>


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

				<form action="{{ url('uploadprocess')}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
 
					<div class="form-group">
						<input class="form-control" type="file" name="file">
					</div>
                    <div class="form-group">
					<input type="submit" value="Upload" class="btn btn-primary">
                    </div>
				</form>
    
            @if (!empty($upload))
            <table class="table">
                <thead>
                    <tr>
                        <th> File Name</th>
                        <th> Path</th>
                        <th> Size  </th>
                        <th> Extension</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($upload as $data)
                    <tr>
                        <td> {{$data->fileName}} </td>
                        <td> {{$data->filePath}} </td>
                        <td> {{$data->fileSize}} </td>
                        <td> {{$data->fileExtension}} </td>
                    </tr>
                    @endforeach
            </tbody>
            </table>
            @else 
                <div>
                No data
                </div>
            @endif
</div>
@endsection