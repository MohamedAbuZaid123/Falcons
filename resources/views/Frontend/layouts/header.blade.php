<link rel="stylesheet" href="{{ asset('frontend/css/header.css') }}" />

<header class="HeaderC">
    <a href="{{ route('Frontend.home') }}">
        <img src="{{ asset('frontend/svg/Logo.svg') }}" alt="" class="HeadLogo" />
    </a>

    <!-- Navigation links -->
    <div class="MobileMenu" id="MobileMenu">
        <nav class="NavLinks" id="NavLinks">
            <a href="{{ route('Frontend.home') }}" class="HeadP2">Home</a>
            <a href="{{ route('Frontend.about') }}" class="HeadP2">About Roaa</a>
            <a href="{{ route('Frontend.services') }}" class="HeadP2">Our services</a>
            <a href="{{ route('Frontend.projects') }}" class="HeadP2">Our projects</a>
            <a href="{{ route('Frontend.contact') }}" class="HeadP2">Contact us</a>
        </nav>
    </div>

    <div class="MobileControls">
        <button class="MenuToggle" onclick="toggleMenu()">
            <img src="{{ asset('frontend/svg/Open.svg') }}" alt="Menu" id="MenuIcon" />
        </button>
        <a href="{{ route('Frontend.Ar.home') }}" class="LangIcon CairoLightH24px">Ar</a>
    </div>
</header>
