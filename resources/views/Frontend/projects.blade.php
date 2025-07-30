@extends('Frontend.layouts.app')

@section('title', 'Roaa - Projects')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/projects.css') }}" />
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
            <!-- Projects Section One -->
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

                    <div class="ProS1P3Title AvenirH24px">
                        Int-Ext residents
                    </div>
                    <div class="ProS1P3Icon">
                        <img src="{{ asset('frontend/svg/Projects/ProjectsS1Icon.svg') }}" alt="" />
                    </div>
                </div>
                <!-- projects -->
                <div class="ProS1P4 Projects">
                    <!-- project -->
                    @foreach ($projects as $project)
                        @if ($project->category == 'Interroir & Exterroir')
                            @php
                                $images = json_decode($project->images, true);
                            @endphp
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
            <!-- End Section One -->

            <!-- Projects Section Two -->
            <section class="ProjectsS1 Other" id="ProjectsCommercial">
                <!-- empty line -->
                <div class="ProS1P2 Other"></div>
                <!-- buttons -->
                <div class="ProS1P3 Other">
                    <div class="ProS1P3Btn AvenirH24px">
                        <div>commercial</div>
                    </div>
                    <div class="ProS1P3Icon">
                        <img src="{{ asset('frontend/svg/Projects/ProjectsS1Icon.svg') }}" alt="" />
                    </div>
                </div>
                <!-- projects -->
                <div class="ProS1P4 Other">
                    <!-- project -->
                    @foreach ($projects as $project)
                        @if ($project->category == 'Commercial')
                            @php
                                $images = json_decode($project->images, true);
                            @endphp
                            <div class="ProjectComponent Other">
                                <div class="ProComP1">
                                    <img src="{{ asset('storage/' . $images[0]) }}" alt="" />
                                </div>
                                <div class="ProComP2Other">
                                    <div class="ProComP2TOther AvenirH24px"> {{ $project->title }} </div>
                                    <a href="/projects/{{ $project->id }}" class="ProComP2AOther CairoVLightH24px">
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
            <!--  -->
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('frontend/js/Projects.js') }}"></script>
    <script src="{{ asset('frontend/js/scrollSmoothy.js') }}"></script>
@endpush
