@extends('Frontend.Ar.layouts.app')

@section('title', 'Three Falcnos - Services')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/services.css') }}" />
@endpush

@section('heroTitle', $hero['title_ar'] ?? 'الخدمات')

@section('heroDescription')
    @if (isset($hero['descriptions_ar']))
        @foreach ($hero['descriptions_ar'] as $line)
            <span>{{ $line }}</span><br />
        @endforeach
    @else
        <span> تقديم خدمات عالية الجودة مصممة خصيصًا لتلبية احتياجاتك</span>
    @endif
@endsection


@section('content')
    <div class="ServicesContainer" dir="rtl">
        <div id="ServicesContent" class="ServicesContent">
            <!-- Services Section One -->
            <section class="ServicesS1">
                <!--  -->
                <div class="ServicesS1P1">
                    <div class="SES1P1Text ChangaH38pxB">الخدمات</div>
                </div>
                <!--  -->
                <!--  -->
            </section>
            @foreach ($services as $service)
                @if ($loop->odd)
                    <section class="ServicesD1" id="{{ Str::slug($service->title_ar) }}">
                        <div class="SD1Img">
                            <img src="{{ asset('storage/' . $service->image) }}" alt="" />
                        </div>
                        <div class="SD1RC">
                            <img src="{{ asset('storage/' . $service->dark_icon) }}" alt="" class="SD1RCP1" />
                            <div class="SD1RCP2 ar ChangaH38pxB">
                                {{ $service->title_ar }}
                            </div>
                            <div class="SD1RCP3 ar CairoLightH24px">
                                {{ $service->description_ar }}
                            </div>
                        </div>
                    </section>
                @else
                    <section class="ServicesD2" id="{{ Str::slug($service->title_ar) }}">
                        <div class="SD2BG">
                            <img src="{{ asset('frontend/svg/Services/ServicesBGIcon.svg') }}" alt="" />
                        </div>
                        <div class="SD2LC">
                            <img src="{{ asset('storage/' . $service->icon) }}" alt="" class="SD2LCP1" />
                            <div class="SD1RCP2 ar ChangaH38pxB">
                                {{ $service->title_ar }}
                            </div>
                            <div class="SD2LCP3 ar CairoLightH24px">
                                {{ $service->description_ar }}
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
