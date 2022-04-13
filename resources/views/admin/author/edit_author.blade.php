@extends('admin.admin_master')
@section('title')
Edit Author
@endsection

@section('mainbodycontent')

<div class="container">
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
            <div><span class="text-center text-bold"><h3>Update Author Role</h3></span></div>
            <form method="POST" action="{{ route('update.author',$author->id)}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Author Name</label>
                <input type="text" class="form-control" name="name" value="{{$author->name}}">
              
            </div>  

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" value="{{$author->email}}">
               @error('email')
               <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>  
                    
            <br>
            <div class="container">
                <div class="col-md-12">
                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="category" value="1"
                    <?php if($author->category == 1){ echo "checked";} ?>
                    > Category <i class="input-helper"></i></label>

                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="post" value="1"
                    <?php if($author->post == 1){ echo "checked";} ?>
                    >Post<i class="input-helper"></i></label>

                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="s_setting" value="1"
                    <?php if($author->s_setting == 1){ echo "checked";} ?>
                    >Settings<i class="input-helper"></i></label>

                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="p_gallery" value="1"
                    <?php if($author->p_gallery == 1){ echo "checked";} ?>
                    > Gallery <i class="input-helper"></i></label>

                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="video" value="1"
                    <?php if($author->video == 1){ echo "checked";} ?>
                    > Videos <i class="input-helper"></i></label>

                </div> 
                <br> 
                
                <div class="col-md-12">

                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="ads" value="1"
                    <?php if($author->ads == 1){ echo "checked";} ?>
                    > Ads<i class="input-helper"></i></label>

                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="user_rol" value="1"
                    <?php if($author->user_rol == 1){ echo "checked";} ?>
                    > User <i class="input-helper"></i></label>

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