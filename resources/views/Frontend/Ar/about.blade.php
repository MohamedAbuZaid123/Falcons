@extends('Frontend.Ar.layouts.app')

@section('title', 'Roaa - Home')

@section('heroTitle', $hero['title_ar'] ?? 'عن رؤى')

@section('heroDescription')
    @if (isset($hero['descriptions_ar']))
        @foreach ($hero['descriptions_ar'] as $line)
            <span>{{ $line }}</span><br />
        @endforeach
    @else
        <span> في شركة رؤى للتطوير، نحول الرؤى إلى مساحات ذات معنى </span><br />
        <span> فهي تستحق المعنى والراحة والمستقبل.</span>
    @endif
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/about.css') }}" />
@endpush

@section('content')
    <div class="AboutContainer" dir="rtl">
        <div id="AboutContent">
            <!-- About Section One -->
            <section class="AboutS1">
                <div class="AboutS1P1C ChangaH38pxB">{{ $aboutS1['question_ar'] }}</div>
                <div class="AboutS1P2C">
                    <div class="AboutS1P1">
                        <div class="AboutS1P1T">
                            <div class="AS1P1Text ChangaH38pxB">{{ $aboutS1['title_ar'] }}</div>
                        </div>
                        <ul class="AboutS1P1B">
                            @for ($i = 0; $i < count($aboutS1['descriptions_ar']); $i++)
                                <li class="AboutS1P1BText CairoLightH38px">
                                    {{ $aboutS1['descriptions_ar'][$i] }}
                                </li>
                                <br />
                            @endfor
                        </ul>
                    </div>
                    <div class="AboutS1P2">
                        <img src="{{ asset('storage/' . $aboutS1['image']) }}" alt="" />
                    </div>
                </div>
            </section>
            <!-- End Section one -->

            <!-- About Section Two -->
            <section class="AboutS2">
                <div class="AboutS2P1">
                    <img src="{{ asset('frontend/svg/Home/HomeS3P1.svg') }}" alt="" class="ABS2P1Img" />
                    <div class="ABS2P1Text ChangaHNpxM">خدماتنا</div>
                </div>
                <div class="AboutS2P2">
                    <!-- Service Box -->
                    @foreach ($services as $service)
                        <a href="{{ route('Frontend.Ar.services') }}" class="ABS2P2Box">
                            <!-- For img src the orignal Svg , data-hover is the svg when we hover -->
                            <img src="{{ asset('storage/' . $service->dark_icon) }}"
                                data-hover="{{ asset('storage/' . $service->icon) }}" alt=""
                                class="ABS2P2BoxImg ar" />
                            <div class="ABS2P2BoxTitle CairoLightH24px">
                                {{ $service->title_ar }}
                            </div>
                            <div class="ABS2P2BoxText lineAb CairoLightH24px">---------------</div>
                            <div class="ABS2P2BoxText CairoLightH24px">عرض المزيد</div>
                        </a>
                    @endforeach
                </div>
            </section>
            <!-- End Section Two -->

            <!-- About Section Three -->
            <section class="AboutS3 ChangaHNpxM">{{ $aboutS2['header_ar'] }}</section>

            <!-- End Section Three -->

            <!-- About Section Four -->
            <section class="AboutS4">
                <div class="AboutS4P1">
                    <!-- Box Left -->
                    <div class="AbS4P1BL ABS4P1B">
                        <div class="AbS4P1BGL"> <img src="{{ asset('storage/' . $aboutS2['boxes'][0]['image']) }}"
                                alt="">
                        </div>
                        <div class="ABS4P1Content">
                            <div class="ABS4P1BLP1">
                                <div class="ABS4P1BLP1L CairoLightH38px">{{ $aboutS2['boxes'][0]['title_ar'] }}</div>
                                <div class="ABS4P1BLP1R">
                                    <img src="{{ asset('frontend/svg/Home/Vision.svg') }}" alt=""
                                        data-hover="{{ asset('frontend/svg/Home/VisionHover.svg') }}" class="ABS4P1BImg" />
                                </div>
                            </div>
                            <div class="ABS4P1BLP2 CairoLightH38px">
                                {{ $aboutS2['boxes'][0]['descriptions_ar'] }}
                            </div>
                        </div>
                    </div>
                    <!-- Box Right -->
                    <div class="AbS4P1BR ABS4P1B">
                        <div class="AbS4P1BGR">{{ asset('storage/' . $aboutS2['boxes'][1]['image']) }}</div>
                        <div class="ABS4P1Content">
                            <div class="ABS4P1BLP1">
                                <div class="ABS4P1BLP1L CairoLightH38px">{{ $aboutS2['boxes'][1]['title_ar'] }}</div>
                                <div class="ABS4P1BLP1R">
                                    <img src="{{ asset('frontend/svg/Home/Mision.svg') }}" alt=""
                                        data-hover="{{ asset('frontend/svg/Home/MisionHover.svg') }}" class="ABS4P1BImg" />
                                </div>
                            </div>
                            <div class="ABS4P1BLP2 CairoLightH38px">
                                {{ $aboutS2['boxes'][1]['descriptions_ar'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Section Four -->

            <!-- About Section Five -->
            <section class="AboutS5">
                <!--  -->
                <div class="AboutS5P1">
                    <div class="ABS5P1T ChangaHNpxM"> {{ $aboutS2['boxes'][2]['title_ar'] }}</div>
                    <ul class="ABS5P1B ChangaHNpxM">
                        @for ($i = 0; $i < count($aboutS2['boxes'][2]['descriptions_ar']); $i++)
                            <li>
                                {{ $aboutS2['boxes'][2]['descriptions_ar'][$i] }}
                            </li>
                            <br />
                        @endfor
                    </ul>
                </div>
                <!--  -->
                <div class="AboutS5P2">
                    <img src="{{ asset('storage/' . $aboutS2['boxes'][2]['image']) }}" alt="" />
                </div>
                <!--  -->
            </section>
            <!-- End Section Five -->
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('frontend/js/about.js') }}"></script>
@endpush
