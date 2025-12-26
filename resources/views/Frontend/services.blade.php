@extends('Frontend.layouts.app')

@section('title', 'Three Falcnos - Services')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/services.css') }}" />
@endpush

@section('heroTitle', $hero['title_en'] ?? 'Our Services')

@section('heroDescription')
    @if (isset($hero['descriptions_en']))
        @foreach ($hero['descriptions_en'] as $line)
            <span>{{ $line }}</span><br />
        @endforeach
    @else
        <span>Offering premium </span><br />
        <span> quality services tailored to your needs</span>
    @endif
@endsection

@section('content')
    <div class="ServicesContainer">
        <div id="ServicesContent" class="ServicesContent">
            <!-- Services Section One -->
            <section class="ServicesS1">
                <!--  -->
                <div class="ServicesS1P1">
                    <div class="SES1P1Text CairoLightH38px">
                        our services
                    </div>
                </div>
                <!--  -->
                <!--  -->
            </section>
            @foreach ($services as $service)
                @if ($loop->odd)
                    <section class="ServicesD1" id="{{ Str::slug($service->title) }}">
                        <div class="SD1Img">
                            <img src="{{ asset('storage/' . $service->image) }}" alt="" />
                        </div>
                        <div class="SD1RC">
                            <img src="{{ asset('storage/' . $service->dark_icon) }}" alt="" class="SD1RCP1" />
                            <div class="SD1RCP2 AvenirH38pxB">
                                {{ $service->title }}
                            </div>
                            <div class="SD1RCP3 AvenirH38pxL">
                                {{ $service->description }}
                            </div>
                        </div>
                    </section>
                @else
                    <section class="ServicesD2" id="{{ $service->title }}">
                        <div class="SD2BG">
                            <img src="{{ asset('frontend/svg/Services/ServicesBGIcon.svg') }}" alt="" />
                        </div>
                        <div class="SD2LC">
                            <img src="{{ asset('storage/' . $service->icon) }}" alt="" class="SD2LCP1" />
                            <div class="SD2LCP2 AvenirH38pxB">
                                {{ $service->title }}
                            </div>
                            <div class="SD2LCP3 AvenirH38pxL">
                                {{ $service->description }}
                            </div>
                        </div>
                        <div class="SD2Img">
                            <img src="{{ asset('storage/' . $service->image) }}" alt="" />

                        </div>
                    </section>
                @endif
            @endforeach
        </div>
    </div>
@endsection
