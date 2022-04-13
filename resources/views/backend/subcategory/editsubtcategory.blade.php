@extends('admin.admin_master')
@section('mainbodycontent')

<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
            <div><span class="text-center text-bold"><h3>Update Sub-Category</h3></span></div>
            <form method="POST" action="{{route('update.subcategory',$subcategory->id)}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
                <input type="text" class="form-control" name="subcategory" value="{{$subcategory->subcategory}}">
               @error('category_en')
               <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>

            <div class="form-group">
                      <label for="exampleFormControlSelect2">Select Category</label>
                      <select class="form-control" name="category_id" id="exampleFormControlSelect2">
                        <option disabled="" selected="">---Select Category---</option>
                        
                        @foreach($category as $row)
                        <option value="{{ $row->id }}"
                        <?php if($row->id == $subcategory->category_id) echo"selected"; ?>
                        >{{$row->category}}</option>
                        @endforeach
                      </select>
                    </div>

          
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
         </div>
        </div>
    </div>
</div>

@endsection