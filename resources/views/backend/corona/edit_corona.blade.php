@extends('admin.admin_master')
@section('title')
Edit Corona Info
@endsection

@section('mainbodycontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center text-wight-bold">Corona Update Upload</h4>
                        
                        <form class="forms-sample" action="{{ route('update.corona',$coronaphoto->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                   
                       

                        <div class="form-group">
                                <label>New Picture</label>
                                <div class="input-group">
                                    <input type="file" name="photo" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    
                                    </span>
                                    @error('photo')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div> 
                        <div class="form-group">
                                <label>Old Picture</label>
                                <div class="input-group">
                                    <img src="{{ asset($coronaphoto->photo) }}" style="width: 800px; height: 200px;">
                                    <input type="hidden" name="ex_image" value="{{ $coronaphoto->photo }}" class="file-upload-default">  
                                    </span>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div> 
                                             
                        
          

                        <button type="submit" class="btn btn-primary col-md-4">Add Photo</button>
                     
                        </form>
                  </div>
                </div>
            </div>

@endsection