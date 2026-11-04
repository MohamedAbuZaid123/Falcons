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
        <div id="ProjectsDisContent" class="ProjectsDisContent">
            <!-- Projects Section One -->
            <section class="ProjectsS1">
                <!-- title -->
                <div class="ProS1P1 CairoLightH38px">our projects</div>
                <!-- empty line -->
                <div class="ProS1P2"></div>
                <!-- buttons -->
                <div class="ProS1P3">
                    <a href="{{ route('Frontend.projects') }}" class="ProS1P3Btn AvenirH24px">
                        <img src="{{ asset('frontend/svg/Projects/ProjectsBackIcon.svg') }}" alt="" />
                        <div>back</div>
                    </a>
                    <div class="ProS1P3Title AvenirH24px">
                        {{ $project->title }}
                    </div>
                    <div class="ProS1P3Icon">
                        <img src="{{ asset('frontend/svg/Projects/ProjectsS1Icon.svg') }}" alt="" />
                    </div>
                </div>
                <!-- projects -->
                <div class="ProS1P4 Projects">
                    <!-- project -->
                    <section class="ProjectDisplay">
                        <div class="ProDisP1">
                            <div class="placeholder-text AvenirH24px">
                                Select image to view
                            </div>
                            <img src="{{ asset('frontend/svg/Projects/ProDisGoDown.svg') }}"alt="" class="ProDisP1Icon" />
                        </div>
                        <div class="ProDisP2Wrapper">
                            <button class="prev-btn">
                                <img src="{{ asset('frontend/svg/Projects/GoLeft.svg') }}"alt="" />
                            </button>
                            <div class="ProDisP2" id="imageContainer">
                                @php
                                    $images = $project->images ?? [];
                                    if (is_string($images)) {
                                        $images = json_decode($images, true) ?? [];
                                    }
                                    if (!is_array($images)) {
                                        $images = [];
                                    }
                                @endphp
                                @foreach ($images as $image)
                                    <img src="{{ asset('storage/' . $image) }}" alt="" />
                                @endforeach
                            </div>
                            <button class="next-btn">
                                <img src="{{ asset('frontend/svg/Projects/GoRight.svg') }}" alt="" />
                            </button>
                        </div>

                        <div class="ProDisP3">
                            <div class="ProDisP3Title CairoLightH38px">
                                {{ $project->title }}
                            </div>
                            <div class="ProDisP3Desc AvenirH38pxL">
                                {{ $project->description }}

                            </div>
                        </div>

                        <div class="ProDisP4">
                            <!-- Title -->
                            <div class="ProDisP4Title CairoLightH38px">
                                SERVICE USED
                            </div>
                            <!-- Services Icon Container -->
                            <div class="ProDisP4Serv">
                                <!-- Services Icon Box -->
                                @foreach ($services as $service)
                                    <div class="ProDisP4SC">
                                        <img src="{{ asset('storage/' . $service->dark_icon) }}"alt=""
                                            class="PDisP4SCImg" />
                                        <div class="PDisP4SCText CairoLightH38px">
                                            {{ $service->title }}
                                        </div>
                                        <!-- End -->
                                    </div>
                                @endforeach
                            </div>
                    </section>

                    <!-- Modal -->
                    <div class="modal" id="imageModal">
                        <span class="close-modal" id="closeModal">&times;</span>
                        <img class="modal-content zoomable" id="modalImage" />
                        <button class="modal-prev">
                            <img src="{{ asset('frontend/svg/Projects/ModalGoLeft.svg') }}" alt="" />
                        </button>
                        <button class="modal-next">
                            <img src="{{ asset('frontend/svg/Projects/ModalGoRight.svg') }}" alt="" />
                        </button>
                    </div>

                    <!--  -->
                </div>
            </section>
            <!-- End Section One -->
            <!--  -->
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('frontend/js/Projects.js') }}?v={{ filemtime(public_path('frontend/js/Projects.js')) }}"></script>
@endpush
