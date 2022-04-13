@extends('admin.admin_master')
@section('title')
Add Photo
@endsection

@section('mainbodycontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center text-wight-bold">Photo Upload</h4>
                        
                        
                        <form class="forms-sample" action="{{ route('storepost.image') }}" method="post" enctype="multipart/form-data">
                        @csrf                    
                       
                        <div class="form-group">
                                <label>Upload Photo</label>
                                <div class="input-group">
                                    <input type="file" name="postphoto" class="form-control" placeholder="Choose image" id="postphoto" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon04">Picture</button>
                                    </span>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group">
                            <img id="preview-image-before-upload" src=""
                                alt="preview image" style="max-height: 250px;">
                        </div>
                                           
            
                        <button type="submit" class="btn btn-primary col-md-4">Add Photo</button>
                     
                        </form>
                  </div>
                </div>
            </div>

    

<script type="text/javascript">
      
    $(document).ready(function (e) {
    
    $('#postphoto').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-image-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });
    
    });
 
</script>

@endsection