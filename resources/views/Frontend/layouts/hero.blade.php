<link rel="stylesheet" href="{{ asset('frontend/css/Hero.css') }}" />

<section class="HeroSlider" id="HeroSliderContainer">
    <!-- Navbar Toggle -->
    <div class="HeroNav">
        <div class="HeroNavIcon" id="HeroNavToggle">
            <img src="{{ asset('frontend/svg/Hero/Lines.svg') }}" alt="Menu" id="HeroNavIconImg" />
        </div>

        <!-- Overlay -->
        <div class="HeroNavOverlay" id="HeroNavOverlay">
            <div class="HeroNavOverlayContent">
                <!-- Logo -->
                <div class="HeroNavLogo">
                    <img src="{{ isset($hero['logo']) ? asset('storage/' . $hero['logo']) : asset('frontend/svg/Hero/MiniLogo.svg') }}"
                        alt="Logo" class="HeroMiniLogo" />
                </div>

                <!-- Social Links -->
                <div class="HeroNavSocials">
                    <a href="{{ $contactInfo->social_links['facebook'] ?? 'https://www.facebook.com/Advancd.visions' }}"
                        target="_blank">
                        <img src="{{ asset('frontend/svg/Hero/Facebook.svg') }}" alt="Facebook" />
                    </a>
                    <a href="{{ $contactInfo->social_links['linkedin'] ?? '#' }}" target="_blank">
                        <img src="{{ asset('frontend/svg/Hero/LinkedIn.svg') }}" alt="LinkedIn" />
                    </a>
                    <a href="{{ $contactInfo->social_links['x'] ?? '#' }}" target="_blank">
                        <img src="{{ asset('frontend/svg/Hero/X.svg') }}" alt="X" />
                    </a>
                    <a href="{{ $contactInfo->social_links['whatsapp'] ? 'https://wa.me/' . ltrim($contactInfo->social_links['whatsapp'], '+') : '#' }}"
                        target="_blank">
                        <img src="{{ asset('frontend/svg/Hero/Whatsapp.svg') }}" alt="WhatsApp" />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Background Images -->
    <div class="HeroImageWrapper">
        <img class="HeroImage current" src="{{ asset('frontend/images/Hero/HeroImg1.jpg') }}" alt="Hero Image" />
        <img class="HeroImage next" src="" alt="" />
    </div>

    <!-- Navigation Dots -->
    <div class="HeroDots"></div>

    <!-- Hero Content -->
    <div class="HeroContent" id="HeroContent">
        <img src="{{ asset('frontend/svg/Hero/HeroCTop.svg') }}" alt="Top Decoration" class="HeroConImgT" />

        <div class="HeroTitle CairoRegH150">
            @yield('heroTitle', 'Three Falcons')
        </div>

        <div class="HeroDesc CairoLightH38px">
            @yield('heroDescription')
        </div>

        @if (Route::currentRouteNamed('Frontend.home'))
            <a href="{{ route('Frontend.projects') }}" class="HeroA">
                <button class="HeroBtn AvenirH24px">
                    @yield('heroButtonText', 'SEE OUR WORK')
                </button>
            </a>
        @endif

        <img src="{{ asset('frontend/svg/Hero/HeroCBottom.svg') }}" alt="Bottom Decoration" class="HeroConImgB" />
    </div>
</section>

@push('scripts')
    <script src="{{ asset('frontend/js/Hero.js') }}"></script>
@endpush
