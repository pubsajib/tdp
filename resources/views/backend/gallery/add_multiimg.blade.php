@extends('admin.admin_master')
@section('title')
Add Multi Photo
@endsection

@section('mainbodycontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center text-wight-bold">Photo Upload</h4>
                        
                        <form class="forms-sample" action="{{ route('store.multiimage') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputName1">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleInputName1">

                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Description </label>
                            <textarea type="text" class="form-control" name="description" id="exampleInputName1"></textarea>
                        </div>


                       
                        <div class="form-group">
                                <label>Cover Image</label>
                                <div class="input-group">
                                    <input type="file" name="coverimg" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon04">Picture</button>
                                    </span>
                                    @error('coverimg')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group">
                                <label>Post Image (Select Multi Images)</label>
                                <div class="input-group">
                                    <input type="file" name="images[]" multiple class="form-control" id="inputGroupFile04"  aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon04">Picture</button>
                                    </span>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>
                           
            
                        <button type="submit" class="btn btn-primary col-md-4">Add Photo</button>
                     
                        </form>
                  </div>
                </div>
            </div>

@endsection