@props(['ads'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @hasSection('meta')
        @yield('meta')
    @else
        <meta name="title" content="{{ $setting->seo_meta_title }}">
        <meta name="description" content="{{ $setting->seo_meta_description }}">
        <meta name="keywords" content="{{ $setting->seo_meta_keywords }}">
    @endif

    <!-- PWA Meta Theme color and link Start  -->
    @if ($setting->pwa_enable)
        <meta name="theme-color"
            content="{{ empty($setting->frontend_primary_color) ? '#00AAFF' : $setting->frontend_primary_color }}" />
        <link rel="apple-touch-icon" href="{{ $setting->favicon_image_url }}">
        <link rel="manifest" href="{{ asset('manifest.json') }}">
    @endif
    <!-- PWA Meta Theme color and link End -->

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($setting->favicon_image) }}" />

    <!-- Title -->
    <title>@yield('title') - {{ config('app.name') }}</title>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @stack('css')

    <!-- Custom and dynamic css/scripts -->
    {!! $setting->header_css !!}
    {!! $setting->header_script !!}
    @livewireStyles
    @vite(['resources/frontend/css/app.css', 'resources/frontend/js/app.js'])
</head>

<body dir="{{ langDirection() ?? 'ltr' }}" class="<?php echo isset($_COOKIE['darkMode']) && $_COOKIE['darkMode'] === 'true' ? 'dark' : ''; ?>">
    <div class="flex flex-col min-h-screen">
        @if ($setting->current_theme == 3)
            <x-frontend.header3.header :login="true" />
        @elseif($setting->current_theme == 2)
            <x-frontend.header2.header :login="true" />
        @else
            <x-frontend.header.header :login="true" />
        @endif

        <main class="flex-grow dark:bg-gray-800">
            @yield('content')
        </main>

        @if ($setting->current_theme == 3)
            <x-frontend.footer3.footer />
        @elseif($setting->current_theme == 2)
            <x-frontend.footer2.footer />
        @else
            <x-frontend.footer.footer />
        @endif
    </div>

    <!-- Preloader Start  -->
    @if (setting('website_loader'))
        <x-frontend.preloader />
    @endif
    <!-- Preloader End  -->

    <!-- PWA Button Start -->
    <button class="pwa-install-btn bg-white position-fixed hidden" id="installApp">
        <img src="{{ asset('pwa-btn.png') }}" alt="Install App">
    </button>
    <!-- PWA Button End -->

    @include('frontend.layouts.partials.scripts')

    <!-- PWA Script Start -->
    @if ($setting->pwa_enable)
        <script src="{{ asset('sw.js') }}"></script>
        <script>
            if (!navigator.serviceWorker) {
                navigator.serviceWorker.register("/sw.js").then(function(reg) {
                    console.log("Service worker has been registered for scope: " + reg);
                });
            }

            let deferredPrompt;
            window.addEventListener('beforeinstallprompt', (e) => {
                $('#installApp').removeClass('hidden');
                deferredPrompt = e;
            });

            const installApp = document.getElementById('installApp');
            installApp.addEventListener('click', async () => {
                if (deferredPrompt !== null) {
                    deferredPrompt.prompt();
                    const {
                        outcome
                    } = await deferredPrompt.userChoice;
                    if (outcome === 'accepted') {
                        deferredPrompt = null;
                    }
                }
            });
        </script>
    @endif
    <!-- PWA Script End -->

    @livewireScripts
    @stack('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const lightLogoUrl = "{{ asset($setting->white_logo_url) }}";
            const darkLogoUrl = "{{ asset($setting->logo_image) }}";
            const darkModeToggle = document.getElementById('darkModeToggle');
            const icon = document.getElementById('icon');
            const isDarkMode = localStorage.getItem('darkMode') === 'true';
            const logo = document.getElementById('logo');
            setDarkMode(isDarkMode);


            darkModeToggle.addEventListener('click', function() {
                const currentMode = localStorage.getItem('darkMode') === 'true';
                setDarkMode(!currentMode);
                localStorage.setItem('darkMode', !currentMode);
                document.cookie = "darkMode=" + !currentMode + "; path=/;";
            });

            function setDarkMode(isDark) {
                document.body.classList.toggle('dark', isDark);

                if (isDark) {
                    icon.innerHTML = `
                        <!-- Custom SVG for Dark Mode -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                        </svg>
                    `;

                    logo.src = lightLogoUrl;

                } else {
                    icon.innerHTML = `
                        <!-- Custom SVG for Light Mode -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                        </svg>
                    `;
                    logo.src = darkLogoUrl;
                }
            }
        });
    </script>
</body>

</html>
