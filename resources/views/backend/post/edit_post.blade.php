@extends('admin.admin_master')
@section('title')
Edit News Post
@endsection

@section('mainbodycontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @php
    $sub = DB::table('subcategories')->where('category_id',$post->category_id)->get();
    @endphp
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-center text-wight-bold">Post Details</h4>

                    <form class="forms-sample" id="post_form" action="{{ route('update.post',$post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="alert alert-success" id="success_message" style="display:none"></div>
                        <div class="alert alert-danger" id="error_message" style="display: none"></div>
                        <div class="form-group">
                            <label for="exampleInputName1">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Sub-Title</label>
                            <input type="text" class="form-control" name="subtitle" value="{{ $post->subtitle }}" id="sub_title">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Follow-UP</label>
                            <input type="text" class="form-control" name="followup" value="{{ $post->followup }}" id="followup">
                        </div>
                        <div class=row>
                            <div class="col-md-6 form-group">
                                <label for="exampleFormControlSelect2">Select Category</label>
                                <select class="form-control" name="category_id" id="exampleFormControlSelect2">
                                    <option disabled="" selected="">---Select Category---</option>
                                @foreach($category as $row)
                                <option value="{{ $row->id }}" <?php if ($row->id == $post->category_id){ echo "selected";} ?>
                                >{{$row->category}} </option>
                                @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="exampleFormControlSelect2">Select Sub-Category</label>
                                <select class="form-control" name="subcategory_id" id="subcategory_id" >
                                    <option disabled="" selected="">---Select Sub-Category---</option>

                                    @foreach($sub as $row)
                                <option value="{{ $row->id }}" <?php if ($row->id == $post->subcategory_id){ echo "selected";} ?>
                                >{{$row->subcategory}} </option>

                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Tags</label>
                            <input type="text" class="form-control" name="tag" value="{{ $post->tag }}" id="exampleInputName1">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>News Picture Upload</label>
                                    <div class="input-group col-xs-6">
                                    <span class="input-group-append">
                                    <input type="file" name="image" class="file-upload-default">
                                    </span>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>

                                    <label>Old Picture</label>
                                    <div class="input-group col-xs-6">
                                    <span class="input-group-append">
                                    <img src="{{ asset($post->image) }}" style="width: 150px; height: 100px; margin-right: 50px">
                                    <input type="hidden" name="ex_image" value="{{ $post->image  }}" class="file-upload-default">
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Picture Caption</label>
                                    <input type="text" class="form-control" name="image_caption" id="image_caption" value="{{ $post->image_caption }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Picture Credit <span style="color:red;font-weight:bold;">*</span></label>
                                    <input type="text" class="form-control" name="imagecredit" value="{{$post->imagecredit}}" id="imagecredit">
                                </div>
                            </div>
                            @php
                             $authorData=[
                                'নিজস্ব প্রতিবেদক',
                                'ফেনোমেনাল বাংলাদেশ ডেস্ক',
                                'ফেনোমেনাল বাংলাদেশ প্রতিনিধি',
                                'স্পোর্টস ডেস্ক',
                                'বিনোদন ডেস্ক',
                                'আন্তর্জাতিক ডেস্ক',
                                'অনলাইন ডেস্ক',
                                'নাম প্রকাশে অনিচ্ছুক',
                            ];
                            @endphp
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Author</label>
                                <select class="form-control" name="author" id="author" value="$post->author">
                                    <option disabled="" selected="">---Select Author---</option>
                                    <option value="নিজস্ব প্রতিবেদক" @if ($post->author == 'নিজস্ব প্রতিবেদক') Selected @endif>নিজস্ব প্রতিবেদক</option>
                                    <option value="ফেনোমেনাল বাংলাদেশ ডেস্ক"
                                    @if ($post->author == 'ফেনোমেনাল বাংলাদেশ ডেস্ক') Selected @endif>ফেনোমেনাল বাংলাদেশ ডেস্ক</option>
                                    <option value="ফেনোমেনাল বাংলাদেশ প্রতিনিধি" @if ($post->author == 'ফেনোমেনাল বাংলাদেশ প্রতিনিধি') Selected @endif>ফেনোমেনাল বাংলাদেশ প্রতিনিধি</option>
                                    <option value="স্পোর্টস ডেস্ক" @if ($post->author == 'স্পোর্টস ডেস্ক') Selected @endif>স্পোর্টস ডেস্ক</option>
                                    <option value="বিনোদন ডেস্ক" @if ($post->author == 'বিনোদন ডেস্ক') Selected @endif>বিনোদন ডেস্ক</option>
                                    <option value="আন্তর্জাতিক ডেস্ক" @if ($post->author == 'আন্তর্জাতিক ডেস্ক') Selected @endif>আন্তর্জাতিক ডেস্ক</option>
                                    <option value="অনলাইন ডেস্ক" @if ($post->author == 'অনলাইন ডেস্ক') Selected @endif>অনলাইন ডেস্ক</option>
                                    <option value="নাম প্রকাশে অনিচ্ছুক" @if ($post->author == 'নাম প্রকাশে অনিচ্ছুক') Selected @endif>নাম প্রকাশে অনিচ্ছুক</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">যদি জেলা প্রতিনিধি হয় (উদাহরনঃ গাজিপুর প্রতিনিধি)</label>
                            <input type="text" class="form-control" name="author2" value="{{ in_array($post->author, $authorData) ? '' : $post->author }}" id="author2">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Lead News Section</label>
                            <textarea class="form-control" name="leadnews" id="count">{{ $post->leadnews }}</textarea>
                            @error('leadnews')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea1">Details News Section</label>
                            <textarea class="form-control" name="details" id="summernote"> {{ $post->details }} </textarea>
                        </div>
            <hr>
            <h4 class="text-center">Extra Option</h4>

            <div class="container-fluite">
            <div class="col-md-12">
                <label class="form-check-label col-md-2">
                <input type="checkbox" class="form-check-input" name="headline" value="1"
                <?php if($post->headline == 1){ echo "checked";} ?>
                > Head Line <i class="input-helper"></i></label>

                <label class="form-check-label col-md-2">
                <input type="checkbox" class="form-check-input" name="bigthumbnail" value="1"
                <?php if($post->bigthumbnail == 1){ echo "checked";} ?>
                > 	Bigthumbnail<i class="input-helper"></i></label>

                <label class="form-check-label col-md-2">
                <input type="checkbox" class="form-check-input" name="ent_bigthumbnile" value="1"
                <?php if($post->ent_bigthumbnile == 1){ echo "checked";} ?>
                >Entertainment Bigthumbnail<i class="input-helper"></i></label>

                <label class="form-check-label col-md-2">
                <input type="checkbox" class="form-check-input" name="first_section" value="1"
                <?php if($post->first_section == 1){ echo "checked";} ?>
                > First Section <i class="input-helper"></i></label>

                <label class="form-check-label col-md-2">
                <input type="checkbox" class="form-check-input" name="first_section_thumbnail" value="1"
                <?php if($post->first_section_thumbnail == 1){ echo "checked";} ?>
                > First section thumbnail <i class="input-helper"></i></label>
            </div>

            <br><br>
                <hr>
                    <h3 class="text-center">SEO Option</h3>
                        <div class="form-group">
                            <label for="exampleInputName1">Meta Title <span style="color:red;font-weight:bold;"></span></label>
                            <input type="text" class="form-control" name="metatitle" value="{{ $post->metatitle }}" id="metatitle">

                            @error('metatitle')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Keywords <span style="color:red;font-weight:bold;"></span></label>
                            <textarea type="text" class="form-control" name="keyword" id="keyword"> {{ $post->keyword }} </textarea>
                            @error('keyword')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Meta Description <span style="color:red;font-weight:bold;"></span></label>
                            <textarea type="text" class="form-control" name="description" id="description">{{ $post->description }}</textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Tags <span style="color:red;font-weight:bold;"></span></label>
                            <textarea type="text" class="form-control" name="tag" id="tag">{{ $post->tag }}</textarea>

                            @error('tag')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                 </div>
                    <br><br><br>
                      <button type="submit" class="btn btn-primary mr-2">Update Now</button>

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

   $(document).on("submit", "#post_form", function(event) {
       event.preventDefault();

       var title = $("#title").val();
       var category = $("#exampleFormControlSelect2").val();
       var subcategory = $("#subcategory_id").val();
       var image = $("#image").val();
       var imagecredit = $("#imagecredit").val();
       var leadnews = $("#count").val();
       var details = $("#summernote").val();
       var metatitle = $("#metatitle").val();
       var keyword = $("#keyword").val();
       var description = $("#description").val();
       var tag = $("#tag").val();


       var validate = "";

       if (title.trim() == "") {
           validate = validate + "Title is required</br>";
           $('#title').addClass('border-danger');
       }
       else{
           $('#title').removeClass('border-danger');
       }

       if (category == "" || category == null) {
           validate = validate + "Category is required</br>";
           $('#exampleFormControlSelect2').addClass('border-danger');
       }
       else{
           $('#exampleFormControlSelect2').removeClass('border-danger');
       }

       if (subcategory == "" || subcategory == null) {
           validate = validate + "Sub category is required</br>";
           $('#subcategory_id').addClass('border-danger');
       }
       else{
           $('#subcategory_id').removeClass('border-danger');
       }

       if (imagecredit.trim() == "") {
           validate = validate + "Image credit is required</br>";
           $('#imagecredit').addClass('border-danger');
       }
       else{
           $('#imagecredit').removeClass('border-danger');
       }

       if (leadnews.trim() == "") {
           validate = validate + "Lead news is required</br>";
           $('#count').addClass('border-danger');
       }
       else{
           $('#count').removeClass('border-danger');
       }

       if (details.trim() == "") {
           validate = validate + "News details is required</br>";
           $('#summernote').addClass('border-danger');
       }
       else{
           $('#summernote').removeClass('border-danger');
       }

       if (metatitle.trim() == "") {
           validate = validate + "Meta title is required</br>";
           $('#metatitle').addClass('border-danger');
       }
       else{
           $('#metatitle').removeClass('border-danger');
       }

       if (keyword.trim() == "") {
           validate = validate + "Meta keyword is required</br>";
           $('#keyword').addClass('border-danger');
       }
       else{
           $('#keyword').removeClass('border-danger');
       }

       if (description.trim() == "") {
           validate = validate + "Meta description is required</br>";
           $('#description').addClass('border-danger');
       }
       else{
           $('#description').removeClass('border-danger');
       }

       if (tag.trim() == "") {
           validate = validate + "Meta tag is required</br>";
           $('#tag').addClass('border-danger');
       }
       else{
           $('#tag').removeClass('border-danger');
       }

       if (validate == "") {
           var formData = new FormData($("#post_form")[0]);
           var url = "{{ route('update.post',$post->id) }}";

           $.ajax({
               type: "POST",
               url: url,
               data: formData,
               success: function(data) {
                   $("html, body").animate({ scrollTop: 0 }, "slow");
                   if (data.status == 200) {
                       $("#success_message").show();
                       $("#error_message").hide();
                       $("#success_message").html(data.reason);
                   } else {
                       $("#success_message").hide();
                       $("#error_message").show();
                       $("#error_message").html(data.reason);
                   }
                   setTimeout(function(){
                       window.location.href="{{route('allnews.post')}}";
                   },2000)
               },
               error: function(data) {
                   $("html, body").animate({ scrollTop: 0 }, "slow");
                   $("#success_message").hide();
                   $("#error_message").show();
                   $("#error_message").html(data);
               },
               cache: false,
               contentType: false,
               processData: false
           });
       } else {
           $("html, body").animate({ scrollTop: 0 }, "slow");
           $("#success_message").hide();
           $("#error_message").show();
           $("#error_message").html(validate);
       }
   });
</script>
@endsection
