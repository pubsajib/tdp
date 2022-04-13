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
                            
                         <div class="col-md-6"><a href="{{route('add.ads')}}" class="btn btn-primary">Add New Advertisement</a></div>
                    </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ad Banner</th> 
                                            <th>Link</th> 
                                            <th>type</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ad Banner</th> 
                                            <th>Link</th> 
                                            <th>Type</th> 
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       @php ($id = 1)
                                       @foreach( $ads as $row)
                                        <tr>
                                            <td>{{($id++)}}</td>                                       
                                            
                                            <td><img src="{{ asset($row->ads) }}" class="img-responsive" style="max-height:100px; max-width:100px"></td>
                                            <td>{{ $row->link }}</td>
                                            <td>
                                                @if($row->type == 2)
                                                <span class="btn btn-success">Horizontal Ads</span>
                                                @else
                                                <span class="btn btn-info">Square Ads</span>
                                                @endif

                                            </td>
                                            <td>
                                        
                                            <a href="{{ route('delete.ads',$row->id)}}" onclick="return confirm('Are you sure DELETE This')"  class="btn btn-danger">Delete</a>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $ads->links('paginationlinks') }}   
                        
                        <div class="card-header py-3">  
                            <div class="col-md-6"><a href="{{ route('add.ads')}}" class="btn btn-primary">Add New Ads Banner</a></div>
                        </div>
                    </div>
            </div>    


@endsection