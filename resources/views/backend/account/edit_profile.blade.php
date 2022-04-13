@extends('admin.admin_master')
@section('title')
Edit User Profile
@endsection

@section('mainbodycontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center text-wight-bold">User Profile Setting</h4>
                        
                        <form class="forms-sample" action="{{ route('store.profileinfo') }}" method="post" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$editData->name}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$editData->email}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputName1">Position</label>
                            <input type="text" class="form-control" name="position" value="{{$editData->position}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Mobile</label>
                            <input type="text" class="form-control" name="mobile" value="{{$editData->mobile}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Address</label>
                            <input type="text" class="form-control" name="address" value="{{$editData->address}}">
                        </div>

                        <div class="form-group">
                                <label for="exampleFormControlSelect2">Select Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="" disabled="" selected="">---Select Gender---</option>
                                    <option value="Male" {{$editData->gender == "Male"? "selected":""}}>Male</option>
                                    <option value="Female" {{$editData->gender == "Female"? "selected":""}}>Female</option>                            
                                </select>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label>User Photo</label>
                                        <div class="input-group">
                                            <input type="file" name="photo" id="photo" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                            
                                            </span>
                                            @error('ads')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                </div>  
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label>Current Profile Picture</label>
                                        

                                            <img id="showPhoto" src="{{ (!empty($editData->photo))?url('upload/user_photo/'.$editData->photo):url('upload/No-Profile-image.jpg')}}" style="width:100px; height:100px"alt="">
                                            <input type="hidden" name="photo">                                               
                                        
                                </div>  
                            </div> 
                        </div>                        
                            
                
                          
                         
                            <br>
            
                        <button type="submit" class="btn btn-primary col-md-4">Update User Info</button>


            
                        
         
                     
                        </form>

                        </br>
                        <div><a href="{{route('show.password')}}"class="btn btn-info">Change Password</a></div>
                  </div>
                </div>
            </div>

    <script type="text/javascript">
        $(document).ready(function(){
        $('#photo').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showPhoto').attr('src',e.target.result);
            }
            reader.ReadAsDataURL(e.target.files['0']);
        });
        });
    </script>     

@endsection