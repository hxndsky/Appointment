<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="http://poliklinik.test/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Discover the difference that a professionally crafted website can make for your business.">

    <meta name="twitter:site" content="@preline">
    <meta name="twitter:creator" content="@preline">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="POLIKLINIK">
    <meta name="twitter:description"
        content="Discover the difference that a professionally crafted website can make for your business.">
    <meta name="twitter:image" content="https://preline.co/assets/img/og-image.png">

    <meta property="og:url" content="http://poliklinik.test/">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Preline">
    <meta property="og:title" content="POLIKLINIK">
    <meta property="og:description"
        content="Discover the difference that a professionally crafted website can make for your business.">
    <meta property="og:image" content="https://preline.co/assets/img/og-image.png">

    <!-- Title -->
    <title>Poliklinik | Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://preline.co/favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS Preline -->
    <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-50 dark:bg-neutral-900">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div
        class="w-full max-w-md mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-700">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Masuk</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                    Belum punya akun?
                    <a class="text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                        href="{{ route('register') }}">
                        Buat akun disini
                    </a>
                </p>
            </div>

            <div class="mt-5">

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="grid gap-y-4">
                        <!-- Form Group -->
                        <div>
                            <label for="login_type" class="block text-sm mb-2 dark:text-white">Nama atau No HP</label>
                            <div class="relative">
                                <input type="text" id="login_type" name="login_type"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    required aria-describedby="email-error" placeholder="Nama atau No HP">

                            </div>
                            <p class="hidden text-xs text-red-600 mt-2" id="email-error">Masukkan Nama atau No HP yang
                                valid.</p>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div>
                            <div class="flex justify-between items-center">
                                <label for="password" class="block text-sm mb-2 dark:text-white">Kata Sandi</label>
                                <a class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                                    href="{{ route('password.request') }}">Lupa Kata Sandi?</a>
                            </div>
                            <div class="relative">
                                <input type="password" id="password" name="password"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    required aria-describedby="password-error" placeholder="Kata Sandi">
                                <button type="button" id="toggle-password"
                                    class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
                                    <svg id="toggle-password-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                                        </path>
                                        <path class="hs-password-active:hidden"
                                            d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                        </path>
                                        <path class="hs-password-active:hidden"
                                            d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                        </path>
                                        <line class="hs-password-active:hidden" x1="2" x2="22"
                                            y1="2" y2="22"></line>
                                        <path class="hidden hs-password-active:block"
                                            d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                        <circle class="hidden hs-password-active:block" cx="12" cy="12"
                                            r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                            <p class="hidden text-xs text-red-600 mt-2" id="password-error">Minimal 8 karakter</p>
                        </div>
                        <!-- End Form Group -->

                        <!-- Checkbox -->
                        <div class="flex items-center">
                            <div class="flex">
                                <input id="remember-me" name="remember-me" type="checkbox"
                                    class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                            </div>
                            <div class="ms-3">
                                <label for="remember-me" class="text-sm dark:text-white">Ingat saya</label>
                            </div>
                        </div>
                        <!-- End Checkbox -->

                        <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Masuk</button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</body>

<script>
    const passwordInput = document.getElementById('password');
    const togglePasswordButton = document.getElementById('toggle-password');
    const togglePasswordIcon = document.getElementById('toggle-password-icon');

    togglePasswordButton.addEventListener('click', () => {
        const isPasswordVisible = passwordInput.type === 'text';
        passwordInput.type = isPasswordVisible ? 'password' : 'text';
        togglePasswordIcon.setAttribute(
            'd',
            isPasswordVisible ?
            'M15 12l.011-.011M21.195 12.43...' // Replace with eye-open path
            :
            'M15 12l.011-.011M12...' // Replace with eye-close path
        );
    });
</script>

</html>
