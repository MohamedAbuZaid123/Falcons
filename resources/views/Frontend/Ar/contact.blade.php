@extends('Frontend.Ar.layouts.app')
@section('title', 'Three Falcons - Contact us')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/contact.css') }}?v={{ filemtime(public_path('frontend/css/contact.css')) }}" />
@endpush


@section('heroTitle', $hero['title_ar'] ?? 'اتصل بنا')

@section('heroDescription')
    @if (isset($hero['descriptions_ar']))
        @foreach ($hero['descriptions_ar'] as $line)
            <span>{{ $line }}</span><br />
        @endforeach
    @else
        <span>لنبنِ المستقبل معًا. </span><br />
        <span>شركة Three Falcons للتطوير بجانبكم في كل خطوة.</span>
    @endif
@endsection

@section('content')
    <div class="ContactContainer" dir="rtl">
        <div id="ContactContent" class="ContactContent">
            <!-- Contact Section One -->
            <section class="ContactS1">
                <div class="CoS1P1">
                    <div class="CoS1P1T1 ChangaHNpxM">اتصل بنا</div>
                    <div class="CoS1P1T2 CairoLightH38px">تواصل معنا</div>
                    <div class="CoS1P1T3 ChangaHNpxM">يسعدنا التواصل معك. يُرجى تعبئة هذا النموذج.</div>
                </div>
                <form class="CoS1P2">
                    <div class="FormCS1">
                        <div class="FormCS1P1 FormInputs">
                            <label class="FoTitle ChangaHNpxM">الاسم الأول</label>
                            <input type="text" placeholder="الاسم الأول" class="input" name="first_name" required
                                minlength="3" maxlength="15" />
                            <div class="error-msg"></div>
                        </div>
                        <div class="FormCS1P2 FormInputs">
                            <label class="FoTitle ChangaHNpxM">اسم العائلة</label>
                            <input type="text" placeholder="اسم العائلة" class="input" name="last_name" required
                                minlength="3" maxlength="15" />
                            <div class="error-msg"></div>
                        </div>
                    </div>
                    <div class="FormCS2 FormInputs">
                        <label class="FoTitle ChangaHNpxM">البريد إلكتروني</label>
                        <input type="text" placeholder="You@Company.com" class="input" name="email" required />
                        <div class="error-msg"></div>
                    </div>
                    <div class="FormCS3 FormInputs">
                        <label class="FoTitle ChangaHNpxM">رقم التليفون</label>
                        <input type="text" placeholder="01124349475" class="input" name="phone" required
                            minlength="11" maxlength="20" />
                        <div class="error-msg"></div>
                    </div>
                    <div class="FormCS4 FormInputs">
                        <label class="FoTitle ChangaHNpxM">الرسالة</label>
                        <textarea name="message" id="" placeholder="رسالتك" class="input inputM" maxlength="1000" minlength="10"
                            required></textarea>
                        <div class="error-msg"></div>
                    </div>
                    <div class="FormCS5">
                        <input type="checkbox" required class="FoCheck" />
                        <label class="FormCS5T ChangaHNpxM">أنت توافق على سياسة الخصوصية الخاصة بنا.</label>
                    </div>
                    <div class="FormCS6">
                        <button type="submit" class="FormBtnS ChangaHNpxM">أرسل رسالة</button>
                    </div>
                </form>
            </section>
            <!-- End Section One -->

            <!-- Contact Section Two -->
            <section class="ContactS2 ChangaHNpxM">
                <div class="ContactS2P1">دعونا نتواصل معنا!</div>
                <div class="ContactS2P">
                    <img src="{{ asset('frontend/svg/Contact/Contact-Icon-Location.svg') }}" alt="" />
                    <span>
                        {{ $contactInfo->addresses_ar[0] ?? '' }}<br />
                        @if (!empty($contactInfo->addresses_ar[1]))
                            {{ $contactInfo->addresses_ar[1] }}
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
                    <div class="ContactS2P4T">وسائل التواصل الاجتماعي :</div>
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
    <script src="{{ asset('frontend/js/contact.js') }}?v={{ filemtime(public_path('frontend/js/contact.js')) }}"></script>
@endpush
