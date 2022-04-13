@extends('admin.admin_master')
@section('title')
User Account Setting
@endsection

@section('mainbodycontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center text-wight-bold">User Profile</h4>
                        
                        <div class="card" style="width: 18rem;">
                        <img src="{{ (!empty($editData->photo))?url('upload/user_photo/'.$editData->photo):url('upload/No-Profile-image.jpg')}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Name : {{ Auth::user()->name }}</h5>
                            <p class="card-text"> Email : {{ $editData->email }}</p>
                            <p class="card-text"> Position : {{ $editData->position }}</p>
                            <p class="card-text"> Mobile : {{ $editData->mobile }}</p>
                            <p class="card-text"> Gender : {{ $editData->gender }}</p>
                            <p class="card-text"> Address : {{ $editData->address }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ route('edit.user.profile') }}" class="btn btn-info">Edit Profile</a></li>
                            
                        </ul>
                        
                        </div>
                        
                  </div>
                </div>
            </div>

@endsection