@extends('admin.admin_master')
@section('title')
Website Setting
@endsection

@section('mainbodycontent')

<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <div><span class="text-center text-bold"><h3>Website Settings</h3></span></div>
                <form method="POST" action="{{ route('update.websitesetting',$website->id)}}" enctype="multipart/form-data">
                @csrf

               
                <div class="col-md-12"> 
                    <div class="row">
                        <div class="col-md-3"> 
                       
                            <div class="form-group">
                                <label for="">Website Logo</label>
                                <div class="input-group col-xs-6">
                                        <span class="input-group-append">
                                        <img src="{{asset($website->image) }}" style="margin-right: 50px">
                                        <input type="hidden" name="exlogo" value="{{$website->image }}" class="file-upload-default">  
                                        </span>
                                </div>  
                                <br>
                            
                            </div>
                        </div> 

                        <div class="col-md-4">
                            <label>Change Logo</label>

                                <div class="input-group col-xs-6">
                                    <span class="input-group-append">
                                    <input type="file" name="logo" class="file-upload-default">    
                                    </span>
                                        @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                                    
                        </div>
                        
                             
                    </div>         
                </div>

                    <div class="row">
                        
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputName1">Phone or Mobile Number</label>
                                    <input type="text" class="form-control" name="phone" value="{{$website->phone}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputName1">Email Address</label>
                                    <input type="text" class="form-control" name="email" value="{{$website->email}}">
                                </div>
                            </div>
                    </div>

                <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" name="address" value="{{$website->address }}">
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>    

                <div class="form-group">
                        <label for="exampleInputEmail1">About Short</label>
                        <input type="text" class="form-control" name="about_short" value="{{$website->about_short }}">
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                        <label for="exampleInputEmail1">About Long</label>
                        <textarea type="text" class="form-control" name="about_long" id="summernote">{{$website->about_long}}</textarea>
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
              
            

          

        
           
            
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>

        </div>

    </div>
</div>
@endsection