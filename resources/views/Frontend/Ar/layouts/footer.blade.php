<link rel="stylesheet" href="{{ asset('frontend/css/footer.css') }}" />
<footer class="FooterC" dir="rtl">
    <!-- Footer P1 -->
    <div class="FooterP1">
        <!-- Footer P1S1 -->
        <div class="FOP1S1 ar">
            <div class="FOP1S1P1">
                <img src="{{ asset('frontend/svg/Logo.svg') }}" alt="" />
            </div>
            <div class="FOP1S1P2 ar CairoLightH24px">صمم تجارب رقمية مذهلة تعمل على خلق المزيد من السعادة في العالم.
            </div>
        </div>
        <!-- Footer P1S2 -->
        <div class="FOP1S">
            <div class="FOPSP1 CairoLightH24px">الشركة</div>
            <a href="{{ route('Frontend.Ar.home') }}" class="FOPSP1L CairoLightH20px">الرئيسية</a>
            <a href="{{ route('Frontend.Ar.about') }}" class="FOPSP1L CairoLightH20px">عن الشركة</a>
            <a href="{{ route('Frontend.contact') }}" class="FOPSP1L CairoLightH20px">تواصل معنا</a>
        </div>
        <!-- Footer P1S3 -->
        <div class="FOP1S">
            <div class="FOPSP1 CairoLightH24px">الروابط الفرعية</div>
            <a href="{{ route('Frontend.Ar.projects') }}" class="FOPSP1L CairoLightH20px">المشاريع</a>
            <a href="{{ route('Frontend.Ar.services') }}" class="FOPSP1L CairoLightH20px">الخدمات</a>
        </div>
        <!-- Footer P1S4 -->
        <div class="FOP1S">
            <div class="FOPSP1 CairoLightH24px">الإدارة</div>
            <div class="FOPSP1L FOAdd CairoLightH20px">
                العنوان : {{ $contactInfo->addresses_ar[0] ?? '' }}
                @if (!empty($contactInfo->addresses_ar[1]))
                    <br>{{ $contactInfo->addresses_ar[1] }}
                @endif
            </div>
            <div class="FOPSP1L FOAdd CairoLightH20px">الموبايل : {{ $contactInfo->mobiles[0] ?? '' }}
                @if (!empty($contactInfo->mobiles[1]))
                    - {{ $contactInfo->mobiles[1] }}
                @endif
            </div>
        </div>
    </div>

    <!-- Footer P2 -->
</footer>
<!--  -->
<footer class="FooterC2" dir="rtl">
    <div class="FooC2S">
        <div class="FooC2SP1 CairoLightH24px">© 2025 رؤى . جميع الحقوق محفوظة.</div>
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
