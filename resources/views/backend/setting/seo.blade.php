@extends('admin.admin_master')
@section('title')
Social Media Setting
@endsection

@section('mainbodycontent')

<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
            <div><span class="text-center text-bold"><h3>SEO Settings</h3></span></div>
            <form method="POST" action="{{ route('update.seo',$seo->id)}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Meta Author</label>
                <input type="text" class="form-control" name="meta_author" value="{{$seo->meta_author}}">
               @error('category')
               <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Meta Title</label>
                <input type="text" class="form-control" name="meta_title" value="{{$seo->meta_title}}">
               @error('category')
               <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Meta Keyword</label>
                <input type="text" class="form-control" name="meta_keyword" value="{{$seo->meta_keyword}}">
               @error('category')
               <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>


            <div class="form-group">
                    <label for="exampleTextarea1">Meta Description</label>
                    <textarea class="form-control" name="meta_description"> {{ $seo->meta_description }} </textarea>
            </div>

            <div class="form-group">
                    <label for="exampleTextarea1">Google Tag Mangager</label>
                    <textarea class="form-control" name="google_tag_manager"> {{ $seo->google_tag_manager }} </textarea>
            </div>
            

            <div class="form-group">
                <label for="exampleInputEmail1">Google verification</label>
                <input type="text" class="form-control" name="google_verification" value="{{$seo->google_verification}}">
               @error('category')
               <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>

            <div class="form-group">
                    <label for="exampleTextarea1">Alexa Analytics</label>
                    <textarea class="form-control" name="alexa_analytics"> {{ $seo->alexa_analytics }} </textarea>
            </div>
           
            
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
         </div>
        </div>
    </div>
</div>
@endsection