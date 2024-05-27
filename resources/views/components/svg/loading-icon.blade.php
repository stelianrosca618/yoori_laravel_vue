@props(['width' => 24, 'height' => 24, 'stroke' => '#fff', 'strokeWidth' => 2])

<svg class="tw-animate-spin" width="{{ $width }}" height="{{ $height }}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M12 3V6" stroke="{{ $stroke }}" stroke-width="{{ $strokeWidth }}" stroke-linecap="round"
        stroke-linejoin="round" />
    <path opacity="0.9" d="M18.364 5.63574L16.2427 7.75706" stroke="{{ $stroke }}"
        stroke-width="{{ $strokeWidth }}" stroke-linecap="round" stroke-linejoin="round" />
    <path opacity="0.8" d="M21 12H18" stroke="{{ $stroke }}" stroke-width="{{ $strokeWidth }}"
        stroke-linecap="round" stroke-linejoin="round" />
    <path opacity="0.7" d="M18.364 18.3635L16.2427 16.2422" stroke="{{ $stroke }}"
        stroke-width="{{ $strokeWidth }}" stroke-linecap="round" stroke-linejoin="round" />
    <path opacity="0.6" d="M12 21V18" stroke="{{ $stroke }}" stroke-width="{{ $strokeWidth }}"
        stroke-linecap="round" stroke-linejoin="round" />
    <path opacity="0.5" d="M5.63623 18.3635L7.75755 16.2422" stroke="{{ $stroke }}"
        stroke-width="{{ $strokeWidth }}" stroke-linecap="round" stroke-linejoin="round" />
    <path opacity="0.4" d="M3 12H6" stroke="{{ $stroke }}" stroke-width="{{ $strokeWidth }}"
        stroke-linecap="round" stroke-linejoin="round" />
    <path opacity="0.3" d="M5.63623 5.63574L7.75755 7.75706" stroke="{{ $stroke }}"
        stroke-width="{{ $strokeWidth }}" stroke-linecap="round" stroke-linejoin="round" />
</svg>
