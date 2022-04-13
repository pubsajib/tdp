@extends('admin.admin_master')

@section('title')
All Categories
@endsection

@section('mainbodycontent')


<div class="container-fluid">

        <!-- Page Heading -->
        

            <!-- DataTales Example -->               
                
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="col-md-6"><h3 class="text-center m-0 font-weight-bold text-primary">Category List</h3></div>
                           
                        </div>
                    <div class="card-header py-3">
                            
                         <div class="col-md-6"><a href="{{ route('add.category') }}" class="btn btn-primary">Add Category</a></div>
                    </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       @php ($id = 1)
                                       @foreach( $category as $row)
                                        <tr>
                                            <td>{{($id++)}}</td>
                                            <td>{{ $row->category }}</td>
                                            <td>
                                            <a href="{{ route('edit.category',$row->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('delete.category',$row->id)}}" onclick="return confirm('Are you sure DELETE This')"  class="btn btn-danger">Delete</a>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $category->links('paginationlinks') }}   
                        
                        <div class="card-header py-3">  
                            <div class="col-md-6"><a href="{{ route('add.category') }}" class="btn btn-primary">Add Category</a></div>
                        </div>
                    </div>
            </div>    


@endsection