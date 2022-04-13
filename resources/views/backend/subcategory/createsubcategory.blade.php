@extends('admin.admin_master')
@section('title')
Add Sub Category
@endsection

@section('mainbodycontent')

<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
            <div><span class="text-center text-bold"><h3>Add Sub-Category</h3></span></div>

            <form method="POST" action="{{ route('store.subcategory')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bold">Sub-Category</label>
                    <input type="text" class="form-control" name="subcategory" placeholder="Sub-Category Name Here">
                @error('subcategory')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="form-group">
                      <label for="exampleFormControlSelect2">Default select</label>
                      <select class="form-control" name="category_id" id="exampleFormControlSelect2">
                        <option disabled="" selected="">---Select Category---</option>
                        
                        @foreach($category as $row)
                        <option value="{{ $row->id }}">{{$row->category}} </option>
                        @endforeach
                      </select>

                    @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                                
                

                <button type="submit" class="btn btn-primary">Add Sub-Category</button>

            </form>
         </div>
        </div>
    </div>
</div>
@endsection