<footer class="site__footer">
    <div class="site-footer">
        <div class="decor site-footer__decor decor--type--bottom">
            <div class="decor__body">
                <div class="decor__start"></div>
                <div class="decor__end"></div>
                <div class="decor__center"></div>
            </div>
        </div>

        <div class="site-footer__widgets">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="site-footer__widget footer-contacts">
                            <h5 class="footer-contacts__title">{{ trans('menus.frontend.footer.contacts.title') }}</h5>
                            <div class="footer-contacts__text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Integer in feugiat lorem.
                            </div>

                            <address class="footer-contacts__contacts">
                                <dl>
                                    <dt>{{ trans('menus.frontend.footer.contacts.labels.phone') }}</dt>
                                    <dd>{{ config('contacts.phone') }}</dd>
                                </dl>
                                <dl>
                                    <dt>{{ trans('menus.frontend.footer.contacts.labels.email') }}</dt>
                                    <dd>{{ config('contacts.email') }}</dd>
                                </dl>
                                <dl>
                                    <dt>{{ trans('menus.frontend.footer.contacts.labels.support') }}</dt>
                                    <dd>Пн - Пт 10:00 - 18:00</dd>
                                </dl>
                                <dl>
                                    <dt>{{ trans('menus.frontend.footer.contacts.labels.online_orders') }}</dt>
                                    <dd>24/7</dd>
                                </dl>
                            </address>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 col-xl-2">
                        <div class="site-footer__widget footer-links">
                            <h5 class="footer-links__title">{{ trans('menus.frontend.footer.information.title') }}</h5>
                            <ul class="footer-links__list">
                                <li class="footer-links__item"><a href="{{ route('frontend.pages.about') }}" class="footer-links__link">{{ trans('menus.frontend.pages.about.title') }}</a></li>
                                <li class="footer-links__item"><a href="{{ route('frontend.pages.delivery') }}" class="footer-links__link">{{ trans('menus.frontend.pages.delivery.title') }}</a></li>
                                <li class="footer-links__item"><a href="{{ route('frontend.pages.payment') }}" class="footer-links__link">{{ trans('menus.frontend.pages.payment.title') }}</a></li>
                                <li class="footer-links__item"><a href="{{ route('frontend.pages.terms') }}" class="footer-links__link">{{ trans('menus.frontend.pages.terms.title') }}</a></li>
                                <li class="footer-links__item"><a href="{{ route('frontend.pages.privacy') }}" class="footer-links__link">{{ trans('menus.frontend.pages.privacy.title') }}</a></li>
                                <li class="footer-links__item"><a href="{{ route('frontend.pages.faq') }}" class="footer-links__link">{{ trans('menus.frontend.pages.faq.title') }}</a></li>
                                <li class="footer-links__item"><a href="{{ route('frontend.pages.contacts') }}" class="footer-links__link">{{ trans('menus.frontend.pages.contacts.title') }}</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 col-xl-2">
                        <div class="site-footer__widget footer-links">
                            <h5 class="footer-links__title">{{ trans('menus.frontend.footer.account.title') }}</h5>
                            <ul class="footer-links__list">
                                @guest
                                    <li class="footer-links__item"><a href="{{ route('login') }}" class="footer-links__link">{{ trans('menus.frontend.footer.account.labels.login') }}</a></li>
                                    <li class="footer-links__item"><a href="{{ route('register') }}" class="footer-links__link">{{ trans('menus.frontend.footer.account.labels.register') }}</a></li>
                                @else
                                    <li class="footer-links__item"><a href="{{ route('frontend.account.dashboard') }}" class="footer-links__link">{{ trans('menus.frontend.footer.account.labels.dashboard') }}</a></li>
                                    <li class="footer-links__item"><a href="{{ route('frontend.account.garage') }}" class="footer-links__link">{{ trans('menus.frontend.footer.account.labels.garage') }}</a></li>
                                    <li class="footer-links__item"><a href="{{ route('frontend.account.orders') }}" class="footer-links__link">{{ trans('menus.frontend.footer.account.labels.orders') }}</a></li>
                                @endguest
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="site-footer__widget footer-newsletter">
                            <h5 class="footer-newsletter__title">{{ trans('menus.frontend.footer.newsletter.title') }}</h5>
                            <div class="footer-newsletter__text">
                                Enter your email address below to subscribe to our newsletter and keep up to date with discounts and special offers.
                            </div>
                            <form action="" class="footer-newsletter__form">
                                <label class="sr-only" for="footer-newsletter-address">Email Address</label>
                                <input type="text" class="footer-newsletter__form-input" id="footer-newsletter-address" placeholder="Email Address...">
                                <button class="footer-newsletter__form-button">Subscribe</button>
                            </form>
                            <div class="footer-newsletter__text footer-newsletter__text--social">
                                Follow us on social networks
                            </div>
                            <div class="footer-newsletter__social-links social-links">
                                <ul class="social-links__list">
                                    <li class="social-links__item social-links__item--facebook"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="social-links__item social-links__item--twitter"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li class="social-links__item social-links__item--youtube"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                    <li class="social-links__item social-links__item--instagram"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li class="social-links__item social-links__item--rss"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fas fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-footer__bottom">
            <div class="container">
                <div class="site-footer__bottom-row">
                    <div class="site-footer__copyright">
                        Copyright &copy; {{ date('Y') }} <a href="{{ routeHome() }}">{{ config('app.name') }}</a>. {{ trans('strings.frontend.general.all_rights_reserved') }}
                    </div>

                    <div class="site-footer__payments">
                        <img src="{{ asset('assets/payments/visa.png') }}" alt="Visa">
                        <img src="{{ asset('assets/payments/mastercard.png') }}" alt="MasterCard">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
