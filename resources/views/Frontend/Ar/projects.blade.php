@extends('Frontend.Ar.layouts.app')

@section('title', 'Roaa - Projects')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/projects.css') }}" />
@endpush

@section('heroTitle', $hero['title_ar'] ?? 'مشاريعنا')

@section('heroDescription')
    @if (isset($hero['descriptions_ar']))
        @foreach ($hero['descriptions_ar'] as $line)
            <span>{{ $line }}</span><br />
        @endforeach
    @else
        <span>حيث تتحول التصميمات الرائعة إلى أسس متينة</span>
    @endif
@endsection

@section('content')
    <div class="ProjectsContainer" dir="rtl">
        <div id="ProjectsContent" class="ProjectsContent">
            <!-- Projects Section One -->
            <section class="ProjectsS1" id="ProjectsInt">
                <!-- title -->
                <div class="ProS1P1 ChangaHNpxM">مشاريعنا</div>
                <!-- empty line -->
                <div class="ProS1P2"></div>
                <!-- buttons -->
                <div class="ProS1P3">
                    <a href="{{ route('Frontend.Ar.home') }}" class="ProS1P3Btn ar ChangaHNpxM">
                        <img src="{{ asset('frontend/svg/Projects/ProjectsBackIcon.svg') }}" alt="" />
                        <div>عودة</div>
                    </a>
                    <div class="ProS1P3Title ChangaHNpxM">وحدة سكنية خارجية وداخلية</div>
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
                                    <div class="ProComP2T ChangaHNpxM">
                                        {{ $project->title_ar }}
                                    </div>
                                    <a href="/ar/projects/{{ $project->id }}" class="ProComP2A CairoVLightH24px"
                                        dir="ltr">
                                        <div>عرض المزيد</div>
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
                    <div class="ProS1P3Btn ChangaHNpxM">
                        <div>تجاري</div>
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
                                    <div class="ProComP2TOther ChangaHNpxM"> {{ $project->title_ar }} </div>
                                    <a href="/projects/{{ $project->id }}" class="ProComP2AOther CairoVLightH24px"
                                        dir="ltr">
                                        <div>عرض المزيد</div>
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
