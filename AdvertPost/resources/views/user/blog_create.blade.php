@extends('layouts.app') @section('page-styles')
<!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


@endsection @section('content')
<!-- CONTENT -->
<div class="rh-container full_width">
    <div class="rh-content-wrap clearfix">
        <!-- Main Side -->
        <div class="main-side page clearfix full_width" id="content">
            <div class="rh-post-wrapper">
                <article class="post mb0" id="page-3971">
                    <div class="title">
                        <h1 class="entry-title">Add Post</h1>
                    </div>
                    <div class="card-body">
                        <form id="new-blog-form" class="wpfepp wpfepp-form wpfepp-form-1" action="/post_new" method="POST" autocomplete="off" novalidate="novalidate">
                            @csrf
                            <div class="re-form-group mb20">
                                <label>Title*</label>
                                <input id="blog-title" type="text" class="form-control re-form-input required" name="blog_title" value="" autofocus required>

                            </div>
                            <div class="re-form-group mb20">
                                <label>Category*</label>
                                <select class="form-control re-form-input form-control-lg" id="blog-category" name="blog_category">
                                    @foreach($categories as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="re-form-group mb20">
                                <label>Thumbnail image*</label>
                                <div class="file-upload">
                                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                                    <div class="image-upload-wrap">
                                        <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                        <div class="drag-text">
                                            <h3>Drag and drop a file or select add Image</h3>
                                        </div>
                                    </div>
                                    <div class="file-upload-content">
                                        <img class="file-upload-image" id="blog-thumbnail" name="blog_thumbnail" src="#" alt="your image" />
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="re-form-group mb20 summernote-content">
                                <label>Content*</label>
                                <div id="summernote">
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#summernote').summernote({
                                            placeholder: 'Content...',
                                            height: 200
                                        });
                                        $('.summernote-content').find('.note-editable').html("");
                                    });
                                </script>
                            </div>
                            <div class="re-form-group mb20">
                                <label>Offer URL</label>
                                <input id="blog-url" type="text" class="form-control re-form-input required" name="blog_url" value="" autofocus>
                            </div>
                            <div class="re-form-group mb20 text-center">
                                <a class="wpfepp-button wpfepp-submit-button blue btn btn-primary" id="post-submit" name="wpfepp-form-1-submit">Submit</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a class="wpfepp-button wpfepp-save-button cancel btn btn-default" id="post-draft-submit" name="wpfepp-form-1-save">Save Draft</a>
                            </div>
                        </form>
                    </div>

                </article>
            </div>
        </div>
    </div>
</div>
@endsection @section('page-scripts')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="{{ asset('front/js/blog-create.js') }}"></script>
<script>
    // File Upload
    //
    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image-upload-wrap').hide();
                // console.log(e.target.result);

                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function() {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function() {
        $('.image-upload-wrap').removeClass('image-dropping');
    });
</script>
@endsection