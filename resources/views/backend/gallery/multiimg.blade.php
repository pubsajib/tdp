@extends('admin.admin_master')

@section('title')
Photo Gallery
@endsection

@section('mainbodycontent')


<div class="container-fluid">

        <!-- Page Heading -->
        

            <!-- DataTales Example -->               
                
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="col-md-6"><h3 class="text-center m-0 font-weight-bold text-primary">Photo Post</h3></div>
                           
                        </div>
                    <div class="card-header py-3">
                            
                         <div class="col-md-6"><a href="{{route('add.multiimage')}}" class="btn btn-primary">Add Multi Image Post</a></div>
                    </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th> 
                                            <th>Description</th> 
                                            <th>Cover Image</th> 
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       @php ($id = 1)
                                        @foreach($imgposts as $imgpost)
                                        <tr>
                                            <td>{{($id++)}}</td>                                       
                                            <td>{{ $imgpost->title }}</td>
                                            <td>{{ $imgpost->description }}</td>
                                          
                                            <td><img src="{{ asset('image/imagepost/cover/' . $imgpost->coverimg) }}" class="img-responsive" style="max-height:100px; max-width:100px"></td>                                           
                                            <td>                                        
                                            <a href="/imgpost/edit/{{ $imgpost->id }}" class="btn btn-outline-primary">Update</a>
                                            </td>
                                            <td>                                        
                                                <form action="/imgpost/delete/{{ $imgpost->id }}" method="post">
                                                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?');" type="submit">Delete</button>
                                                @csrf 
                                                @method('delete')
                                                </form>
                                            </td>
                                            
                                        </tr>
                                      @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                          
                        
                        <div class="card-header py-3">  
                            <div class="col-md-6"><a href="{{ route('add.multiimage')}}" class="btn btn-primary">Add Multi Image Post</a></div>
                        </div>
                    </div>
            </div>    


@endsection