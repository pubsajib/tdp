@extends('admin.admin_master')
@section('title')
Add Post
@endsection

@section('mainbodycontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-center text-wight-bold">News Upload Form</h4>                   
                    <form class="forms-sample" action="{{ route('store.post')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Title <span style="color:red;font-weight:bold;">*</span></label>
                            <input type="text" class="form-control" name="title" id="titlecount">
                            <div class="d-flex">
                                <p class="error-msg" style="color: red; float: left; display: none">Character Limit Exceed</p>
                                <p class="float-right" style="float: right;"><span id="titlecountno">0</span>/200</p>
                                <br clear="both">
                            </div>
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Sub-Title</label>
                            <input type="text" class="form-control" name="subtitle" id="exampleInputName1">                          
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Follow-UP</label>
                            <input type="text" class="form-control" name="followup" id="exampleInputName1">
                        </div>                                      
                        <div class=row>
                            <div class="col-md-6 form-group">
                                <label for="exampleFormControlSelect2">Select Category <span style="color:red;font-weight:bold;">*</span></label>
                                <select class="form-control" name="category_id" id="exampleFormControlSelect2">
                                    <option disabled="" selected="">---Select Category---</option>
                                    
                                @foreach($category as $row)
                                <option value="{{ $row->id }}">{{$row->category}} </option>
                                @endforeach
                                </select>

                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="exampleFormControlSelect2">Select Sub-Category <span style="color:red;font-weight:bold;">*</span></label>
                                <select class="form-control" name="subcategory_id" id="subcategory_id">
                                    <option disabled="" selected="">---Select Sub-Category---</option>
                                </select>                            
                            </div>
                        </div>               
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Picture Upload <span style="color:red;font-weight:bold;">*</span></label>
                                    <div class="input-group col-xs-6">
                                    <span class="input-group-append">
                                    <input type="file" name="image" id="image" class="file-upload-default">
                                    </span>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img id="preview-image-before-upload" src="#"
                                    alt="preview image" style="max-height: 200px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Picture Credit <span style="color:red;font-weight:bold;">*</span></label>
                                    <input type="text" class="form-control" name="imagecredit" id="exampleInputName1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Author</label>
                                    <select class="form-control" name="author">
                                        <option disabled="" selected="">---Select Author---</option>
                                        <option value="নিজস্ব প্রতিবেদক">নিজস্ব প্রতিবেদক</option>
                                        <option value="ফেনোমেনাল বাংলাদেশ ডেস্ক">ফেনোমেনাল বাংলাদেশ ডেস্ক</option>
                                        <option value="ফেনোমেনাল বাংলাদেশ প্রতিনিধি">ফেনোমেনাল বাংলাদেশ প্রতিনিধি</option>
                                        <option value="স্পোর্টস ডেস্ক">স্পোর্টস ডেস্ক</option>
                                        <option value="বিনোদন ডেস্ক">বিনোদন ডেস্ক</option>                          
                                        <option value="আন্তর্জাতিক ডেস্ক">আন্তর্জাতিক ডেস্ক</option>                   
                                        <option value="অনলাইন ডেস্ক">অনলাইন ডেস্ক</option>                          
                                       >                          
                                    </select>
                                </div>
                            </div>    
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">যদি জেলা প্রতিনিধি হয় (উদাহরনঃ গাজিপুর প্রতিনিধি)</label>
                            <input type="text" class="form-control" name="author2" id="exampleInputName1">                          
                        </div>

                        <div class="form-group">
                            
                            <label for="exampleTextarea1">Lead News Section <span style="color:red;font-weight:bold;">*</span></label>
                            <textarea id="count" class="form-control" name="leadnews" id="summernote1"></textarea>
                            <div class="d-flex">
                                <p class="error-msg" style="color: red; float: left; display: none">Character Limit Exceed</p>
                                <p class="float-right" style="float: right;"><span id="countno">0</span>/200</p>
                                <br clear="both">
                            </div>
                                             
                            @error('leadnews')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> 

                        <div class="form-group">
                            <label for="exampleTextarea">Details News Section <span style="color:red;font-weight:bold;">*</span></label>
                            <textarea class="form-control" name="details" id="summernote"></textarea>
                        </div> 
            <hr>
            <h4 class="text-center">Extra Option</h4>
            <br>
            <div class="container-fluite">
                <div class="col-md-12">                  
                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="bigthumbnail" value="1">Sports Bigthumbnail<i class="input-helper"></i></label>

                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="ent_bigthumbnile" value="1">Ent Big Thumb<i class="input-helper"></i></label>

                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="first_section" value="1"> First Section <i class="input-helper"></i></label>

                    <label class="form-check-label col-md-2">
                    <input type="checkbox" class="form-check-input" name="first_section_thumbnail" value="1"> First Section Big Thum <i class="input-helper"></i></label>
                </div>  
                <br><br>
                <hr>
                    <h3 class="text-center">SEO Option</h3>
                        
                        <div class="form-group">
                            <label for="exampleInputName1">Meta Title <span style="color:red;font-weight:bold;"></span></label>
                            <input type="text" class="form-control" name="metatitle" id="exampleInputName1">                           
                            @error('metatitle')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Keywords <span style="color:red;font-weight:bold;"></span></label>
                            <textarea type="text" class="form-control" name="keyword" id="exampleInputName1"> </textarea>                           
                            @error('keyword')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Meta Description <span style="color:red;font-weight:bold;"></span></label>
                            <textarea type="text" class="form-control" name="description" id="exampleInputName1"> </textarea>                            
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Tags <span style="color:red;font-weight:bold;"></span></label>
                            <textarea type="text" class="form-control" name="tag" id="exampleInputName1"> </textarea>
                            
                            @error('tag')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>               
                </div>
                <br><br><br>           
            
                      <button type="submit" class="btn btn-primary col-md-4">Upload News Post</button>
                     
                    </form>
                  </div>
                </div>
              </div>

<!--- this is for sub category select porstion--->

<script type="text/javascript">
   $(document).ready(function() {
         $('select[name="category_id"]').on('change', function(){
             var category_id = $(this).val();
             if(category_id) {
                 $.ajax({
                     url: "{{  url('/get/subcategory/') }}/"+category_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                       $("#subcategory_id").empty();
                              $.each(data,function(key,value){
                                  $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory+'</option>');
                             });                            
                     },                   
                 });
             } else {
                 alert('danger');
             }
         });
     });
</script>
<!--Form Validation Charecter count---->
<script>
	$(function(){
		$("#titlecount").keyup(function(event) {
			$("#titlecountno").text($(this).val().length);
			var x = $(this).val().length;
			if (x>200) 
			{
				$(this).css("border",'1px solid red');
				$(".error-msg").show();
			}
			else
			{
				$(".error-msg").hide();
				$(this).css("border",'');
			}
		});
	})
</script>

<script>
	$(function(){
		$("#count").keyup(function(event) {
			$("#countno").text($(this).val().length);
			var x = $(this).val().length;
			if (x>200) 
			{
				$(this).css("border",'1px solid red');
				$(".error-msg").show();
			}
			else
			{
				$(".error-msg").hide();
				$(this).css("border",'');
			}
		});
	})
</script>

<!-------Image Upload Preview Script---->
<script type="text/javascript">    
    $(document).ready(function (e) {  
    $('#image').change(function(){            
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-image-before-upload').attr('src', e.target.result); 
        }   
        reader.readAsDataURL(this.files[0]);     
    });
    
    });
 
</script>

@endsection