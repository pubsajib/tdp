@extends('admin.admin_master')
@section('title')
Add Category
@endsection

@section('mainbodycontent')

<div class="container">
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
            <div><span class="text-center text-bold"><h3>Insert Author Role</h3></span></div>
            <form method="POST" action="{{ route('store.author')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">User/Author Name</label>
                <input type="text" class="form-control" name="name">
              
            </div>  

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email">
               @error('email')
               <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>  

            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" name="password">            
            </div>  
                    
            <br>
            <div class="container">
                <div class="col-md-12">
                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="category" value="1"> Category <i class="input-helper"></i></label>

                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="post" value="1">Post<i class="input-helper"></i></label>

                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="s_setting" value="1">Settings<i class="input-helper"></i></label>

                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="p_gallery" value="1"> Gallery <i class="input-helper"></i></label>

                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="video" value="1"> Videos <i class="input-helper"></i></label>

                </div> 
                <br> 
                
                <div class="col-md-12">

                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="ads" value="1"> Ads<i class="input-helper"></i></label>

                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="user_rol" value="1"> User <i class="input-helper"></i></label>

                </div> 
            </div>
            <br>

            <button type="submit" class="btn btn-primary col-md-4">Submit</button>
            </form>
         </div>
        </div>
    </div>
</div>
@endsection