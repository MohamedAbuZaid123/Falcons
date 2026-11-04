@extends('Frontend.layouts.app')

@section('title', 'Three Falcons - Projects')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/projects.css') }}?v={{ filemtime(public_path('frontend/css/projects.css')) }}" />
@endpush

@section('heroTitle', $hero['title_en'] ?? 'Our Projects')

@section('heroDescription')
    @if (isset($hero['descriptions_en']))
        @foreach ($hero['descriptions_en'] as $line)
            <span>{{ $line }}</span><br />
        @endforeach
    @else
        <span>Where Great Designs Become Solid Foundations</span>
    @endif
@endsection

@section('content')
    <div class="ProjectsContainer">
        <div id="ProjectsContent" class="ProjectsContent">
            <!-- Projects Section -->
            <section class="ProjectsS1" id="ProjectsInt">
                <!-- title -->
                <div class="ProS1P1 CairoLightH38px">our projects</div>
                <!-- empty line -->
                <div class="ProS1P2"></div>
                <!-- buttons -->
                <div class="ProS1P3">
                    <a href="/" class="ProS1P3Btn AvenirH24px">
                        <img src="{{ asset('frontend/svg/Projects/ProjectsBackIcon.svg') }}" alt="" />
                        <div>back</div>
                    </a>
                    <div class="ProS1P3Icon">
                        <img src="{{ asset('frontend/svg/Projects/ProjectsS1Icon.svg') }}" alt="" />
                    </div>
                </div>
                <!-- projects -->
                <div class="ProS1P4 Projects">
                    <!-- project -->
                    @foreach ($projects as $project)
                        @php
                            $images = $project->images ?? [];
                            if (is_string($images)) {
                                $images = json_decode($images, true) ?? [];
                            }
                            if (!is_array($images)) {
                                $images = [];
                            }
                        @endphp
                        @if (!empty($images) && isset($images[0]))
                            <div class="ProjectComponent">
                                <div class="ProComP1">
                                    <img src="{{ asset('storage/' . $images[0]) }}" alt="" />
                                </div>
                                <div class="ProComP2">
                                    <div class="ProComP2T AvenirH24px">
                                        {{ $project->title }}
                                    </div>
                                    <a href="/projects/{{ $project->id }}" class="ProComP2A CairoVLightH24px">
                                        <div>View Project</div>
                                        <img src="{{ asset('frontend/svg/Projects/ProjectArrowGoOut.svg') }}"
                                            alt="" />
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <!--  -->
                </div>
            </section>
            <!-- End Section -->
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('frontend/js/Projects.js') }}?v={{ filemtime(public_path('frontend/js/Projects.js')) }}"></script>
    <script src="{{ asset('frontend/js/scrollSmoothy.js') }}?v={{ filemtime(public_path('frontend/js/scrollSmoothy.js')) }}"></script>
@endpush
