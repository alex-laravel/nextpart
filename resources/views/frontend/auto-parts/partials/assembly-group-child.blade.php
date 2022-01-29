<li class="widget-categories__item" data-collapse-item>
{{--    {{ route('frontend.assemblies.index', $assemblyGroup['assemblyGroupNodeId']) }}--}}
    <a href="#" class="widget-categories__link">
        {{ $assemblyGroup['assemblyGroupName'] }}
    </a>

    @isset($assemblyGroup['children'])
        @if (!empty($assemblyGroup['children']))
            <button class="widget-categories__expander" type="button" data-collapse-trigger></button>

            <div class="widget-categories__container" data-collapse-content>
                <ul class="widget-categories__list widget-categories__list--child">
                    @foreach($assemblyGroup['children'] as $assemblyGroup)
                        @include('frontend.auto-parts.partials.assembly-group-child', $assemblyGroup)
                    @endforeach
                </ul>
            </div>
        @endif
    @endisset
</li>
