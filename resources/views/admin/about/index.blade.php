@extends('admin.layouts.app')
@section('title', 'About Page')
@section('page-title', 'Edit About Page Sections')
@section('content')
    <div class="container py-4">
        <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
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
                            <label class="form-label">Question (English)</label>
                            <input type="text" name="aboutS1[question_en]" class="form-control"
                                value="{{ old('aboutS1.question_en', $aboutS1['question_en'] ?? '') }}"
                                placeholder="Enter English title">
                            @error('aboutS1.question_en')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Question (Arabic)</label>
                            <input type="text" name="aboutS1[question_ar]" class="form-control text-end"
                                value="{{ old('aboutS1.question_ar', $aboutS1['question_ar'] ?? '') }}"
                                placeholder="أدخل العنوان بالعربية" dir="rtl">
                            @error('aboutS1.question_ar')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Title (English)</label>
                            <input type="text" name="aboutS1[title_en]" class="form-control"
                                value="{{ old('aboutS1.title_en', $aboutS1['title_en'] ?? '') }}"
                                placeholder="Enter English title">
                            @error('aboutS1.title_en')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Title (Arabic)</label>
                            <input type="text" name="aboutS1[title_ar]" class="form-control text-end"
                                value="{{ old('aboutS1.title_ar', $aboutS1['title_ar'] ?? '') }}"
                                placeholder="أدخل العنوان بالعربية" dir="rtl">
                            @error('aboutS1.title_ar')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Description List (English)</label>
                            <textarea name="aboutS1[descriptions_en]" rows="10" class="form-control"
                                placeholder="Enter one description per line">{{ old('aboutS1.descriptions_en', implode("\n", $aboutS1['descriptions_en'] ?? [])) }}</textarea>

                            @error('aboutS1.descriptions_en')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Description List (Arabic)</label>
                            <textarea name="aboutS1[descriptions_ar]" rows="10" class="form-control text-end"
                                placeholder="أدخل وصفًا واحدًا في كل سطر" dir="rtl">{{ old('aboutS1.descriptions_ar', implode("\n", $aboutS1['descriptions_ar'] ?? [])) }}</textarea>
                            @error('aboutS1.descriptions_ar')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Upload Image </label>
                            <input type="file" name="aboutS1[image_file]" class="form-control" accept="image/*">
                            <input type="hidden" name="aboutS1[image]" value="{{ $aboutS1['image'] ?? '' }}">

                            <div class="current-icon-path small text-muted">
                                Current: {{ $aboutS1['image'] ?? 'No image uploaded yet' }} </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2 -->
            <div class="card mb-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Section 2 </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Header (English)</label>
                            <input type="text" name="aboutS2[header_en]" class="form-control"
                                value="{{ old('aboutS2.header_en', $aboutS2['header_en'] ?? '') }}"
                                placeholder="Enter English Header">
                            @error('aboutS2.header_en')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Header (Arabic)</label>
                            <input type="text" name="aboutS2[header_ar]" class="form-control text-end"
                                value="{{ old('aboutS2.header_ar', $aboutS2['header_ar'] ?? '') }}"
                                placeholder="أدخل العنوان بالعربية" dir="rtl">
                            @error('aboutS2.header_ar')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="{{ $i == 2 ? 'col-md-12 mb-4' : 'col-md-6 mb-4' }}">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5 class="mb-0">Box {{ $i + 1 }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <label class="form-label">Title (English)</label>
                                                <input type="text"
                                                    name="aboutS2[boxes][{{ $i }}][title_en]"
                                                    class="form-control"
                                                    value="{{ old('aboutS2.boxes.' . $i . '.title_en', $aboutS2['boxes'][$i]['title_en'] ?? '') }}"
                                                    placeholder="Enter English title" maxlength="20">
                                                @error('aboutS2.boxes.' . $i . '.title_en')
                                                    <div class="text-danger small">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label class="form-label">Title (Arabic)</label>
                                                <input type="text"
                                                    name="aboutS2[boxes][{{ $i }}][title_ar]"
                                                    class="form-control text-end"
                                                    value="{{ old('aboutS2.boxes.' . $i . '.title_ar', $aboutS2['boxes'][$i]['title_ar'] ?? '') }}"
                                                    placeholder="أدخل العنوان بالعربية" dir="rtl" maxlength="20">
                                                @error('aboutS2.boxes.' . $i . '.title_ar')
                                                    <div class="text-danger small">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        @php
                                            $isList = $i == 2;

                                            $descEn = $aboutS2['boxes'][$i]['descriptions_en'] ?? '';
                                            $descEn = is_array($descEn) ? implode("\n", $descEn) : $descEn;

                                            $descAr = $aboutS2['boxes'][$i]['descriptions_ar'] ?? '';
                                            $descAr = is_array($descAr) ? implode("\n", $descAr) : $descAr;

                                            $enPlaceholder = $isList
                                                ? 'Enter one description per line'
                                                : 'Enter description';
                                            $arPlaceholder = $isList ? 'اكتب كل سطر في سطر منفصل' : 'أدخل الوصف';
                                        @endphp
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <label class="form-label">Description{{ $isList ? ' List' : '' }}
                                                    (English)</label>
                                                <textarea name="aboutS2[boxes][{{ $i }}][descriptions_en]" rows="10" class="form-control"
                                                    maxlength="{{ $isList ? 460 : 200 }}" placeholder="{{ $enPlaceholder }}">{{ old('aboutS2.boxes.' . $i . '.descriptions_en', $descEn) }}</textarea>
                                                @error('aboutS2.boxes.' . $i . '.descriptions_en')
                                                    <div class="text-danger small">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label class="form-label">Description{{ $isList ? ' List' : '' }}
                                                    (Arabic)</label>
                                                <textarea name="aboutS2[boxes][{{ $i }}][descriptions_ar]" rows="10" class="form-control text-end"
                                                    maxlength="{{ $isList ? 460 : 200 }}" placeholder="{{ $arPlaceholder }}" dir="rtl">{{ old('aboutS2.boxes.' . $i . '.descriptions_ar', $descAr) }}</textarea>
                                                @error('aboutS2.boxes.' . $i . '.descriptions_ar')
                                                    <div class="text-danger small">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Image</label>
                                            @if (!empty($aboutS2['boxes'][$i]['image']))
                                                <div class="mb-2">
                                                    <div class="current-icon-path small text-muted">
                                                        Current: {{ $aboutS2['boxes'][$i]['image'] }}
                                                    </div>
                                                </div>
                                            @endif
                                            <input type="file" name="aboutS2[boxes][{{ $i }}][image_file]"
                                                class="form-control" accept="image/*">
                                            <input type="hidden" name="aboutS2[boxes][{{ $i }}][image]"
                                                value="{{ $aboutS2['boxes'][$i]['image'] ?? '' }}">
                                            @error('aboutS2.boxes.' . $i . '.image')
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
                    <i class="fas fa-save me-2"></i> Save About Page
                </button>
            </div>
        </form>
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
