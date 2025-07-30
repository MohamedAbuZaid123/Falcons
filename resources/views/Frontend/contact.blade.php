@extends('Frontend.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/contact.css') }}" />
@endpush

@section('title', 'Roaa - Contact us')

@section('heroTitle', $hero['title_en'] ?? 'Contact Us')

@section('heroDescription')
    @if (isset($hero['descriptions_en']))
        @foreach ($hero['descriptions_en'] as $line)
            <span>{{ $line }}</span><br />
        @endforeach
    @else
        <span>Let’s Build the Future Together.</span><br />
        <span>Roaa Development is by your side every step of the way.</span>
    @endif
@endsection



@section('content')
    <div class="ContactContainer">
        <div id="ContactContent" class="ContactContent">
            <!-- Contact Section One -->
            <section class="ContactS1">
                <div class="CoS1P1">
                    <div class="CoS1P1T1 AvenirH24px">Contact us</div>
                    <div class="CoS1P1T2 CairoLightH38px">Get in touch</div>
                    <div class="CoS1P1T3 AvenirH24px">We’d love to hear from you. Please fill out this form.</div>
                </div>
                <form class="CoS1P2">
                    <div class="FormCS1">
                        <div class="FormCS1P1 FormInputs">
                            <label class="FoTitle CairoVLightH24px">First Name</label>
                            <input type="text" placeholder="First Name" class="input" name="first_name" required
                                minlength="3" maxlength="15" />
                            <div class="error-msg"></div>
                        </div>
                        <div class="FormCS1P2 FormInputs">
                            <label class="FoTitle CairoVLightH24px">Last Name</label>
                            <input type="text" placeholder="Last Name" class="input" name="last_name" required
                                minlength="3" maxlength="15" />
                            <div class="error-msg"></div>
                        </div>
                    </div>
                    <div class="FormCS2 FormInputs">
                        <label class="FoTitle CairoVLightH24px">Email</label>
                        <input type="text" placeholder="You@Company.com" class="input" name="email" required />
                        <div class="error-msg"></div>
                    </div>
                    <div class="FormCS3 FormInputs">
                        <label class="FoTitle CairoVLightH24px">Phone Number</label>
                        <input type="text" placeholder="01124349475" class="input" name="phone" required
                            minlength="11" maxlength="20" />
                        <div class="error-msg"></div>
                    </div>
                    <div class="FormCS4 FormInputs">
                        <label class="FoTitle CairoVLightH24px">Message</label>
                        <textarea name="message" id="" placeholder="Your Message" class="input inputM" maxlength="1000" minlength="10"
                            required></textarea>
                        <div class="error-msg"></div>
                    </div>
                    <div class="FormCS5">
                        <input type="checkbox" required class="FoCheck" />
                        <label class="FormCS5T AvenirH24px">You agree to our friendly privacy
                            policy.</label>
                    </div>
                    <div class="FormCS6">
                        <button type="submit" class="FormBtnS AvenirH24px">
                            Send Message
                        </button>
                    </div>
                </form>
            </section>
            <!-- End Section One -->

            <!-- Contact Section Two -->
            <section class="ContactS2 AvenirH38px">
                <div class="ContactS2P1">Let's connect with us!</div>
                <div class="ContactS2P">
                    <img src="{{ asset('frontend/svg/Contact/Contact-Icon-Location.svg') }}" alt="" />
                    <span>
                        {{ $contactInfo->addresses[0] ?? '' }}<br />
                        @if (!empty($contactInfo->addresses[1]))
                            {{ $contactInfo->addresses[1] }}
                        @endif
                    </span>
                </div>
                <div class="ContactS2P">
                    <img src="{{ asset('frontend/svg/Contact/Contact-Icon-Phone.svg') }}" alt="" />
                    <div>
                        <span>{{ $contactInfo->mobiles[0] ?? '' }}</span>
                        @if (!empty($contactInfo->mobiles[1]))
                            -
                            <span>{{ $contactInfo->mobiles[1] }}</span>
                        @endif
                    </div>
                </div>
                <div class="ContactS2P ContactS2PLast">
                    <div class="ContactS2P4T">social media :</div>
                    <div class="ContactS2P4A">
                        <a href="{{ $contactInfo->social_links['facebook'] ?? '#' }}" target="_blank">
                            <img src="{{ asset('frontend/svg/Footer/FooterIconFB.svg') }}" alt="" />
                        </a>
                        <a href="{{ $contactInfo->social_links['linkedin'] ?? '#' }}" target="_blank">
                            <img src="{{ asset('frontend/svg/Footer/FooterIconLI.svg') }}" alt="" />
                        </a>
                        <a href="{{ $contactInfo->social_links['x'] ?? '#' }}" target="_blank">
                            <img src="{{ asset('frontend/svg/Footer/X.svg') }}" alt="" />
                        </a>
                        <a href="{{ $contactInfo->social_links['whatsapp'] ? 'https://wa.me/' . ltrim($contactInfo->social_links['whatsapp'], '+') : '#' }}"
                            target="_blank">
                            <img src="{{ asset('frontend/svg/Footer/Whatsapp.svg') }}" alt="" />
                        </a>
                    </div>
                </div>
            </section>

            <!-- End Section Two -->
        </div>
    </div>
@endsection

@push('scripts')
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush
