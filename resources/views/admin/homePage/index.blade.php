@extends('admin.layouts.app')

@section('title', 'Home Page')
@section('page-title', 'Edit Home Page Sections')

@section('content')
    <div class="container py-4">
        <form action="{{ route('home.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Section 1 -->
            <div class="card mb-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Section 1 </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Title (English)</label>
                            <input type="text" name="homeS1[title_en]" class="form-control"
                                value="{{ old('homeS1.title_en', $homeS1['title_en'] ?? '') }}"
                                placeholder="Enter English title">
                            @error('homeS1.title_en')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Title (Arabic)</label>
                            <input type="text" name="homeS1[title_ar]" class="form-control text-end"
                                value="{{ old('homeS1.title_ar', $homeS1['title_ar'] ?? '') }}"
                                placeholder="أدخل العنوان بالعربية" dir="rtl">
                            @error('homeS1.title_ar')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        @for ($i = 0; $i < 4; $i++)
                            <div class="col-md-3 mb-4">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5 class="mb-0">Feature Box {{ $i + 1 }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Icon</label>
                                            @if (!empty($homeS1['boxes'][$i]['icon']))
                                                <div class="mb-2">
                                                    <div class="current-icon-path small text-muted">
                                                        Current: {{ $homeS1['boxes'][$i]['icon'] }}
                                                    </div>
                                                </div>
                                            @endif
                                            <input type="file" name="homeS1[boxes][{{ $i }}][icon_file]"
                                                class="form-control" accept="image/*">
                                            <input type="hidden" name="homeS1[boxes][{{ $i }}][icon]"
                                                value="{{ $homeS1['boxes'][$i]['icon'] ?? '' }}">
                                            @error('homeS1.boxes.' . $i . '.icon_file')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Text (English)</label>
                                            <input type="text" name="homeS1[boxes][{{ $i }}][text_en]"
                                                class="form-control"
                                                value="{{ old('homeS1.boxes.' . $i . '.text_en', $homeS1['boxes'][$i]['text_en'] ?? '') }}"
                                                placeholder="Enter English text">
                                            @error('homeS1.boxes.' . $i . '.text_en')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Text (Arabic)</label>
                                            <input type="text" name="homeS1[boxes][{{ $i }}][text_ar]"
                                                class="form-control text-end"
                                                value="{{ old('homeS1.boxes.' . $i . '.text_ar', $homeS1['boxes'][$i]['text_ar'] ?? '') }}"
                                                placeholder="أدخل النص بالعربية" dir="rtl">
                                            @error('homeS1.boxes.' . $i . '.text_ar')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Section 2 -->
            <div class="card mb-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Section 2</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Title (English)</label>
                            <input type="text" name="homeS2[title_en]" class="form-control"
                                value="{{ old('homeS2.title_en', $homeS2['title_en'] ?? '') }}"
                                placeholder="Enter welcome text in English">
                            @error('homeS2.title_en')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Title (Arabic)</label>
                            <input type="text" name="homeS2[title_ar]" class="form-control text-end"
                                value="{{ old('homeS2.title_ar', $homeS2['title_ar'] ?? '') }}"
                                placeholder="أدخل نص الترحيب بالعربية" dir="rtl">
                            @error('homeS2.title_ar')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Description List (English)</label>
                            <textarea name="homeS2[descriptions_en]" rows="10" class="form-control"
                                placeholder="Enter one description per line">{{ old('homeS2.descriptions_en', implode("\n", $homeS2['descriptions_en'] ?? [])) }}</textarea>

                            @error('homeS2.descriptions_en')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Description List (Arabic)</label>
                            <textarea name="homeS2[descriptions_ar]" rows="10" class="form-control text-end"
                                placeholder="أدخل وصفًا واحدًا في كل سطر" dir="rtl">{{ old('homeS2.descriptions_ar', implode("\n", $homeS2['descriptions_ar'] ?? [])) }}</textarea>
                            @error('homeS2.descriptions_ar')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Middle Quote (English)</label>
                            <input type="text" name="homeS2[quote_en]" class="form-control"
                                value="{{ old('homeS2.title_en', $homeS2['quote_en'] ?? '') }}"
                                placeholder="Enter English Quote">
                            @error('homeS2.quote_en')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Middle Quote (Arabic)</label>
                            <input type="text" name="homeS2[quote_ar]" class="form-control text-end"
                                value="{{ old('homeS2.quote_ar', $homeS2['quote_ar'] ?? '') }}"
                                placeholder="أدخل العنوان بالعربية" dir="rtl">
                            @error('homeS2.quote_ar')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        @foreach (['Design', 'Build', 'Interior', 'Exterior'] as $index => $label)
                            <div class="col-md-3 mb-4">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5 class="mb-0">{{ $label }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Icon</label>
                                            @if (!empty($homeS2['icons'][$index]['icon']))
                                                <div class="mb-2">
                                                    <div class="current-icon-path small text-muted">
                                                        Current: {{ $homeS2['icons'][$index]['icon'] }}
                                                    </div>
                                                </div>
                                            @endif
                                            <input type="file" name="homeS2[icons][{{ $index }}][icon_file]"
                                                class="form-control" accept="image/*">
                                            <input type="hidden" name="homeS2[icons][{{ $index }}][icon]"
                                                value="{{ $homeS2['icons'][$index]['icon'] ?? '' }}">
                                            @error('homeS2.icons.' . $index . '.icon_file')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Label (English)</label>
                                            <input type="text" name="homeS2[icons][{{ $index }}][label_en]"
                                                class="form-control"
                                                value="{{ old('homeS2.icons.' . $index . '.label_en', $homeS2['icons'][$index]['label_en'] ?? '') }}"
                                                placeholder="Enter English label">
                                            @error('homeS2.icons.' . $index . '.label_en')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Label (Arabic)</label>
                                            <input type="text" name="homeS2[icons][{{ $index }}][label_ar]"
                                                class="form-control text-end"
                                                value="{{ old('homeS2.icons.' . $index . '.label_ar', $homeS2['icons'][$index]['label_ar'] ?? '') }}"
                                                placeholder="أدخل التسمية بالعربية" dir="rtl">
                                            @error('homeS2.icons.' . $index . '.label_ar')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Section 3 -->
            <div class="card mb-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Section 3 - Our Projects</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @for ($i = 0; $i < 2; $i++)
                            <div class="col-md-6 mb-4">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5 class="mb-0">Category {{ $i + 1 }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Title (English)</label>
                                            <input type="text" name="homeS3[boxes][{{ $i }}][title_en]"
                                                class="form-control"
                                                value="{{ old('homeS3.boxes.' . $i . '.title_en', $homeS3['boxes'][$i]['title_en'] ?? '') }}"
                                                placeholder="Enter English title">
                                            @error("homeS3.boxes.$i.title_en")
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Title (Arabic)</label>
                                            <input type="text" name="homeS3[boxes][{{ $i }}][title_ar]"
                                                class="form-control text-end" dir="rtl"
                                                value="{{ old('homeS3.boxes.' . $i . '.title_ar', $homeS3['boxes'][$i]['title_ar'] ?? '') }}"
                                                placeholder="أدخل العنوان بالعربية">
                                            @error("homeS3.boxes.$i.title_ar")
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Description (English)</label>
                                            <textarea name="homeS3[boxes][{{ $i }}][desc_en]" class="form-control" rows="3"
                                                placeholder="Enter English description">{{ old('homeS3.boxes.' . $i . '.desc_en', $homeS3['boxes'][$i]['desc_en'] ?? '') }}</textarea>
                                            @error("homeS3.boxes.$i.desc_en")
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Description (Arabic)</label>
                                            <textarea name="homeS3[boxes][{{ $i }}][desc_ar]" class="form-control text-end" rows="3"
                                                dir="rtl" placeholder="أدخل الوصف بالعربية">{{ old('homeS3.boxes.' . $i . '.desc_ar', $homeS3['boxes'][$i]['desc_ar'] ?? '') }}</textarea>
                                            @error("homeS3.boxes.$i.desc_ar")
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Image</label>
                                            @if (!empty($homeS3['boxes'][$i]['image']))
                                                <div class="mb-2">
                                                    <div class="current-icon-path small text-muted">
                                                        Current: {{ $homeS3['boxes'][$i]['image'] }}
                                                    </div>
                                                </div>
                                            @endif
                                            <input type="file" name="homeS3[boxes][{{ $i }}][image_file]"
                                                class="form-control" accept="image/*">
                                            <input type="hidden" name="homeS3[boxes][{{ $i }}][image]"
                                                value="{{ $homeS3['boxes'][$i]['image'] ?? '' }}">
                                            @error('homeS3.boxes.' . $i . '.image')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg px-3">
                    <i class="fas fa-save me-2"></i> Save Homepage
                </button>
            </div>
        </form>
    </div>
    <div class="row-xl-4">
        <div class="m-portlet m-portlet--mobile">

        </div>
    </div>
@endsection

@push('styles')
    <style>
        .card-header {
            font-weight: 600;
        }

        .form-label {
            font-weight: 500;
        }

        .current-icon-path {
            background-color: #f8f9fa;
            padding: 5px;
            border-radius: 4px;
            word-break: break-all;
        }

        .form-control {
            margin-top: 5px;
        }
    </style>
@endpush
