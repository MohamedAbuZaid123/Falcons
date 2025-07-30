@extends('Frontend.layouts.app')

@section('title', 'Roaa - Home')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/Home.css') }}" />
@endpush

@section('heroTitle', $hero['title_en'] ?? 'ROAA')

@section('heroButtonText', $hero['button']['text_en'] ?? 'See Our Work')

@section('heroDescription')
    @if (isset($hero['descriptions_en']))
        @foreach ($hero['descriptions_en'] as $line)
            <span>{{ $line }}</span><br />
        @endforeach
    @else
        <span>We Design It.</span><br />
        <span>We Build It.</span><br />
        <span>You Love It.</span>
    @endif
@endsection

@section('heroButtonText', 'SEE OUR WORK')
@section('content')
    <div class="HomeContainer">
        <!-- Home Content -->
        <div id="HomeContent">
            <!-- Home Section 1 -->
            <section class="HomeS1">
                <img src="{{ asset('frontend/svg/Home/HomeS1L.svg') }}" alt="" class="HomeS1Limg" />
                <img src="{{ asset('frontend/svg/Home/HomeS1R.svg') }}" alt="" class="HomeS1Rimg" />
                <div class="HomeS1P1 CairoRegH38px">{{ $homeS1['title_en'] }}</div>
                <div class="HomeS1P2">
                    <!-- Box 1 -->
                    @for ($i = 0; $i < 4; $i++)
                        <div class="HomeS1P2B">
                            <img src=" {{ asset('storage/' . $homeS1['boxes'][$i]['icon']) }}" alt=""
                                class="HS1P2BI" />
                            <div class="HS1P2BT AvenirH24px">{{ $homeS1['boxes'][$i]['text_en'] }}</div>
                        </div>
                    @endfor
                </div>
            </section>
            <!-- End Section 1 -->

            <!-- Home Section 2 -->
            <section class="HomeS2">
                <!-- Left -->
                <div class="HomeS2P1">
                    <!-- First -->
                    <div class="HomeS2P1T">
                        <img src="{{ asset('frontend/svg/Hero/MiniLogo.svg') }}" alt="" class="HS2P1Img" />
                        <div class="HS2P1Text CairoLightH38px">
                            {{ $homeS2['title_en'] }}
                        </div>
                    </div>
                    <!-- Second -->
                    <ul class="HomeS2P1B">
                        @for ($i = 0; $i < count($homeS2['descriptions_en']); $i++)
                            <li class="HomeS2P1BText AvenirH38pxL">
                                {{ $homeS2['descriptions_en'][$i] }}
                            </li>
                            <br />
                        @endfor
                    </ul>
                </div>
                <!-- Right -->
                <div class="HomeS2P2">
                    <!-- First -->
                    <div class="HS2P2First">
                        <!-- Box 1 -->
                        <div class="HS2P2FirstB">
                            <img src="{{ asset('storage/' . $homeS2['icons'][0]['icon']) }}" alt=""
                                class="HS2P2FBI" />
                            <div class="HS2P2FBT CairoLightH38px">
                                {{ $homeS2['icons'][0]['label_en'] }}
                            </div>
                        </div>
                        <div class="HS2P2Mid CairoLightH38px">&</div>
                        <!-- Box 2 -->
                        <div class="HS2P2FirstB">
                            <img src="{{ asset('storage/' . $homeS2['icons'][1]['icon']) }}" alt=""
                                class="HS2P2FBI" />
                            <div class="HS2P2FBT CairoLightH38px">
                                {{ $homeS2['icons'][1]['label_en'] }}
                            </div>
                        </div>
                    </div>
                    <!-- end Boxes -->
                    <!-- Secon -->
                    <div class="HS2P2Second CairoLightH38px">
                        {{ $homeS2['quote_en'] }} </div>
                    <!-- Third -->
                    <div class="HS2P2Third">
                        <div class="HS2P2ThirdB">
                            <img src="{{ asset('storage/' . $homeS2['icons'][2]['icon']) }}" alt=""
                                class="HS2P2TBI" />
                            <div class="HS2P2TBT CairoLightH38px">
                                {{ $homeS2['icons'][2]['label_en'] }}
                            </div>
                        </div>
                        <div class="HS2P2MidS CairoLightH38px">+</div>
                        <div class="HS2P2ThirdB">
                            <img src="{{ asset('storage/' . $homeS2['icons'][3]['icon']) }}" alt=""
                                class="HS2P2TBI" />
                            <div class="HS2P2TBT CairoLightH38px">
                                {{ $homeS2['icons'][3]['label_en'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- End Section 2 -->

            <!-- Home Section 3 -->

            <section class="HomeS3">
                <!--  -->
                <div class="HomeS3P1">
                    <img src="{{ asset('frontend/svg/Home/HomeS3P1.svg') }}" alt="" class="HS3P1Img" />
                    <div class="HS2P1Text CairoLightH38px">
                        our services
                    </div>
                </div>
                <!--  -->
                <div class="HomeS3P2">
                    @foreach ($services as $service)
                        <a href="{{ route('Frontend.services') }}" class="HS3P2Box">
                            <!-- For img src the orignal Svg , data-hover is the svg when we hover -->
                            <img src="{{ asset('storage/' . $service->dark_icon) }}"
                                data-hover="{{ asset('storage/' . $service->icon) }}" alt=""class="HS3P2BoxImg" />
                            <div class="HS3P2BoxTitle CairoLightH24px">
                                {{ $service->title }}
                            </div>
                            <div class="HS3P2BoxText CairoLightH24px">
                                ---------------
                            </div>
                            <div class="HS3P2BoxText CairoLightH24px">
                                View More
                            </div>
                        </a>
                    @endforeach
                </div>
                <!--  -->
                <a href="{{ route('Frontend.services') }}" class="HomeS3P3">
                    <div class="HS3P3T CairoLightH24px">
                        See All Our services
                    </div>
                    <img src="{{ asset('frontend/svg/Home/HomeS3P3.svg') }}" alt="" />
                </a>
                <!--  -->
            </section>

            <!-- End Section 3 -->

            <!-- Home Section 4 -->

            <section class="HomeS4">
                <!-- Home Section 4 P1 -->
                <div class="HomeS3P1">
                    <img src="{{ asset('frontend/svg/Home/HomeS2P2Icon2.svg') }}" alt="" class="HS3P1Img" />
                    <div class="HS2P1Text CairoLightH38px">
                        our projects
                    </div>
                </div>
                <!-- Home Section 4 P2 -->
                <div class="HomeS4P2">
                    <!-- Left Box -->
                    <div class="HS4P2B">
                        <img class="HS4BackgroundImage" src="{{ asset('storage/' . $homeS3['boxes'][0]['image']) }}"
                            alt="background" />
                        {{-- <img src="{{ asset('storage/' . $homeS3['boxes'][0]['image']) }}" alt=""> --}}
                        <div class="HS4Overlay"></div>
                        <div class="HS4P2Content">
                            <div class="HS4P2BP1 CairoLightH38px">
                                {{ $homeS3['boxes'][0]['title_en'] }}
                            </div>
                            <div class="HS4P2Text AvenirH24pxL">
                                {{ $homeS3['boxes'][0]['desc_en'] }}
                            </div>

                            <a
                                href="{{ route('Frontend.projects', ['scrollTo' => 'ProjectsInt']) }}"class="HS4P2Button CairoLightH24px">
                                VIEW MORE
                                <img src="{{ asset('frontend/svg/Arrow-Go-Out.svg') }}" alt="" />
                            </a>
                        </div>
                    </div>
                    <!-- Right Box -->
                    <div class="HS4P2BR">
                        <img class="HS4BackgroundImage" src="{{ asset('storage/' . $homeS3['boxes'][1]['image']) }}"
                            alt="background" />
                        <div class="HS4Overlay"></div>
                        <div class="HS4P2Content">
                            <div class="HS4P2BP1 CairoLightH38px">
                                {{ $homeS3['boxes'][1]['title_en'] }}

                            </div>
                            <div class="HS4P2Text AvenirH24pxL">
                                {{ $homeS3['boxes'][1]['desc_en'] }}
                            </div>
                            <a
                                href="{{ route('Frontend.projects', ['scrollTo' => 'ProjectsCommercial']) }}"class="HS4P2Button CairoLightH24px">
                                VIEW MORE
                                <img src="{{ asset('frontend/svg/Arrow-Go-Out.svg') }}" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
                <!--  -->
            </section>

            <!-- End Section 4 -->

            <!-- Home Section 5 -->

            <section class="HomeS5">
                <!--  -->
                <div class="HomeS3P1">
                    <img src="{{ asset('frontend/svg/Home/HomeS5About.svg') }}" alt="" class="HS3P1Img" />
                    <div class="HS2P1Text CairoLightH38px">about us</div>
                </div>

                <!--  -->
                <div class="HomeS5P2">
                    <!-- Box Left -->
                    <div class="HS5P2BL HS5P2B">
                        <div class="HS5P2BGL">
                            <img src="{{ asset('storage/' . $aboutS2['boxes'][0]['image']) }}" alt="">
                        </div>
                        <div class="HS5P2Content">
                            <div class="HS5P2BLP1">
                                <div class="HS5P2BLP1L CairoLightH38px">
                                    {{ $aboutS2['boxes'][0]['title_en'] }}
                                </div>
                                <div class="HS5P2BLP1R">
                                    <img src="{{ asset('frontend/svg/Home/Vision.svg') }}" alt=""
                                        data-hover="{{ asset('frontend/svg/Home/VisionHover.svg') }}"
                                        class="HS5P2BImg" />
                                </div>
                            </div>
                            <div class="HS5P2BLP2 CairoLightH38px"> {{ $aboutS2['boxes'][0]['descriptions_en'] }}
                            </div>
                        </div>
                    </div>
                    <!-- Box Right -->
                    <div class="HS5P2BR HS5P2B">
                        <div class="HS5P2BGR">
                            <img src="{{ asset('storage/' . $aboutS2['boxes'][1]['image']) }}" alt="">
                        </div>
                        <div class="HS5P2Content">
                            <div class="HS5P2BLP1">
                                <div class="HS5P2BLP1L CairoLightH38px">
                                    {{ $aboutS2['boxes'][1]['title_en'] }}
                                </div>
                                <div class="HS5P2BLP1R">
                                    <img src="{{ asset('frontend/svg/Home/Mision.svg') }}" alt=""
                                        data-hover="{{ asset('frontend/svg/Home/MisionHover.svg') }}"
                                        class="HS5P2BImg" />
                                </div>
                            </div>
                            <div class="HS5P2BLP2 CairoLightH38px">{{ $aboutS2['boxes'][1]['descriptions_en'] }}
                            </div>
                        </div>
                    </div>
                    <!-- Check About us Btn -->
                    <a href="{{ route('Frontend.about') }}" class="HomeS5P3">
                        <div class="HS5P3T AvenirH24px">check about us</div>
                        <img src="{{ asset('frontend/svg/Home/HomeS3P3.svg') }}" alt="" class="HS5P3Img" />
                    </a>
                </div>
            </section>

            <!-- End Section 5 -->

            <!-- Home Section 6 -->

            <section class="HomeS6">
                <div class="HomeS6P1">
                    <div class="HS6P1Icon">
                        <img src="{{ asset('frontend/svg/Home/HomeS6P1Icon.svg') }}" alt="" />
                    </div>
                    <div class="HS6P1Text CairoLightH24px">
                        <div class="HS6P1T1">
                            Frequently asked questions
                        </div>
                        <div class="HS6P1T2">
                            Everything you need to know about RoAA
                        </div>
                    </div>
                </div>
                <!-- Faq Question -->
                <script>
                    window.faqs = @json($faqs);
                </script>
                <div class="HomeS6P2" id="faq-container"></div>
                <!--  -->
            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('frontend/js/Home.js') }}"></script>
@endpush
