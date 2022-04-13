@extends('admin.admin_master')
@section('title')
Add New Ads
@endsection

@section('mainbodycontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center text-wight-bold">Add Banner Upload</h4>
                        
                        <form class="forms-sample" action="{{ route('store.ads') }}" method="post" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="form-group">
                            <label for="exampleInputName1">Link</label>
                            <input type="text" class="form-control" name="link" id="exampleInputName1">

                            @error('link')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                       

                        <div class="form-group">
                                <label>Upload Banner Ads</label>
                                <div class="input-group">
                                    <input type="file" name="ads" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon04">Ads Banner</button>
                                    </span>
                                    @error('ads')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>

                           
                        
                        <div class="form-group">
                                <label for="exampleFormControlSelect2">Select Type Here</label>
                                <select class="form-control" name="type">
                                    <option disabled="" selected="">---Select Type---</option>
                                    <option value="2">Horizontal Ads Banner</option>
                                    <option value="1">Square Ads Banner</option>
                                    
                              
                                </select>
                        </div>
                          
                         
                            <br>
            
                        <button type="submit" class="btn btn-primary col-md-4">Insert Ads Info</button>
                     
                        </form>
                  </div>
                </div>
            </div>

@endsection