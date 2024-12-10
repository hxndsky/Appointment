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
    <title>Poliklinik | Ganti Password</title>

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
                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Lupa Kata sandi?</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                    Ingat Kata sandi?
                    <a class="text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                        href="{{ route('login') }}">
                        Masuk disini
                    </a>
                </p>
            </div>

            <div class="mt-5">
                <!-- Form -->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="grid gap-y-4">
                        <!-- Form Group -->
                        <div>
                            <label for="email" class="block text-sm mb-2 dark:text-white">Email</label>
                            <div class="relative">
                                <input type="email" id="email" name="email"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    required aria-describedby="email-error" placeholder="Email">
                                <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                                    <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16" aria-hidden="true">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="hidden text-xs text-red-600 mt-2" id="email-error">Masukkan email yang valid</p>
                        </div>
                        <!-- End Form Group -->

                        <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Email Link Reset Kata sandi</button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</body>


</html>
