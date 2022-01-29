@extends('frontend.layout.main')

@section('meta_title', trans('meta.pages.about.title'))
@section('meta_description', trans('meta.pages.about.description'))
@section('meta_keywords', trans('meta.pages.about.keywords'))

@section('content')
    <div class="site__body">
        <div class="about">
            <div class="about__body">
                <div class="about__image">
                    <div class="about__image-bg" style="background-image: url('images/about-1903x1903.jpg');"></div>
                    <div class="decor about__image-decor decor--type--bottom">
                        <div class="decor__body">
                            <div class="decor__start"></div>
                            <div class="decor__end"></div>
                            <div class="decor__center"></div>
                        </div>
                    </div>
                </div>
                <div class="about__card">
                    <div class="about__card-title">{{ trans('meta.pages.about.title') }}</div>
                    <div class="about__card-text">
                        RedParts is an international company with 30 years of history selling spare parts for cars, trucks and motorcycles.
                        During our work we managed to create a unique service for the sale and delivery of spare parts around the world.
                    </div>
                    <div class="about__card-author">Ryan Ford, CEO RedParts</div>
{{--                    <div class="about__card-signature">--}}
{{--                        <img src="images/signature.jpg" width="160" height="55" alt="">--}}
{{--                    </div>--}}
                </div>
                <div class="about__indicators">
                    <div class="about__indicators-body">
                        <div class="about__indicators-item">
                            <div class="about__indicators-item-value">350</div>
                            <div class="about__indicators-item-title">Stores around the world</div>
                        </div>
                        <div class="about__indicators-item">
                            <div class="about__indicators-item-value">80 000</div>
                            <div class="about__indicators-item-title">Original auto parts</div>
                        </div>
                        <div class="about__indicators-item">
                            <div class="about__indicators-item-value">5 000</div>
                            <div class="about__indicators-item-title">Satisfied customers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--divider-xl"></div>
        <div class="block block-teammates">
            <div class="container container--max--xl">
                <div class="block-teammates__title">Professional Team</div>
                <div class="block-teammates__subtitle">Meet this is our professional team.</div>
                <div class="block-teammates__list">
                    <div class="owl-carousel">
                        <div class="block-teammates__item teammate">
                            <div class="teammate__avatar">
                                <img src="images/teammates/teammate1-206x206.jpg" alt="">
                            </div>
                            <div class="teammate__info">
                                <div class="teammate__name">Michael Russo</div>
                                <div class="teammate__position">Chief Executive Officer</div>
                            </div>
                        </div>
                        <div class="block-teammates__item teammate">
                            <div class="teammate__avatar">
                                <img src="images/teammates/teammate2-206x206.jpg" alt="">
                            </div>
                            <div class="teammate__info">
                                <div class="teammate__name">Samantha Smith</div>
                                <div class="teammate__position">Account Manager</div>
                            </div>
                        </div>
                        <div class="block-teammates__item teammate">
                            <div class="teammate__avatar">
                                <img src="images/teammates/teammate3-206x206.jpg" alt="">
                            </div>
                            <div class="teammate__info">
                                <div class="teammate__name">Anthony Harris</div>
                                <div class="teammate__position">Finance Director</div>
                            </div>
                        </div>
                        <div class="block-teammates__item teammate">
                            <div class="teammate__avatar">
                                <img src="images/teammates/teammate4-206x206.jpg" alt="">
                            </div>
                            <div class="teammate__info">
                                <div class="teammate__name">Katherine Miller</div>
                                <div class="teammate__position">Marketing Officer</div>
                            </div>
                        </div>
                        <div class="block-teammates__item teammate">
                            <div class="teammate__avatar">
                                <img src="images/teammates/teammate5-206x206.jpg" alt="">
                            </div>
                            <div class="teammate__info">
                                <div class="teammate__name">Boris Gilmore</div>
                                <div class="teammate__position">Engineer</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--divider-xl"></div>
        <div class="block block-reviews">
            <div class="container">
                <div class="block-reviews__title">Testimonials</div>
                <div class="block-reviews__subtitle">During our work we have accumulated<br>hundreds of positive reviews.</div>
                <div class="block-reviews__list">
                    <div class="owl-carousel">
                        <div class="block-reviews__item">
                            <div class="block-reviews__item-avatar">
                                <img src="images/testimonials/testimonial-1-190x190.jpg" alt="">
                            </div>
                            <div class="block-reviews__item-content">
                                <div class="block-reviews__item-text">This division is not obsolete but has changed. Natural philosophy has split into the various natural sciences, especially astronomy, and cosmology. Moral philosophy has birthed the social sciences, but still includes value theory.</div>
                                <div class="block-reviews__item-meta">
                                    <div class="block-reviews__item-rating">
                                        <div class="rating">
                                            <div class="rating__body">
                                                <div class="rating__star rating__star--active"></div>
                                                <div class="rating__star rating__star--active"></div>
                                                <div class="rating__star rating__star--active"></div>
                                                <div class="rating__star rating__star--active"></div>
                                                <div class="rating__star"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-reviews__item-author">
                                        Jessica Moore, CEO Meblya
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-reviews__item">
                            <div class="block-reviews__item-avatar">
                                <img src="images/testimonials/testimonial-2-190x190.jpg" alt="">
                            </div>
                            <div class="block-reviews__item-content">
                                <div class="block-reviews__item-text">Philosophical questions can be grouped into categories. These groupings allow philosophers. The groupings also make philosophy easier for students to approach.</div>
                                <div class="block-reviews__item-meta">
                                    <div class="block-reviews__item-rating">
                                        <div class="rating">
                                            <div class="rating__body">
                                                <div class="rating__star rating__star--active"></div>
                                                <div class="rating__star rating__star--active"></div>
                                                <div class="rating__star rating__star--active"></div>
                                                <div class="rating__star rating__star--active"></div>
                                                <div class="rating__star rating__star--active"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-reviews__item-author">
                                        Pete Bridges, Truck driver
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-reviews__item">
                            <div class="block-reviews__item-avatar">
                                <img src="images/testimonials/testimonial-3-190x190.jpg" alt="">
                            </div>
                            <div class="block-reviews__item-content">
                                <div class="block-reviews__item-text">The ideas conceived by a society have profound repercussions on what actions the society performs. Philosophy yields applications such as those in ethics – applied ethics in particular – and political philosophy.</div>
                                <div class="block-reviews__item-meta">
                                    <div class="block-reviews__item-rating">
                                        <div class="rating">
                                            <div class="rating__body">
                                                <div class="rating__star rating__star--active"></div>
                                                <div class="rating__star rating__star--active"></div>
                                                <div class="rating__star rating__star--active"></div>
                                                <div class="rating__star rating__star--active"></div>
                                                <div class="rating__star"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-reviews__item-author">
                                        Jeff Kowalski, CEO Stroyka
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>
@endsection
