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
    <title>Poliklinik</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://preline.co/favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS Preline -->
    <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">
</head>

<body class="bg-white">
    <!-- ========== HEADER ========== -->
    <header class="sticky top-4 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full">
        <nav class="relative max-w-[66rem] w-full bg-blue-50 rounded-3xl py-3 ps-5 pe-2 md:flex md:items-center md:justify-between md:py-0 mx-2 lg:mx-auto"
            aria-label="Global">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a class="flex-none rounded-md text-2xl inline-block font-bold focus:outline-none focus:opacity-80"
                    href="/" aria-label="Preline">
                    <h1>POLI<span class="text-blue-600">KLINIK</span></h1>
                </a>
                <!-- End Logo -->

                <div class="md:hidden">
                    <button type="button"
                        class="hs-collapse-toggle size-8 flex justify-center items-center text-sm font-semibold rounded-full bg-neutral-100 text-black disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-collapse="#navbar-collapse" aria-controls="navbar-collapse"
                        aria-label="Toggle navigation">
                        <svg class="hs-collapse-open:hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" />
                        </svg>
                        <svg class="hs-collapse-open:block hidden flex-shrink-0 size-4"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Collapse -->
            <div id="navbar-collapse"
                class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block">
                <div
                    class="flex flex-col gap-y-4 gap-x-0 mt-5 md:flex-row md:items-center md:justify-end md:gap-y-0 md:gap-x-7 md:mt-0 md:ps-7">
                    <a class="text-sm text-black hover:text-neutral-800 md:py-4 focus:outline-none focus:text-neutral-800"
                        href="/" aria-current="page">Beranda</a>
                    <a class="text-sm text-black hover:text-neutral-800 md:py-4 focus:outline-none focus:text-neutral-800"
                        href="#reviews">Testimoni</a>
                    <a class="text-sm text-black hover:text-neutral-800 md:py-4 focus:outline-none focus:text-neutral-800"
                        href="#contact">Kontak Kami</a>


                    <div>
                        <a class="group inline-flex items-center gap-x-2 py-2 px-3 bg-blue-600 font-medium text-sm text-white rounded-full focus:outline-none"
                            href="{{ route('login') }}">
                            Masuk
                        </a>
                        <a class="group inline-flex items-center gap-x-2 py-2 px-3 bg-white text-black font-medium text-sm rounded-full focus:outline-none"
                            href="{{ route('register') }}">
                            Buat Akun
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Collapse -->
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">
        <!-- Hero -->
        <div class="bg-neutral-200">
            <div class="max-w-5xl mx-auto px-4 xl:px-0 pt-24 lg:pt-32 pb-24">
                <h1 class="font-semibold text-black text-5xl md:text-6xl">
                    <span class="text-blue-600">POLI</span>KLINIK
                </h1>
                <div class="max-w-4xl">
                    <p class="mt-5 text-neutral-400 text-lg">
                        Poliklinik kami adalah pusat layanan kesehatan yang menghubungkan kebutuhan Anda dengan keahlian
                        medis terbaik, menciptakan solusi kesehatan yang nyata. Di Poliklinik, kami mengutamakan
                        kemudahan dalam membuat janji periksa dengan dokter pilihan Anda, memastikan setiap kebutuhan
                        kesehatan ditangani secara profesional.
                    </p>
                </div>
            </div>
        </div>
        <!-- End Hero -->

        <!-- Testimonials -->
        <div class="bg-neutral-200 bg-gradient-to-t from-neutral-300 to-transparent" id="reviews">
            <div class="max-w-5xl px-4 xl:px-0 py-10 lg:py-20 mx-auto">
                <!-- Title -->
                <div class="max-w-3xl mb-10 lg:mb-14">
                    <h2 class="text-blue-600 font-semibold text-2xl md:text-4xl md:leading-tight">Testimoni</h2>
                    <p class="mt-1 text-neutral-400">Dengan dedikasi penuh terhadap kesehatan pasien, kami bangga
                        memberikan pelayanan terbaik yang telah dipercaya oleh banyak pasien kami.</p>
                </div>
                <!-- End Title -->

                <!-- Grid -->
                <div class="md:grid md:grid-cols-2 md:gap-10 lg:gap-16 md:items-center">
                    <div>
                        <!-- Blockquote -->
                        <blockquote>
                            <p
                                class="font-medium text-xl text-black md:text-2xl md:leading-normal xl:text-3xl xl:leading-normal">
                                Pelayanan di Poliklinik sangat ramah dan profesional. Semua kebutuhan kesehatan
                                saya ditangani dengan baik dan cepat.
                            </p>

                            <footer class="mt-6">
                                <div class="flex items-center">
                                    <div class="md:hidden flex-shrink-0">
                                        <img class="size-12 rounded-full"
                                            src="https://images.unsplash.com/photo-1671725501928-b7d85698ccd8?q=80&w=320&h=320&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                            alt="Image Description">
                                    </div>
                                    <div class="ms-4 md:ms-0">
                                        <div class="text-base font-semibold text-blue-600">Andi Wijaya</div>
                                        <div class="text-xs text-neutral-400">Pasien | Poliklinik</div>
                                    </div>
                                </div>
                            </footer>
                        </blockquote>
                        <!-- End Blockquote -->
                    </div>
                    <!-- End Col -->

                    <div class="hidden md:block mb-24 md:mb-0">
                        <img class="rounded-xl"
                            src="https://img.freepik.com/free-photo/coronavirus-sample-procedure_23-2148709151.jpg?ga=GA1.1.1329671110.1727766585&semt=ais_hybrid"
                            alt="Image Description">
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Grid -->
            </div>
        </div>
        <!-- End Testimonials -->

        <!-- Contact -->
        <div class="bg-neutral-200" id="contact">
            <div class="max-w-5xl px-4 xl:px-0 py-10 lg:py-20 mx-auto">
                <!-- Title -->
                <div class="max-w-3xl mb-10 lg:mb-14">
                    <h2 class="text-blue-600 font-semibold text-2xl md:text-4xl md:leading-tight">Kontak kami</h2>
                    <p class="mt-1 text-neutral-400">Silahkan isi form dibawah untuk menghubungi kami.</p>
                </div>
                <!-- End Title -->

                <!-- Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 lg:gap-x-16">
                    <div class="md:order-2 border-b border-neutral-100 pb-10 mb-10 md:border-b-0 md:pb-0 md:mb-0">
                        <form>
                            <div class="space-y-4">
                                <!-- Input -->
                                <div class="relative">
                                    <input type="text" id="hs-tac-input-name"
                                        class="peer p-4 block w-full bg-neutral-100 border-neutral-200 rounded-lg text-sm text-black placeholder:text-transparent focus:outline-none focus:ring-0 focus:border-neutral-200 disabled:opacity-50 disabled:pointer-events-none
                  focus:pt-6
                  focus:pb-2
                  [&:not(:placeholder-shown)]:pt-6
                  [&:not(:placeholder-shown)]:pb-2
                  autofill:pt-6
                  autofill:pb-2"
                                        placeholder="Name">
                                    <label for="hs-tac-input-name"
                                        class="absolute top-0 start-0 p-4 h-full text-neutral-400 text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none
                    peer-focus:text-xs
                    peer-focus:-translate-y-1.5
                    peer-focus:text-neutral-400
                    peer-[:not(:placeholder-shown)]:text-xs
                    peer-[:not(:placeholder-shown)]:-translate-y-1.5
                    peer-[:not(:placeholder-shown)]:text-neutral-400">Nama</label>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <div class="relative">
                                    <input type="email" id="hs-tac-input-email"
                                        class="peer p-4 block w-full bg-neutral-100 border-neutral-200 rounded-lg text-sm text-black placeholder:text-transparent focus:outline-none focus:ring-0 focus:border-neutral-200 disabled:opacity-50 disabled:pointer-events-none
                  focus:pt-6
                  focus:pb-2
                  [&:not(:placeholder-shown)]:pt-6
                  [&:not(:placeholder-shown)]:pb-2
                  autofill:pt-6
                  autofill:pb-2"
                                        placeholder="Email">
                                    <label for="hs-tac-input-email"
                                        class="absolute top-0 start-0 p-4 h-full text-neutral-400 text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none
                    peer-focus:text-xs
                    peer-focus:-translate-y-1.5
                    peer-focus:text-neutral-400
                    peer-[:not(:placeholder-shown)]:text-xs
                    peer-[:not(:placeholder-shown)]:-translate-y-1.5
                    peer-[:not(:placeholder-shown)]:text-neutral-400">Email</label>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <div class="relative">
                                    <input type="text" id="hs-tac-input-company"
                                        class="peer p-4 block w-full bg-neutral-100 border-neutral-200 rounded-lg text-sm text-black placeholder:text-transparent focus:outline-none focus:ring-0 focus:border-neutral-200 disabled:opacity-50 disabled:pointer-events-none
                  focus:pt-6
                  focus:pb-2
                  [&:not(:placeholder-shown)]:pt-6
                  [&:not(:placeholder-shown)]:pb-2
                  autofill:pt-6
                  autofill:pb-2"
                                        placeholder="Company">
                                    <label for="hs-tac-input-company"
                                        class="absolute top-0 start-0 p-4 h-full text-neutral-400 text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none
                    peer-focus:text-xs
                    peer-focus:-translate-y-1.5
                    peer-focus:text-neutral-400
                    peer-[:not(:placeholder-shown)]:text-xs
                    peer-[:not(:placeholder-shown)]:-translate-y-1.5
                    peer-[:not(:placeholder-shown)]:text-neutral-400">Perusahaan</label>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <div class="relative">
                                    <input type="text" id="hs-tac-input-phone"
                                        class="peer p-4 block w-full bg-neutral-100 border-neutral-200 rounded-lg text-sm text-black placeholder:text-transparent focus:outline-none focus:ring-0 focus:border-neutral-200 disabled:opacity-50 disabled:pointer-events-none
                  focus:pt-6
                  focus:pb-2
                  [&:not(:placeholder-shown)]:pt-6
                  [&:not(:placeholder-shown)]:pb-2
                  autofill:pt-6
                  autofill:pb-2"
                                        placeholder="Phone">
                                    <label for="hs-tac-input-phone"
                                        class="absolute top-0 start-0 p-4 h-full text-neutral-400 text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none
                    peer-focus:text-xs
                    peer-focus:-translate-y-1.5
                    peer-focus:text-neutral-400
                    peer-[:not(:placeholder-shown)]:text-xs
                    peer-[:not(:placeholder-shown)]:-translate-y-1.5
                    peer-[:not(:placeholder-shown)]:text-neutral-400">No
                                        HP</label>
                                </div>
                                <!-- End Input -->

                            </div>

                            <div class="mt-2">
                                <p class="text-xs text-neutral-500">
                                    *Harap isi semua
                                </p>

                                <p class="mt-5">
                                    <a class="group inline-flex items-center gap-x-2 py-2 px-3 bg-blue-600 font-medium text-sm text-white rounded-full focus:outline-none"
                                        href="#">
                                        Kirim
                                        <svg class="flex-shrink-0 size-4 transition group-hover:translate-x-0 group-focus:translate-x-0.5 "
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14" />
                                            <path d="m12 5 7 7-7 7" />
                                        </svg>
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                    <!-- End Col -->

                    <div class="space-y-14">
                        <!-- Item -->
                        <div class="flex gap-x-5">
                            <svg class="flex-shrink-0 size-6 text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            <div class="grow">
                                <h4 class="text-black font-semibold">Alamat kami:</h4>

                                <address class="mt-1 text-neutral-400 text-sm not-italic">
                                    Pantai Indah Kapuk 2,<br>
                                    Jakarta, Indonesia
                                </address>
                            </div>
                        </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="flex gap-x-5">
                            <svg class="flex-shrink-0 size-6 text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z" />
                                <path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10" />
                            </svg>
                            <div class="grow">
                                <h4 class="text-black font-semibold">Email kami:</h4>

                                <a class="mt-1 text-neutral-400 text-sm" href="#mailto:example@site.co"
                                    target="_blank">
                                    poliklinik@email.com
                                </a>
                            </div>
                        </div>
                        <!-- End Item -->


                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Grid -->
            </div>
        </div>
        <!-- End Contact -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- ========== FOOTER ========== -->
    <footer class="relative overflow-hidden bg-neutral-200">
        <svg class="absolute -bottom-20 start-1/2 w-[1900px] transform -translate-x-1/2" width="2745"
            height="488" viewBox="0 0 2745 488" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0.5 330.864C232.505 403.801 853.749 527.683 1482.69 439.719C2111.63 351.756 2585.54 434.588 2743.87 487"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 308.873C232.505 381.81 853.749 505.692 1482.69 417.728C2111.63 329.765 2585.54 412.597 2743.87 465.009"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 286.882C232.505 359.819 853.749 483.701 1482.69 395.738C2111.63 307.774 2585.54 390.606 2743.87 443.018"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 264.891C232.505 337.828 853.749 461.71 1482.69 373.747C2111.63 285.783 2585.54 368.615 2743.87 421.027"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 242.9C232.505 315.837 853.749 439.719 1482.69 351.756C2111.63 263.792 2585.54 346.624 2743.87 399.036"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 220.909C232.505 293.846 853.749 417.728 1482.69 329.765C2111.63 241.801 2585.54 324.633 2743.87 377.045"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 198.918C232.505 271.855 853.749 395.737 1482.69 307.774C2111.63 219.81 2585.54 302.642 2743.87 355.054"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 176.927C232.505 249.864 853.749 373.746 1482.69 285.783C2111.63 197.819 2585.54 280.651 2743.87 333.063"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 154.937C232.505 227.873 853.749 351.756 1482.69 263.792C2111.63 175.828 2585.54 258.661 2743.87 311.072"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 132.946C232.505 205.882 853.749 329.765 1482.69 241.801C2111.63 153.837 2585.54 236.67 2743.87 289.082"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 110.955C232.505 183.891 853.749 307.774 1482.69 219.81C2111.63 131.846 2585.54 214.679 2743.87 267.091"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 88.9639C232.505 161.901 853.749 285.783 1482.69 197.819C2111.63 109.855 2585.54 192.688 2743.87 245.1"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 66.9729C232.505 139.91 853.749 263.792 1482.69 175.828C2111.63 87.8643 2585.54 170.697 2743.87 223.109"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 44.9819C232.505 117.919 853.749 241.801 1482.69 153.837C2111.63 65.8733 2585.54 148.706 2743.87 201.118"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 22.991C232.505 95.9276 853.749 219.81 1482.69 131.846C2111.63 43.8824 2585.54 126.715 2743.87 179.127"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 1C232.505 73.9367 853.749 197.819 1482.69 109.855C2111.63 21.8914 2585.54 104.724 2743.87 157.136"
                class="stroke-neutral-700/50" stroke="currentColor" />
        </svg>

        <div class="relative z-10">
            <div class="w-full max-w-5xl px-4 xl:px-0 py-10 lg:pt-16 mx-auto">
                <div class="inline-flex items-center">
                    <!-- Logo -->
                    <h1 class="flex-none rounded-md text-2xl inline-block font-bold focus:outline-none focus:opacity-80"
                        href="/" aria-label="Preline">
                        POLI<span class="text-blue-600">KLINIK</span>
                    </h1>
                    <!-- End Logo -->

                    <div class="border-s border-neutral-700 ps-5 ms-5">
                        <p class="text-sm text-neutral-400">2024 POLIKLINIK</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ========== END FOOTER ========== -->

    <!-- JS Implementing Plugins -->

    <!-- JS PLUGINS -->
    <!-- Required plugins -->
    <script src="https://cdn.jsdelivr.net/npm/preline/dist/preline.min.js"></script>

    <!-- JS INITIALIZATIONS -->
    <script>
        (function() {
            function textareaAutoHeight(el, offsetTop = 0) {
                el.style.height = 'auto';
                el.style.height = `${el.scrollHeight + offsetTop}px`;
            }

            (function() {
                const textareas = [
                    '#hs-tac-message'
                ];

                textareas.forEach((el) => {
                    const textarea = document.querySelector(el);
                    const overlay = textarea.closest('.hs-overlay');

                    if (overlay) {
                        const {
                            element
                        } = HSOverlay.getInstance(overlay, true);

                        element.on('open', () => textareaAutoHeight(textarea, 3));
                    } else textareaAutoHeight(textarea, 3);

                    textarea.addEventListener('input', () => {
                        textareaAutoHeight(textarea, 3);
                    });
                });
            })();
        })()
    </script>
</body>

</html>
