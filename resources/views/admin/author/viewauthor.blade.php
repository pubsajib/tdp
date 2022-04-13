@extends('admin.admin_master')

@section('title')
Authores
@endsection

@section('mainbodycontent')


<div class="container-fluid">

        <!-- Page Heading -->
        

            <!-- DataTales Example -->               
                
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="col-md-6"><h3 class="text-center m-0 font-weight-bold text-primary">Autor</h3></div>
                           
                        </div>
                    <div class="card-header py-3">
                            
                         <div class="col-md-6"><a href="{{ route('add.author') }}" class="btn btn-primary">Add New Author</a></div>
                    </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th> 
                                            <th>Eimail</th> 
                                             
                                            <th>Type</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>ID</th>
                                            <th>Name</th> 
                                            <th>Eimail</th> 
                                            
                                            <th>Type</th> 
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       @php ($id = 1)
                                       @foreach( $author as $row)
                                        <tr>
                                            <td>{{($id++)}}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                                                                       
                                            <td>
                                                @if($row->category == 1)
                                                <span class="btn btn-success">Category</span>
                                                @else                                               
                                                @endif

                                                @if($row->post == 1)
                                                <span class="btn btn-info">Post</span>
                                                @else                                               
                                                @endif

                                                @if($row->s_setting == 1)
                                                <span class="btn btn-success">Settings</span>
                                                @else                                               
                                                @endif

                                                @if($row->p_gallery == 1)
                                                <span class="btn btn-success">Photo Gallery</span>
                                                @else                                               
                                                @endif

                                                @if($row->video == 1)
                                                <span class="btn btn-success">Video Gallery</span>
                                                @else                                               
                                                @endif

                                                @if($row->ads == 1)
                                                <span class="btn btn-success">Ads</span>
                                                @else                                               
                                                @endif

                                                @if($row->user_rol == 1)
                                                <span class="btn btn-success">User Role</span>
                                                @else                                               
                                                @endif

                                            </td>

                                            <td>
                                            <a href="{{ route('edit.author',$row->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('delete.author',$row->id)}}" onclick="return confirm('Are you sure DELETE This')"  class="btn btn-danger">Delete</a>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        
                        <div class="card-header py-3">  
                            <div class="col-md-6"><a href="{{ route('add.author') }}" class="btn btn-primary">Add New Author</a></div>
                        </div>
                    </div>
            </div>    


@endsection