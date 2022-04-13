@extends('admin.admin_master')
@section('title')
User Passwrd
@endsection

@section('mainbodycontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center text-wight-bold">Change Password</h4>
                        
                        <form class="forms-sample" action="{{ route('change.password') }}" method="post">
                        @csrf
                       
                        <div class="form-group">
                            <label for="exampleInputName1">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="oldpassword" value="">
                            @error('oldpassword')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Conform Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="">
                            @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        
                        
                       
                     
            
                        <button type="submit" class="btn btn-primary col-md-4">Update User Info</button>


            
                        
         
                     
                        </form>

                  </div>
                </div>
            </div>

        

@endsection