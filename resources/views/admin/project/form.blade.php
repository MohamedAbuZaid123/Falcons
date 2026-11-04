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
                    @isset($project)
                        <i class="flaticon-globe"></i>&nbsp; {{ $project->title }} Project
                    @else
                        <i class="flaticon-add-circular-button"></i>&nbsp; Create a Project
                    @endisset
                </h3>
            </div>
        </div>
    </div>
    <form method="POST" class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data"
        action="{{ isset($project) ? route('project.update', $project->id) : route('project.store') }}">
        @csrf
        @isset($project)
            @method('PUT')
        @endisset

        <div class="m-portlet__body">
            <div class="row">
                <!-- English Fields (Left Side) -->
                <div class="col-6">
                    <div class="form-group m-form__group">
                        <label class="form-label" for="title" style="font-size:15px;">Title </label>
                        <input type="text" name="title" id="title" maxlength="25"
                            class="form-control m-input @error('title', 'required') is-invalid @enderror"
                            value="{{ old('title', $project->title ?? '') }}" placeholder="Title">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group m-form__group">
                        <label class="form-label" for="description" style="font-size:15px;">Description </label>
                        <textarea name="description" id="description" style="height: 140px;" maxlength="600"
                            class="form-control m-input @error('description') is-invalid @enderror" placeholder="Write a Description"
                            style="height: 120px;" required>{{ old('description', $project->description ?? '') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!-- Arabic Fields (Right Side) -->
                <div class="col-6">
                    <div class="form-group m-form__group">
                        <label class="form-label" for="title_ar" dir="rtl" style="font-size:15px;">أسم
                            المشروع</label>
                        <input type="text" name="title_ar" id="title_ar" maxlength="25"
                            class="form-control m-input @error('title_ar') is-invalid @enderror"
                            value="{{ old('title_ar', $project->title_ar ?? '') }}" placeholder="العنوان"
                            dir="rtl">
                        @error('title_ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group m-form__group">
                        <label class="form-label" for="description_ar" dir="rtl" style="font-size:15px;">تفاصيل
                            المشروع</label>
                        <textarea name="description_ar" id="description_ar" dir="rtl" maxlength="600"
                            class="form-control m-input @error('description_ar') is-invalid @enderror" placeholder="اكتب الوصف"
                            style="height: 140px;" required>{{ old('description_ar', $project->description_ar ?? '') }}</textarea>
                        @error('description_ar')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Full Width Fields -->
            <div class="form-group m-form__group">
                <label class="form-label" for="services">Services</label>
                <select name="services[]" style="width: 100% !important" class="form-control m-select2" id="m_select2_3"
                    multiple="multiple" required>
                    <option value="" disabled>Select a Service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" @if (isset($project) && $project->services->contains($service->id)) selected @endif>
                            {{ $service->title }} - {{ $service->title_ar }}
                        </option>
                    @endforeach
                </select>
                <div id="services-error" class="invalid-feedback d-block" style="display:none;"></div>
                @error('services')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group m-form__group">
                <label class="form-label">Images</label>
                <div class="d-flex flex-wrap gap-2 image-gallery" style="gap: 10px;">
                    @if (isset($project) && is_array($project->images))
                        @foreach ($project->images as $image)
                            <div class="image-box position-relative" style="width: 120px;">
                                <img src="{{ asset('storage/' . $image) }}" class="img-thumbnail"
                                    style="border-radius: 8px;">
                                <input type="checkbox" name="remove_images[]" value="{{ $image }}"
                                    class="d-none remove-checkbox">
                                <button type="button" class="btn btn-sm btn-danger delete-btn" title="Remove"
                                    style="position: absolute; top: 5px; right: 5px; border-radius: 50%; width: 24px; height: 24px; padding: 0; line-height: 1; background-color: rgba(255, 0, 0, 0.8); border: none; color: white; font-weight: bold; transition: all 0.3s ease;">
                                    ×
                                </button>
                            </div>
                        @endforeach
                    @endif
                    <div id="dropzone-trigger" class="image-box d-flex align-items-center justify-content-center"
                        style="width: 90px; height: 90px; border: 2px dashed #ccc; border-radius: 8px; cursor: pointer;">
                        <i class="flaticon-upload" style="font-size: 28px;"></i>
                    </div>
                </div>
                <div class="dropzone d-none" id="m-dropzone-three"></div>
            </div>

            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="form-group m-form__group row"
                    style="display: flex; justify-content: end; padding-top: 15px;">
                    <button type="submit" class="btn btn-brand">
                        @isset($project)
                            Update
                        @else
                            Create
                        @endisset
                    </button>
                    &nbsp;&nbsp;
                    <a href="{{ route('project.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Dropzone Scripts --}}
<script src="{{ asset('assets/demo/demo12/custom/crud/forms/widgets/select2.js') }}"></script>
<script src="{{ asset('assets/vendors/base/vendors.bundle.js') }}"></script>
<script src="{{ asset('assets/demo/demo12/base/scripts.bundle.js') }}"></script>
<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function() {
        // Initialize Select2 with custom matcher to hide selected options from dropdown
        function customMatcher(params, data) {
            if ($(data.element).attr('data-select2-hidden') === 'true') {
                return null;
            }
            return data;
        }

        $('#m_select2_3').select2({
            placeholder: "Select a Service",
            width: 'resolve',
            matcher: customMatcher
        });

        // Before opening the dropdown, mark selected options as hidden
        $('#m_select2_3').on('select2:opening', function() {
            var selected = $(this).val() || [];
            $('#m_select2_3 option').each(function() {
                if (selected.includes($(this).val())) {
                    $(this).attr('data-select2-hidden', 'true');
                } else {
                    $(this).removeAttr('data-select2-hidden');
                }
            });
        });

        const dropzone = new Dropzone("#m-dropzone-three", {
            url: "{{ route('project.Image') }}",
            paramName: "file",
            // Large phone/camera photos are accepted, then scaled down in the browser to
            // at most 2560px on the long side (never enlarged), so they upload fast but stay sharp.
            maxFilesize: 25,
            acceptedFiles: "image/*",
            resizeWidth: 2560,
            resizeHeight: 2560,
            resizeMethod: 'contain',
            resizeQuality: 0.9,
            transformFile: function(file, done) {
                // Only resize normal photos; leave SVG and animated GIF untouched
                if (/^image\/(jpeg|png|webp)$/.test(file.type)) {
                    return this.resizeImage(file, this.options.resizeWidth, this.options.resizeHeight,
                        this.options.resizeMethod, done);
                }
                return done(file);
            },
            maxFiles: 20,
            addRemoveLinks: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, response) {
                const imageBox = $(`
                 <div class="image-box position-relative" style="width: 120px;">
                 <img src="{{ asset('storage') }}/${response.file_path}" class="img-thumbnail" style="border-radius: 8px;">
                    <button type="button" class="btn btn-sm btn-danger delete-btn" title="Remove"
                    style="position: absolute; top: 5px; right: 5px; border-radius: 50%; width: 24px; height: 24px; padding: 0; line-height: 1; background-color: rgba(255, 0, 0, 0.8); border: none; color: white; font-weight: bold; transition: all 0.3s ease;"> ×
                 </button>
                   </div>
            `);

                const hiddenInput = $('<input>').attr({
                    type: 'hidden',
                    name: 'uploaded_images[]',
                    value: response.file_path
                });
                imageBox.append(hiddenInput);

                $('#dropzone-trigger').before(imageBox);
            },
            error: function(file, response, xhr) {
                console.error('Upload failed:', response);
                let message = 'Upload failed for "' + file.name + '".';
                if (xhr && xhr.status === 413) {
                    message += ' The file is too large for the server.';
                } else if (response && response.errors && response.errors.file) {
                    message += ' ' + response.errors.file.join(' ');
                } else if (response && response.message) {
                    message += ' ' + response.message;
                } else if (typeof response === 'string' && response.length < 300) {
                    message += ' ' + response;
                }
                alert(message);
                this.removeFile(file);
            }
        });

        // Open Dropzone when clicking the tile
        $('#dropzone-trigger').on('click', function() {
            $('#m-dropzone-three').click();
        });

        // Handle image removal
        $(document).on('click', '.delete-btn', function() {
            const box = $(this).closest('.image-box');
            const checkbox = box.find('input[type="checkbox"]');

            // Add fade out animation
            box.fadeOut(300, function() {
                if (checkbox.length) {
                    checkbox.prop('checked', true);
                } else {
                    box.remove(); // for new uploads
                }
            });
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

        // Trigger once on load in case of pre-selected values
        $('#m_select2_3').trigger('select2:select');
    });
</script>
