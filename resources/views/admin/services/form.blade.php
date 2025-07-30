<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="m-portlet m-portlet--tab">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    @isset($service)
                        <i class="fa fa-layer-group"></i>&nbsp; {{ $service->title }} Service
                    @else
                        <i class="flaticon-add-circular-button"></i>&nbsp; Create a Service
                    @endisset
                </h3>
            </div>
        </div>
    </div>
    <form method="POST" class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data"
        action="{{ isset($service) ? route('services.update', $service->id) : route('services.store') }}">
        @csrf
        @isset($service)
            @method('PUT')
        @endisset

        <div class="m-portlet__body">
            <div class="row">
                <!-- English Fields (Left Side) -->
                <div class="col-6">
                    <div class="form-group m-form__group">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control m-input @error('title') is-invalid @enderror"
                            value="{{ old('title', $service->title ?? '') }}" placeholder="Title" required>
                        @error('title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group m-form__group">
                        <label class="form-label" for="description">Description</label>
                        <textarea name="description" id="description" style="height: 140px;"
                            class="form-control m-input @error('description') is-invalid @enderror" placeholder="Write a Description" required>{{ old('description', $service->description ?? '') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- Arabic Fields (Right Side) -->
                <div class="col-6">
                    <div class="form-group m-form__group">
                        <label class="form-label" for="title_ar" dir="rtl" style="font-size:15px;">أسم
                            الخدمة</label>
                        <input type="text" name="title_ar" id="title_ar"
                            class="form-control m-input @error('title_ar') is-invalid @enderror"
                            value="{{ old('title_ar', $service->title_ar ?? '') }}" placeholder="أسم الخدمة"
                            dir="rtl">
                        @error('title_ar')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group m-form__group">
                        <label class="form-label" for="description_ar" dir="rtl" style="font-size:15px;">تفاصيل
                            الخدمة</label>
                        <textarea name="description_ar" id="description_ar" dir="rtl" style="height: 140px;"
                            class="form-control m-input @error('description_ar') is-invalid @enderror" placeholder="اكتب الوصف">{{ old('description_ar', $service->description_ar ?? '') }}</textarea>
                        @error('description_ar')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row" style="padding: 10px;">
                <!-- Light Icon Upload -->
                <div class="col-md-4">
                    <div class="form-group m-form__group">
                        <label class="form-label" for="icon">Light Icon</label>
                        <div class="d-flex flex-wrap gap-2 icon-gallery" style="gap: 10px;">
                            @if (isset($service) && $service->icon)
                                <div class="image-box position-relative" style="width: 90px;">
                                    <img src="{{ asset('storage/' . $service->icon) }}" class="img-thumbnail"
                                        style="border-radius: 8px; width: 100px; height: 100px; object-fit: contain;">
                                    <input type="checkbox" name="remove_icon" value="1"
                                        class="d-none remove-icon-checkbox">
                                    <button type="button" class="btn btn-sm btn-danger delete-icon-btn" title="Remove"
                                        style="position: absolute; top: 5px; right: 5px; border-radius: 50%; width: 24px; height: 24px; padding: 0; line-height: 1; background-color: rgba(255, 0, 0, 0.8); border: none; color: white; font-weight: bold; transition: all 0.3s ease;">
                                        ×
                                    </button>
                                </div>
                            @endif
                            <div id="icon-dropzone-trigger"
                                class="image-box d-flex align-items-center justify-content-center"
                                style="width: 60px; height: 60px;align-self: center; border: 2px dashed #5d5d5d; border-radius: 8px; cursor: pointer; {{ isset($service) && $service->icon ? 'display: none;' : '' }}">
                                <i class="flaticon-upload" style="font-size: 28px;"></i>
                            </div>
                        </div>
                        <input type="file" name="icon" id="icon-input" class="d-none" accept="image/*">
                    </div>
                </div>
                <!-- Dark Icon Upload -->
                <div class="col-md-4">
                    <div class="form-group m-form__group">
                        <label class="form-label" for="dark_icon">Dark Icon</label>
                        <div class="d-flex flex-wrap gap-2 dark-icon-gallery" style="gap: 10px;">
                            @if (isset($service) && $service->dark_icon)
                                <div class="image-box position-relative" style="width: 90px;">
                                    <img src="{{ asset('storage/' . $service->dark_icon) }}" class="img-thumbnail"
                                        style="border-radius: 8px; width: 100px; height: 100px; object-fit: contain;">
                                    <input type="checkbox" name="remove_dark_icon" value="1"
                                        class="d-none remove-dark-icon-checkbox">
                                    <button type="button" class="btn btn-sm btn-danger delete-dark-icon-btn"
                                        title="Remove"
                                        style="position: absolute; top: 5px; right: 5px; border-radius: 50%; width: 24px; height: 24px; padding: 0; line-height: 1; background-color: rgba(255, 0, 0, 0.8); border: none; color: white; font-weight: bold; transition: all 0.3s ease;">
                                        ×
                                    </button>
                                </div>
                            @endif
                            <div id="dark-icon-dropzone-trigger"
                                class="image-box d-flex align-items-center justify-content-center"
                                style="width: 60px; height: 60px;  align-self: center; border: 2px dashed #5d5d5d; border-radius: 8px; cursor: pointer; {{ isset($service) && $service->dark_icon ? 'display: none;' : '' }}">
                                <i class="flaticon-upload" style="font-size: 28px;"></i>
                            </div>
                        </div>
                        <input type="file" name="dark_icon" id="dark-icon-input" class="d-none"
                            accept="image/*">
                    </div>
                </div>
                <!-- Image Upload -->
                <div class="col-md-4">
                    <div class="form-group m-form__group">
                        <label class="form-label" for="image">Image</label>
                        <div class="d-flex flex-wrap gap-2 image-gallery" style="gap: 10px;">
                            @if (isset($service) && $service->image)
                                <div class="image-box position-relative" style="width: 90px;">
                                    <img src="{{ asset('storage/' . $service->image) }}" class="img-thumbnail"
                                        style="border-radius: 8px; width: 100px; height: 100px; object-fit: contain;">
                                    <input type="checkbox" name="remove_image" value="1"
                                        class="d-none remove-image-checkbox">
                                    <button type="button" class="btn btn-sm btn-danger delete-image-btn"
                                        title="Remove"
                                        style="position: absolute; top: 5px; right: 5px; border-radius: 50%; width: 24px; height: 24px; padding: 0; line-height: 1; background-color: rgba(255, 0, 0, 0.8); border: none; color: white; font-weight: bold; transition: all 0.3s ease;">
                                        ×
                                    </button>
                                </div>
                            @endif
                            <div id="image-upload-trigger"
                                class="image-box d-flex align-items-center justify-content-center"
                                style="width: 60px; height: 60px;align-self: center; border: 2px dashed #5d5d5d;  align-self: center; border-radius: 8px; cursor: pointer; {{ isset($service) && $service->image ? 'display: none;' : '' }}">
                                <i class="flaticon-upload" style="font-size: 28px;"></i>
                            </div>
                        </div>
                        <input type="file" name="image" id="image-input" class="d-none" accept="image/*">
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="form-group m-form__group row"
                    style="display: flex; justify-content: end; padding-top: 15px;height">
                    <button type="submit" class="btn btn-brand">
                        @isset($service)
                            Update
                        @else
                            Create
                        @endisset
                    </button>
                    &nbsp;&nbsp;
                    <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Dropzone Scripts --}}
<script src="{{ asset('assets/vendors/base/vendors.bundle.js') }}"></script>
<script src="{{ asset('assets/demo/demo12/base/scripts.bundle.js') }}"></script>
<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function() {

        function toggleIconUploadBox(show) {
            if (show) {
                $('#icon-dropzone-trigger').show();
            } else {
                $('#icon-dropzone-trigger').hide();
            }
        }

        if ($('.icon-gallery .image-box').not('#icon-dropzone-trigger').length > 0) {
            toggleIconUploadBox(false);
        }
        $('#icon-dropzone-trigger').on('click', function() {
            $('#icon-input').click();
        });
        $('#icon-input').on('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Remove any existing icon preview
                    $('.icon-gallery .image-box').not('#icon-dropzone-trigger').remove();
                    // Add new preview
                    const preview = `<div class="image-box position-relative" style="width: 90px;">
                        <img src="${e.target.result}" class="img-thumbnail" style="border-radius: 8px; width: 100px; height: 100px; object-fit: contain;">
                        <button type="button" class="btn btn-sm btn-danger delete-icon-btn" title="Remove"
                            style="position: absolute; top: 5px; right: 5px; border-radius: 50%; width: 24px; height: 24px; padding: 0; line-height: 1; background-color: rgba(255, 0, 0, 0.8); border: none; color: white; font-weight: bold; transition: all 0.3s ease;">×</button>
                    </div>`;
                    $('#icon-dropzone-trigger').before(preview);
                    toggleIconUploadBox(false);
                };
                reader.readAsDataURL(file);
            }
        });
        $(document).on('click', '.delete-icon-btn', function() {
            // Remove preview and clear file input
            $(this).closest('.image-box').remove();
            $('#icon-input').val('');
            // If editing, check the remove_icon checkbox
            $('.remove-icon-checkbox').prop('checked', true);
            toggleIconUploadBox(true);
        });

        // Image upload logic (single image)
        function toggleImageUploadBox(show) {
            if (show) {
                $('#image-upload-trigger').show();
            } else {
                $('#image-upload-trigger').hide();
            }
        }
        if ($('.image-gallery .image-box').not('#image-upload-trigger').length > 0) {
            toggleImageUploadBox(false);
        }
        $('#image-upload-trigger').on('click', function() {
            $('#image-input').click();
        });
        $('#image-input').on('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Remove any existing image preview
                    $('.image-gallery .image-box').not('#image-upload-trigger').remove();
                    // Add new preview
                    const preview = `<div class="image-box position-relative" style="width: 90px;">
                        <img src="${e.target.result}" class="img-thumbnail" style="border-radius: 8px; width: 100px; height: 100px; object-fit: contain;">
                        <button type="button" class="btn btn-sm btn-danger delete-image-btn" title="Remove"
                            style="position: absolute; top: 5px; right: 5px; border-radius: 50%; width: 24px; height: 24px; padding: 0; line-height: 1; background-color: rgba(255, 0, 0, 0.8); border: none; color: white; font-weight: bold; transition: all 0.3s ease;">×</button>
                    </div>`;
                    $('#image-upload-trigger').before(preview);
                    toggleImageUploadBox(false);
                };
                reader.readAsDataURL(file);
            }
        });
        $(document).on('click', '.delete-image-btn', function() {
            // Remove preview and clear file input
            $(this).closest('.image-box').remove();
            $('#image-input').val('');
            // If editing, check the remove_image checkbox
            $('.remove-image-checkbox').prop('checked', true);
            toggleImageUploadBox(true);
        });

        // Dark Icon upload logic (single image)
        function toggleDarkIconUploadBox(show) {
            if (show) {
                $('#dark-icon-dropzone-trigger').show();
            } else {
                $('#dark-icon-dropzone-trigger').hide();
            }
        }
        if ($('.dark-icon-gallery .image-box').not('#dark-icon-dropzone-trigger').length > 0) {
            toggleDarkIconUploadBox(false);
        }
        $('#dark-icon-dropzone-trigger').on('click', function() {
            $('#dark-icon-input').click();
        });
        $('#dark-icon-input').on('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Remove any existing dark icon preview
                    $('.dark-icon-gallery .image-box').not('#dark-icon-dropzone-trigger').remove();
                    // Add new preview
                    const preview = `<div class="image-box position-relative" style="width: 90px;">
                        <img src="${e.target.result}" class="img-thumbnail" style="border-radius: 8px; width: 100px; height: 100px; object-fit: contain;">
                        <button type="button" class="btn btn-sm btn-danger delete-dark-icon-btn" title="Remove"
                            style="position: absolute; top: 5px; right: 5px; border-radius: 50%; width: 24px; height: 24px; padding: 0; line-height: 1; background-color: rgba(255, 0, 0, 0.8); border: none; color: white; font-weight: bold; transition: all 0.3s ease;">×</button>
                    </div>`;
                    $('#dark-icon-dropzone-trigger').before(preview);
                    toggleDarkIconUploadBox(false);
                };
                reader.readAsDataURL(file);
            }
        });
        $(document).on('click', '.delete-dark-icon-btn', function() {
            // Remove preview and clear file input
            $(this).closest('.image-box').remove();
            $('#dark-icon-input').val('');
            // If editing, check the remove_dark_icon checkbox
            $('.remove-dark-icon-checkbox').prop('checked', true);
            toggleDarkIconUploadBox(true);
        });
        // Add hover effect for delete buttons
        $(document).on('mouseenter', '.delete-btn', function() {
            $(this).css({
                'background-color': 'rgba(255, 0, 0, 1)',
                'transform': 'scale(1.1)'
            });
        }).on('mouseleave', '.delete-btn', function() {
            $(this).css({
                'background-color': 'rgba(255, 0, 0, 0.8)',
                'transform': 'scale(1)'
            });
        });
    });
</script>
