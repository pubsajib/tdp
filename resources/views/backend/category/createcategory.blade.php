@extends('admin.admin_master')
@section('title')
Add Category
@endsection

@section('mainbodycontent')

<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
            <div><span class="text-center text-bold"><h3>Add Category</h3></span></div>
            <form method="POST" action="{{ route('store.category')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Category English</label>
                <input type="text" class="form-control" name="category" placeholder="Category Name Here">
     
                @error('category')
               <span class="text-danger">{{ $message }}</span>
               @enderror
             </div>  
                    
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
        </div>
    </div>
</div>

@endsection