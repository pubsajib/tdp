@extends('admin.admin_master')

@section('title')
Ads Park
@endsection

@section('mainbodycontent')


<div class="container-fluid">

        <!-- Page Heading -->
        

            <!-- DataTales Example -->               
                
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="col-md-6"><h3 class="text-center m-0 font-weight-bold text-primary">Ads List</h3></div>
                           
                        </div>
                    <div class="card-header py-3">
                            
                         <div class="col-md-6"><a href="{{route('add.coronaup')}}" class="btn btn-primary">Add New Advertisement</a></div>
                    </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Corona Banner</th> 
                                          
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Corona Banner</th> 
                                           
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       @php ($id = 1)
                                       @foreach( $coronaphoto as $row)
                                        <tr>
                                            <td>{{($id++)}}</td>                                       
                                            
                                            <td><img src="{{ asset($row->photo) }}" class="img-responsive" style="max-height:100px;"></td>                                                                                                         
                                            
                                            <td>
                                            <a href="{{ route('edit.corona',$row->id)}}" class="btn btn-info">Update</a>
                                            <a href="{{ route('delete.corona',$row->id)}}" onclick="return confirm('Are you sure DELETE This')"  class="btn btn-danger">Delete</a>
                                            </td>
                         
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                     
                        
                        <div class="card-header py-3">  
                            <div class="col-md-6"><a href="{{ route('add.coronaup')}}" class="btn btn-primary">Add New Ads Banner</a></div>
                        </div>
                    </div>
            </div>    


@endsection