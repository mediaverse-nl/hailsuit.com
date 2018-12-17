<footer class="footer-distributed">

    <div class="footer-left">

        <h3><img src="/img/assets/hailsuit-logo.png" alt="" class="img-responsive  pull-left" style="height: 50px; "></h3>

        <br>
        <br>
        <br>

        <p class="footer-links">
            <a href="{{route('page.terms')}}">
                {!! Translator('footer_terms', 'text', false, 'terms') !!}
            </a> -
            <a href="{{route('page.privacy')}}">
                {!! Translator('footer_privacy', 'text', false, 'privacy') !!}
            </a>  -
            <a href="{{route('page.cookie')}}">
                {!! Translator('footer_cookie', 'text', false, 'cookie') !!}
            </a>  -
            <a href="{{route('page.warranty')}}">
                {!! Translator('footer_warranty', 'text', false, 'warranty') !!}
            </a> -
            <a href="{{route('page.returns')}}">
                {!! Translator('footer_returns', 'text', false, 'returns') !!}
            </a> ·
            <a href="{{route('page.delivery')}}">
                {!! Translator('footer_delivery', 'text', false, 'delivery') !!}
            </a> -
            <a href="{{route('contact.index')}}">
                {!! Translator('footer_contact', 'text', false, 'contact') !!}
            </a> -
            <a href="{{route('page.faq')}}">
                {!! Translator('footer_faq', 'text', false, 'F.A.Q.') !!}
            </a>
        </p>

        <p class="footer-company-name">Hailsuit.com &copy; 2019 - 2020</p>
    </div>

    <div class="footer-center">

        <div style="padding: 0px 15px 15px 15px;" class="">
            <i class="fa fa-map-marker" style="margin: 0px 5px; font-size: 20px;"></i>
            <p><span>Weegschaalstraat 3, 5632 CW, </span>Eindhoven Netherlands</p>
        </div>

        <div style="padding: 15px;">
            <i class="fa fa-phone" style="margin: 0px 5px; font-size: 20px;"></i>
            <p>{!! Translator('compony_phone_number', 'text', false, '+31 (0)40 4000400') !!}</p>
        </div>

        <div style="padding: 15px;">
            <i class="fa fa-envelope" style="margin: 0px 5px; font-size: 20px;"></i>
            <p><a href="mailto:info@hailsuit.com">info@hailsuit.com</a></p>
        </div>

    </div>

    <div class="footer-right">

        <p class="footer-company-about">
            <span>{!! Translator('footer_about_the_company_title', 'text', false, 'About the company') !!}</span>
            {!! Translator('footer_about_the_company_small_text', 'textarea', false, 'Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.') !!}
        </p>

        <div class="footer-icons">

            <a href="#"><i class="fab fa-twitter" style="color: #1C9CEA;"></i></a>
            <a href="#"><i class="fab fa-instagram" style="color: #fff;"></i></a>
            <a href="#"><i class="fab fa-google-plus" style="color: #D74C34;"></i></a>
            {{--<a href="#"><i class="fab fa-pinterest" style="color: #C51F26;"></i></a>--}}
            <a href="#"><i class="fab fa-linkedin" style="color: #0270AD;"></i></a>
            {{--<a href="#"><i class="fab fa-dribbble" style="color: #E34A85;"></i></a>--}}
            {{--<a href="#"><i class="fa fa-facebook"></i></a>--}}
            {{--<a href="#"><i class="fa fa-twitter"></i></a>--}}
            {{--<a href="#"><i class="fa fa-linkedin"></i></a>--}}
            {{--<a href="#"><i class="fa fa-github"></i></a>--}}

        </div>
    </div>

    <div class="row" style="padding: 7px;">
        <ul class="list-unstyled list-inline">
            <li>
                <i class="pw pw-ideal"></i>
            </li>
            <li>
                <i class="pw pw-paypal-new"></i>
            </li>
            <li>
                <i class="pw pw-maestro"></i>
            </li>
            <li>
                <i class="pw pw-mastercard"></i>
            </li>
            <li>
                <i class="pw pw-visa"></i>
            </li>
            <li>
                <i class="pw pw-discover"></i>
            </li>
        </ul>
    </div>

</footer>
