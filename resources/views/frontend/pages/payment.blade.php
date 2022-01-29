@extends('frontend.layout.main')

@section('meta_title', trans('meta.pages.payment.title'))
@section('meta_description', trans('meta.pages.payment.description'))
@section('meta_keywords', trans('meta.pages.payment.keywords'))

@section('content')
    <div class="site__body">
        <div class="block-space block-space--layout--spaceship-ledge-height"></div>
        <div class="block">
            <div class="container">
                <div class="document">
                    <div class="document__header">
                        <h1 class="document__title">{{ trans('meta.pages.payment.title') }}</h1>
                    </div>
                    <div class="document__content card">
                        <div class="typography">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis neque ut purus fermentum, ac pretium
                                nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci non sapien ullamcorper dapibus.
                                Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate. Suspendisse potenti. Pellentesque et
                                molestie ante. In feugiat ante vitae ultricies malesuada.
                            </p>
                            <h2>Definitions</h2>
                            <ol>
                                <li>
                                    <strong>Risus</strong> — Morbi posuere eleifend sollicitudin. Praesent eget ante in enim scelerisque
                                    scelerisque. Donec mi lorem, molestie a sapien non, laoreet convallis felis. In semper felis in lacus
                                    venenatis, sit amet commodo leo interdum. Maecenas congue ut leo et auctor.
                                </li>
                                <li>
                                    <strong>Praesent</strong> — Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                                    inceptos himenaeos. Nulla orci ante, viverra in imperdiet in, pharetra et leo
                                </li>
                                <li>
                                    <strong>Vestibulum</strong> — Vestibulum arcu tellus, aliquam vel fermentum vestibulum, lacinia pulvinar
                                    ipsum. In hac habitasse platea dictumst. Integer felis libero, blandit scelerisque mauris eget, porta
                                    elementum sapien. Mauris luctus arcu non enim lobortis gravida.
                                </li>
                            </ol>
                            <h2>Ornare dolor</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis neque ut purus fermentum, ac pretium
                                nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci non sapien ullamcorper dapibus.
                                Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate. Suspendisse potenti. Pellentesque et
                                molestie ante. In feugiat ante vitae ultricies malesuada.
                            </p>
                            <p>For information about how to contact us, please visit our <a href="{{ route('frontend.pages.contacts') }}">contact page</a>.</p>
                            {{--                            <div class="document__signature">--}}
                            {{--                                <img src="images/signature.jpg" width="160" height="55" alt="">--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>
@endsection
