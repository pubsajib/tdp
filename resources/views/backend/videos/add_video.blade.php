@extends('admin.admin_master')
@section('title')
Add Video
@endsection

@section('mainbodycontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center text-wight-bold">Upload Video</h4>
                        
                        <form class="forms-sample" action="{{ route('store.video') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputName1">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleInputName1">

                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Embed code</label>
                            <input type="text" class="form-control" name="embed_code" id="exampleInputName1">

                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                       
                        
            
                        <button type="submit" class="btn btn-primary col-md-4">Insert Video</button>
                     
                        </form>
                  </div>
                </div>
            </div>

@endsection