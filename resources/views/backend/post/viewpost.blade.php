@extends('admin.admin_master')

@section('title')
All News
@endsection

@section('mainbodycontent')


<div class="container-fluid">
     
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                         <div class="col-md-6"><h3 class="text-center m-0 font-weight-bold text-primary">News List</h3></div>
                    </div>

                    <div class="card-header py-3">        
                    <div class="col-md-6"><a href="{{ route('create.post') }}" class="btn btn-primary">Add News Post</a></div>
                    </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            
                                            <th>Picture</th>
                                            <th>Details</th>
                                            <th>Post Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                    <th>#</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            
                                            <th>Picture</th>
                                            <th>Details</th>
                                            <th>Post Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       @php($i = 1)
                                       @foreach($post as $row)
                                        <tr>
                                            <td>{{($i++)}}</td>
                                            <td>{{ Str::limit($row->title,40) }}</td>
                                            <td>{{ $row->category }}</td>
                                            
                                            <td><img src="{{ asset($row->image) }}" style="width:150px; height:150px"></td>
                                            <td>{{ Str::limit($row->details,40) }}</td>
                                            <td>{{ Carbon\Carbon::parse($row->post_date)->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ route('edit.post',$row->id)}}" class="btn btn-info">Edit Post</a>
                                                <a href="{{ route('delete.post',$row->id)}}" onclick="return confirm('Are you sure DELETE This News')"  class="btn btn-danger">Delete</a>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                               
                            </div>
                            {{ $post->links('paginationlinks') }}
                        </div>
                        <div class="card-header py-3">
                            
                            <div class="col-md-6"><a href="{{ route('create.post') }}" class="btn btn-primary">Add News Post</a></div>
                        </div>
                    </div>
            </div>    


@endsection