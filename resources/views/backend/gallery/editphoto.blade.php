@extends('admin.admin_master')
@section('title')
Edit Photo
@endsection

@section('mainbodycontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center text-wight-bold">Photo Upload</h4>
                        
                        <form class="forms-sample" action="{{ route('store.photo') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputName1">Title</label>
                            <input type="text" class="form-control" name="title" valule="{{$photo->title}}" id="exampleInputName1">

                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                       
                        <div class="form-group">
                                <label>Upload Photo</label>
                                <div class="input-group">
                                    <input type="file" name="photo" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon04">Picture</button>
                                    </span>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                    <label>Old Picture</label>
                                    <div class="input-group col-xs-6">
                                    <span class="input-group-append">
                                    <img src="{{ asset($photo->photo) }}" style="width: 150px; height: 100px; margin-right: 50px">
                                    <input type="hidden" name="ex_photo" value="{{ $photo->photo  }}" class="file-upload-default">  
                                    </span>
                                    </div>
                        </div>
                           
                        
                        <div class="form-group">
                                <label for="exampleFormControlSelect2">Select Category</label>
                                <select class="form-control" name="type">
                                    <option disabled="" selected="">---Select Category---</option>
                                    <option value="1">Big Photo</option>
                                    <option value="0">Small Photo</option>
                                    
                              
                                </select>
                        </div>
                          
                         
                            <br>
            
                        <button type="submit" class="btn btn-primary col-md-4">Add Photo</button>
                     
                        </form>
                  </div>
                </div>
            </div>

@endsection