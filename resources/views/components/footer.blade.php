<!-- Break Footer -->
<div class="row" style="margin: 0px !important;"></div>
<!--Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4">

    <!-- Footer Links -->
    <div class="container text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-4 text-center mx-auto">

                <!-- Content -->
{{--                <h4 class="font-weight-bold text-uppercase mt-3 mb-4">{!! Translator('footer_small_') !!}</h4>--}}
                <p>{!! Translator('footer_small_text', 'richtext', false, 'terms and conditions') !!}</p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 mx-auto">

                <!-- Links -->
                <h4 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h4>

                <ul class="list-unstyled">
                    <li>
                        <a href="{{route('page.terms')}}">
                            {!! Translator('footer_terms', 'text', false, 'terms and conditions') !!}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('page.privacy')}}">
                            {!! Translator('footer_privacy', 'text', false, 'privacy') !!}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('page.cookie')}}">
                            {!! Translator('footer_cookie', 'text', false, 'cookies') !!}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('page.warranty')}}">
                            {!! Translator('footer_warranty', 'text', false, 'warranty') !!}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('page.returns')}}">
                            {!! Translator('footer_returns', 'text', false, 'returns') !!}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('page.delivery')}}">
                            {!! Translator('footer_delivery', 'text', false, 'delivery') !!}
                        </a>
                    </li>
                    {{--<li>--}}
                        {{--<a href="{{route('page.app')}}">--}}
                            {{--{!! Translator('footer_app', 'text', false, 'app') !!}--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    <li>
                        <a href="{{route('page.faq')}}">
                            {!! Translator('footer_faq', 'text', false, 'faq') !!}
                        </a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 mx-auto">

                <!-- Links -->
                <h4 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h4>

                <ul class="list-unstyled">
                    <li>
                        <a href="#!">Link 1</a>
                    </li>
                    <li>
                        <a href="#!">Link 2</a>
                    </li>
                    <li>
                        <a href="#!">Link 3</a>
                    </li>
                    <li>
                        <a href="#!">Link 4</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-sm-6 col-md-4 widget">
                <div class="widget-title">
                    <h4>Get in Touch</h4>
                </div>
                <div class="contact-widget">
                    <div class="info">
                        <p><i class="lnr lnr-map-marker"></i><span>{!! Translator('footer_address') !!}</span></p>
                    </div>
                    <div class="info">
                        <a href="tel:+0123456789"><i class="lnr lnr-phone-handset"></i><span>{!! Translator('footer_phone_nr') !!}</span></a>
                    </div>
                    <div class="info">
                        <a href="mailto:{!! Translator('footer_email_address') !!}">
                            <i class="lnr lnr-envelope"></i>
                            <span>
                                {!! Translator('footer_email_address', '') !!}
                            </span>
                        </a>
                    </div>
                    <div class="info">
                        <p class="social pull-left footer-social-icons">
                            <a class="no-margin" href="#"><i class="fab fa-facebook" style="color: #4064AC;"></i></a>
                            <a href="#"><i class="fab fa-twitter" style="color: #1C9CEA;"></i></a>
                            <a href="#"><i class="fab fa-instagram" style="color: #fff;"></i></a>
                            <a href="#"><i class="fab fa-google-plus" style="color: #D74C34;"></i></a>
                            <a href="#"><i class="fab fa-pinterest" style="color: #C51F26;"></i></a>
                            <a href="#"><i class="fab fa-linkedin" style="color: #0270AD;"></i></a>
                            <a href="#"><i class="fab fa-dribbble" style="color: #E34A85;"></i></a>
                        </p>
                    </div>
                </div><!-- / contact-widget -->
            </div>

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright py-3" >
        <div class="container">
            <div class="col-md-4">
                © 2018 Copyright:
                <a href="https://wwww.mediaverse.nl">Mediaverse.nl</a>
            </div>
            <div class="col-md-8 payment-icons">
                <ul class="list-unstyled list-inline pull-right">
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
        </div>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->