@extends('admin.admin_master')
@section('title')
Edit Category
@endsection

@section('mainbodycontent')

<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
            <div><span class="text-center text-bold"><h3>Update Category</h3></span></div>
            <form method="POST" action="{{ route('update.category',$category->id)}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
                <input type="text" class="form-control" name="category" value="{{$category->category}}">
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