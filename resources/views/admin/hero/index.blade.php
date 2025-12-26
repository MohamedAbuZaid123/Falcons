@extends('admin.layouts.app')
@section('title', 'Hero ')
@section('page-title', 'Edit Heros')
@section('content')
    <div class="container py-4">
        <form action="{{ route('hero.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @foreach (['home', 'about', 'services', 'projects', 'contact'] as $page)
                <div class="card mb-5">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">{{ ucfirst($page) }} Page Hero</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Title (English)</label>
                                <input type="text" name="{{ $page }}[title_en]" class="form-control"
                                    value="{{ old("$page.title_en", $heroContents[$page]['title_en'] ?? '') }}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Title (Arabic)</label>
                                <input type="text" name="{{ $page }}[title_ar]" class="form-control text-end"
                                    value="{{ old("$page.title_ar", $heroContents[$page]['title_ar'] ?? '') }}"
                                    dir="rtl">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Description (English) - One per line</label>
                                <textarea name="{{ $page }}[descriptions_en]" rows="3" class="form-control">{{ old("$page.descriptions_en", isset($heroContents[$page]['descriptions_en']) ? implode("\n", $heroContents[$page]['descriptions_en']) : '') }}</textarea>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Description (Arabic) - سطر واحد لكل وصف</label>
                                <textarea name="{{ $page }}[descriptions_ar]" rows="3" class="form-control text-end" dir="rtl">{{ old("$page.descriptions_ar", isset($heroContents[$page]['descriptions_ar']) ? implode("\n", $heroContents[$page]['descriptions_ar']) : '') }}</textarea>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg px-3">
                    <i class="fas fa-save me-2"></i> Save All Hero Sections
                </button>
            </div>
        </form>
    </div>
@endsection
