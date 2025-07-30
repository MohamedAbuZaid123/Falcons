<link rel="stylesheet" href="{{ asset('frontend/css/footer.css') }}" />
<footer class="FooterC">
    <!-- Footer P1 -->
    <div class="FooterP1">
        <!-- Footer P1S1 -->
        <div class="FOP1S1">
            <div class="FOP1S1P1">
                <img src="{{ asset('frontend/svg/Logo.svg') }}" alt="" />
            </div>
            <div class="FOP1S1P2 AvenirH24pxL">Design amazing digital experiences that create more happy in the world.
            </div>
        </div>
        <!-- Footer P1S2 -->
        <div class="FOP1S">
            <div class="FOPSP1 CairoLightH24px">company</div>
            <a href="{{ route('Frontend.home') }}" class="FOPSP1L CairoLightH20px">Home</a>
            <a href="{{ route('Frontend.about') }}" class="FOPSP1L CairoLightH20px">About us</a>
            <a href="{{ route('Frontend.contact') }}" class="FOPSP1L CairoLightH20px">Contact us</a>
        </div>
        <!-- Footer P1S3 -->
        <div class="FOP1S">
            <div class="FOPSP1 CairoLightH24px">Projects</div>
            <a href="{{ route('Frontend.projects') }}" class="FOPSP1L CairoLightH20px">our projects</a>
            <a href="{{ route('Frontend.services') }}" class="FOPSP1L CairoLightH20px">services</a>
        </div>
        <!-- Footer P1S4 -->
        <div class="FOP1S">
            <div class="FOPSP1 CairoLightH24px">Headquarters</div>
            <div class="FOPSP1L FOAdd CairoLightH20px">
                Address :
                {{ $contactInfo->addresses[0] ?? '' }}
                @if (!empty($contactInfo->addresses[1]))
                    <br>{{ $contactInfo->addresses[1] }}
                @endif
            </div>
            <div class="FOPSP1L FOAdd CairoLightH20px">
                Mobile :
                {{ $contactInfo->mobiles[0] ?? '' }}
                @if (!empty($contactInfo->mobiles[1]))
                    - {{ $contactInfo->mobiles[1] }}
                @endif
            </div>
        </div>
    </div>
    <!-- Footer P2 -->
</footer>
<!--  -->
<footer class="FooterC2">
    <div class="FooC2S">
        <div class="FooC2SP1 CairoLightH24px">© 2025 Roaa. All rights reserved.</div>
        <div class="FooC2SP2">
            <a href="{{ $contactInfo->social_links['facebook'] ?? '#' }}" target="_blank" class="FooC2SP2A">
                <img src="{{ asset('frontend/svg/Footer/FooterIconFB.svg') }}" alt="" />
            </a>
            <a href="{{ $contactInfo->social_links['linkedin'] ?? '#' }}" class="FooC2SP2A" target="_blank">
                <img src="{{ asset('frontend/svg/Footer/FooterIconLI.svg') }}" alt="" />
            </a>
            <a href="{{ $contactInfo->social_links['x'] ?? '#' }}" class="FooC2SP2A" target="_blank">
                <img src="{{ asset('frontend/svg/Footer/X.svg') }}" alt="" />
            </a>
            <a href="{{ $contactInfo->social_links['whatsapp'] ? 'https://wa.me/' . ltrim($contactInfo->social_links['whatsapp'], '+') : '#' }}"
                class="FooC2SP2A" target="_blank">
                <img src="{{ asset('frontend/svg/Footer/Whatsapp.svg') }}" alt="" />
            </a>
        </div>
    </div>
</footer>
