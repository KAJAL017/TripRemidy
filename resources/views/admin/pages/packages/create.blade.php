@extends('admin.layouts.master')
@push('admin.styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush
@section('admin.content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content d-flex justify-content-between align-items-center">
                                <h4 class="nk-block-title mb-0">Add Package</h4>
                                <a href="{{ url()->previous() }}" class="btn btn-primary">
                                    <em class="icon ni ni-arrow-left px-1"></em> Back
                                </a>
                            </div>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <form  id="package-form" class="form-validate is-alter" enctype="multipart/form-data">
                                    <div class="row g-gs">
                                        <!-- Heading -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="tour-name">Package Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="tour-name" name="package-name" placeholder="Enter package name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="tour-heading">Heading</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="tour-heading" name="tour-heading" placeholder="Enter package title" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Location -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="tour-location">Location</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="tour-location" name="tour-location" placeholder="Enter location" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Google Map Link -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="gmap-link">Google Map Link</label>
                                                <div class="form-control-wrap">
                                                    <input type="url" class="form-control" id="gmap-link" name="gmap-link" placeholder="Paste Google Maps URL">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="price">Price</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price in INR" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Badge (Top Rated) -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="tour-badge">Badge</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" id="tour-badge" name="tour-badge" data-placeholder="Select badge">
                                                        <option value=""></option>
                                                        <option value="top-rated">Top Rated</option>
                                                        <option value="popular">Popular</option>
                                                        <option value="new">New</option>
                                                        <option value="best-deal">Best Deal</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Group Size -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="group-size">Group Size</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="group-size" name="group-size" placeholder="E.g. 2-10 people">
                                                </div>
                                            </div>
                                        </div>


                                         <!-- Available Languages -->
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="available-languages">Available Languages</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" multiple="multiple" id="available-languages" name="available-languages[]" data-placeholder="Select languages">
                                                        <option value="english">English</option>
                                                        <option value="spanish">Spanish</option>
                                                        <option value="french">French</option>
                                                        <option value="german">German</option>
                                                        <option value="italian">Italian</option>
                                                        <option value="japanese">Japanese</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                                                                    <!-- Overview -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Overview</label>
                                                    <div id="editor-overview" class="quill-editor" style="height: 300px;"></div>
                                                    <input type="hidden" name="tour-overview" id="tour-overview">
                                                </div>
                                            </div>

                                            <!-- Highlights -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Highlights</label>
                                                    <div id="editor-highlights" class="quill-editor" style="height: 300px;"></div>
                                                    <input type="hidden" name="tour-highlights" id="tour-highlights">
                                                </div>
                                            </div>

                                            <!-- What's Included -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">What's Included</label>
                                                    <div id="editor-included" class="quill-editor" style="height: 300px;"></div>
                                                    <input type="hidden" name="included-items" id="included-items">
                                                </div>
                                            </div>

                                            <!-- Important Info -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Important Information</label>
                                                    <div id="editor-info" class="quill-editor" style="height: 300px;"></div>
                                                    <input type="hidden" name="important-info" id="important-info">
                                                </div>
                                            </div>



                                        <!-- Images Upload -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Upload Images (1005x765 recommended)</label>
                                               <input type="file" name="images[]" id="" class="form-control" multiple>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary" id="submit-btn">
                                                    <span id="submit-text">Save Tour Information</span>
                                                    <span id="submit-spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('admin.scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fullToolbar = [
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            [{ 'font': [] }],
            [{ 'size': ['small', false, 'large', 'huge'] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'script': 'sub' }, { 'script': 'super' }],
            [{ 'header': 1 }, { 'header': 2 }, 'blockquote', 'code-block'],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }],
            [{ 'direction': 'rtl' }, { 'align': [] }],
            ['link', 'image', 'video', 'formula'],
            ['clean']
        ];

        const quillOverview = new Quill('#editor-overview', {
            theme: 'snow',
            modules: { toolbar: fullToolbar },
            placeholder: 'Enter tour overview...'
        });

        const quillHighlights = new Quill('#editor-highlights', {
            theme: 'snow',
            modules: { toolbar: fullToolbar },
            placeholder: 'Enter tour highlights...'
        });

        const quillIncluded = new Quill('#editor-included', {
            theme: 'snow',
            modules: { toolbar: fullToolbar },
            placeholder: 'Enter included items...'
        });

        const quillInfo = new Quill('#editor-info', {
            theme: 'snow',
            modules: { toolbar: fullToolbar },
            placeholder: 'Enter important information...'
        });

        const initEditorContent = (quill, inputId) => {
            const hiddenInput = document.getElementById(inputId);
            if (hiddenInput && hiddenInput.value) {
                quill.clipboard.dangerouslyPasteHTML(hiddenInput.value);
            }
        };

        initEditorContent(quillOverview, 'tour-overview');
        initEditorContent(quillHighlights, 'tour-highlights');
        initEditorContent(quillIncluded, 'included-items');
        initEditorContent(quillInfo, 'important-info');

        const imageHandler = function () {
            const range = this.quill.getSelection();
            const value = prompt('Please enter the image URL');
            if (value) {
                this.quill.insertEmbed(range.index, 'image', value, Quill.sources.USER);
            }
        };

        const videoHandler = function () {
            const range = this.quill.getSelection();
            const value = prompt('Please enter the video URL');
            if (value) {
                this.quill.insertEmbed(range.index, 'video', value, Quill.sources.USER);
            }
        };

        [quillOverview, quillHighlights, quillIncluded, quillInfo].forEach(quill => {
            quill.getModule('toolbar').addHandler('image', imageHandler);
            quill.getModule('toolbar').addHandler('video', videoHandler);
        });

        const notyf = new Notyf();

        $("#package-form").on("submit", function (e) {
            e.preventDefault();
            $('#tour-overview').val(quillOverview.root.innerHTML);
            $('#tour-highlights').val(quillHighlights.root.innerHTML);
            $('#included-items').val(quillIncluded.root.innerHTML);
            $('#important-info').val(quillInfo.root.innerHTML);
            $('#submit-text').text('Please wait...');
            $('#submit-spinner').removeClass('d-none');
            $('#submit-btn').prop('disabled', true);
            let formData = new FormData(this);
            $.ajax({
                url: "{{ route('admin.packages.store') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $("#package-form")[0].reset();
                    quillOverview.setContents([]);
                    quillHighlights.setContents([]);
                    quillIncluded.setContents([]);
                    quillInfo.setContents([]);
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMsg = '';
                    $.each(errors, function (key, value) {
                        errorMsg += value + '\n';
                    });
                    notyf.error(errorMsg || 'Something went wrong');
                },
                complete: function () {
                    $('#submit-text').text('Save Tour Information');
                    $('#submit-spinner').addClass('d-none');
                    $('#submit-btn').prop('disabled', false);
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('.js-select2').select2({
            minimumResultsForSearch: Infinity
        });
    });
</script>
@endpush
