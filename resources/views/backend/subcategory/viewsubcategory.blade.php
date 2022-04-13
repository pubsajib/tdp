@extends('admin.admin_master')

@section('title')
Sub-Categories
@endsection

@section('mainbodycontent')


<div class="container-fluid">
     
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                         <div class="col-md-6"><h3 class="text-center m-0 font-weight-bold text-primary">Sub-Category List</h3></div>
                    </div>

                    <div class="card-header py-3">        
                    <div class="col-md-6"><a href="{{ route('add.subcategory') }}" class="btn btn-primary">Add Sub-Category</a></div>
                    </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sub-Category</th>
                                            
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>#</th>
                                            <th>Sub-Category</th>
                                            <th>Category Name</th>
                                            <th>Action</th> 
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       @php($i = 1)
                                       @foreach($subcategory as $row)
                                        <tr>
                                            <td>{{($i++)}}</td>
                                            <td>{{ $row->subcategory }}</td>
                                            <td>{{ $row->category }}</td>
                                            <td>
                                                <a href="{{ route('edit.subcategory',$row->id)}}" class="btn btn-info">Edit</a>
                                                <a href="{{ route('delete.subcategory',$row->id)}}" onclick="return confirm('Are you sure DELETE This')"  class="btn btn-danger">Delete</a>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                               
                            </div>
                            {{ $subcategory->links('paginationlinks') }}
                        </div>
                        <div class="card-header py-3">
                            
                            <div class="col-md-6"><a href="{{ route('add.subcategory') }}" class="btn btn-primary">Add Sub-Category</a></div>
                        </div>
                    </div>
            </div>    


@endsection