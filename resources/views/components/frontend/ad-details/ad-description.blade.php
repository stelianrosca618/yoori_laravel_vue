<div>
    <div class="product-item__description">
        <h2 class="text--body-1-600">{{ __('descriptions') }}</h2>
        {!! $description !!}
        @if ($videourl)
            <iframe width="700" height="300" src="{{$videourl}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        @endif
    </div>
    <div class="product-item__feature">
        <h2 class="text--body-1-600">{{ __('feature') }}</h2>
        <ul class="feature">
            <li>
                <ul>
                    @foreach ($features as $key => $feature)
                        @if ($loop->odd)
                            <li class="feature-item">
                                <span class="icon">
                                    <x-svg.check-icon width="24" height="24" stroke="#00AAFF" />
                                </span>
                                <p class="text--body-3">{{ $feature->name }}</p>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
            <li>
                <ul>
                    @foreach ($features as $key => $feature)
                        @if ($loop->even)
                            <li class="feature-item">
                                <span class="icon">
                                    <x-svg.check-icon width="24" height="24" stroke="#00AAFF" />
                                </span>
                                <p class="text--body-3">{{ $feature->name }}</p>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</div>
