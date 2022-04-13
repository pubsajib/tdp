@extends('admin.admin_master')
@section('title')
Social Media Setting
@endsection

@section('mainbodycontent')

<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
            <div><span class="text-center text-bold"><h3>Social Media Settings</h3></span></div>
            <form method="POST" action="{{ route('update.socialmedia',$social->id)}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Facebook</label>
                <input type="text" class="form-control" name="facebook" value="{{$social->facebook}}">
               @error('category')
               <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Twitter</label>
                <input type="text" class="form-control" name="twitter" value="{{$social->twitter}}">
               @error('category')
               <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Linkedin</label>
                <input type="text" class="form-control" name="linkedin" value="{{$social->linkedin}}">
               @error('category')
               <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Instagram</label>
                <input type="text" class="form-control" name="instagram" value="{{$social->instagram}}">
               @error('category')
               <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">YouTube</label>
                <input type="text" class="form-control" name="youtube" value="{{$social->	youtube}}">
               @error('category')
               <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>
           
            
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
         </div>
        </div>
    </div>
</div>
@endsection