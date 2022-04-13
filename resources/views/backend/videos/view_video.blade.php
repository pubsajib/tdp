@extends('admin.admin_master')

@section('title')
Video Gallery
@endsection

@section('mainbodycontent')


<div class="container-fluid">

        <!-- Page Heading -->
        

            <!-- DataTales Example -->               
                
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="col-md-6"><h3 class="text-center m-0 font-weight-bold text-primary">Video Gallery</h3></div>
                           
                        </div>
                    <div class="card-header py-3">
                            
                         <div class="col-md-6"><a href="{{route('add.video')}}" class="btn btn-primary">Add Video</a></div>
                    </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th> 
                                            <th>Video</th> 
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th> 
                                            <th>Video</th> 
                                             
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       @php ($id = 1)
                                       @foreach( $video as $row)
                                        <tr>
                                            <td>{{($id++)}}</td>                                       
                                            <td>{{ $row->title }}</td>                                                                                                                       
                                            <td>{{ $row->embed_code }}</td>                                                                                                                       
                                            <td>
                                        
                                            <a href="{{ route('delete.video',$row->id)}}" onclick="return confirm('Are you sure DELETE This')"  class="btn btn-danger">Delete</a>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $video->links('paginationlinks') }}   
                        
                        <div class="card-header py-3">  
                            <div class="col-md-6"><a href="{{ route('add.video')}}" class="btn btn-primary">Add Video</a></div>
                        </div>
                    </div>
            </div>    


@endsection