<link rel="stylesheet" href="{{ asset('frontend/css/header.css') }}?v={{ filemtime(public_path('frontend/css/header.css')) }}" />

<header class="HeaderC" dir="rtl">
    <a href="{{ route('Frontend.Ar.home') }}">
        <img src="{{ isset($hero['logo']) ? asset('storage/' . $hero['logo']) : asset('frontend/svg/Logo.svg') }}"
            alt="" class="HeadLogo" />
    </a>

    <!-- Navigation links -->
    <div class="MobileMenu" id="MobileMenu">
        <nav class="NavLinks" id="NavLinks">
            <a href="{{ route('Frontend.Ar.home') }}" class="HeadP2 ar">الرئيسية</a>
            <a href="{{ route('Frontend.Ar.about') }}" class="HeadP2 ar">عن الشركة</a>
            <a href="{{ route('Frontend.Ar.services') }}" class="HeadP2 ar">الخدمات</a>
            <a href="{{ route('Frontend.Ar.projects') }}" class="HeadP2 ar">المشاريع</a>
            <a href="{{ route('Frontend.Ar.contact') }}" class="HeadP2 ar">تواصل معنا</a>
        </nav>
    </div>

    <div class="MobileControls">
        <button class="MenuToggle" onclick="toggleMenu()">
            <img src="{{ asset('frontend/svg/Open.svg') }}" alt="Menu" id="MenuIcon" />
        </button>
        <a href="{{ route('Frontend.home') }}" class="LangIcon CairoLightH24px">En</a>
    </div>
</header>
