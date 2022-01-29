@if (count($brands))
    <div class="block block-brands block-brands--layout--columns-8-full">
        <div class="container">
            <ul class="block-brands__list">
                @foreach ($brands as $brand)
                    <li class="block-brands__item">
                        <a href="{{ route('frontend.parts.brand', $brand->brandId) }}" class="block-brands__item-link">
                            <img src="{{ asset('assets/brands/' . $brand->brandLogoName) }}" alt="{{ $brand->brandName }}">
                            <span class="block-brands__item-name">{{ $brand->brandName }}</span>
                        </a>
                    </li>

                    <li class="block-brands__divider" role="presentation"></li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
