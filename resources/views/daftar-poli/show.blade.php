@extends('layouts.app')
<!-- PASIEN -->
@section('title', 'Detail Daftar Poli')
@section('content')
    <!-- Breadcrumb -->
    <div
        class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 lg:px-8 lg:hidden dark:bg-neutral-800 dark:border-neutral-700">
        <div class="flex items-center py-2">
            <!-- Navigation Toggle -->
            <button type="button"
                class="size-8 flex justify-center items-center gap-x-2 border border-gray-200 text-gray-800 hover:text-gray-500 rounded-lg focus:outline-none focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar"
                aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
                <span class="sr-only">Toggle Navigation</span>
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect width="18" height="18" x="3" y="3" rx="2" />
                    <path d="M15 3v18" />
                    <path d="m8 9 3 3-3 3" />
                </svg>
            </button>
            <!-- End Navigation Toggle -->

            <!-- Breadcrumb -->
            <ol class="ms-3 flex items-center whitespace-nowrap">
                <li class="flex items-center text-sm text-gray-800 dark:text-neutral-400">
                    Dashboard
                    <svg class="shrink-0 mx-3 overflow-visible size-2.5 text-gray-400 dark:text-neutral-500" width="16"
                        height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </li>
                <li class="text-sm font-semibold text-gray-800 truncate dark:text-neutral-400" aria-current="page">
                    Detail Daftar Poli
                </li>
            </ol>
            <!-- End Breadcrumb -->
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Sidebar -->
    <div id="hs-application-sidebar"
        class="hs-overlay  [--auto-close:lg]
hs-overlay-open:translate-x-0
-translate-x-full transition-all duration-300 transform
w-[260px] h-full
hidden
fixed inset-y-0 start-0 z-[60]
bg-white border-e border-gray-200
lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
dark:bg-neutral-800 dark:border-neutral-700"
        role="dialog" tabindex="-1" aria-label="Sidebar">
        <div class="relative flex flex-col h-full max-h-full">
            <div class="px-6 pt-4">
                <!-- Logo -->
                <a class="flex-none rounded-md text-2xl inline-block font-bold focus:outline-none focus:opacity-80"
                    href="{{ Auth::user()->role == 'Admin' ? route('admin.dashboard.index') : (Auth::user()->role == 'Dokter' ? route('dokter.dashboard.index') : route('dashboard')) }}"
                    aria-label="Preline">
                    <h1>POLI<span class="text-blue-600">KLINIK</span></h1>
                </a>
                <!-- End Logo -->
            </div>

            <!-- Content -->
            <div
                class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                    <ul class="flex flex-col space-y-1">
                        <li>
                            <a class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white"
                                href="{{ Auth::user()->role == 'Admin' ? route('admin.dashboard.index') : (Auth::user()->role == 'Dokter' ? route('dokter.dashboard.index') : route('dashboard')) }}">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                    <polyline points="9 22 9 12 15 12 15 22" />
                                </svg>
                                Dashboard
                            </a>
                        </li>

                        <li class="hs-accordion" id="projects-accordion">
                            <button type="button"
                                class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                aria-expanded="true" aria-controls="projects-accordion-child">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 6v4" />
                                    <path d="M14 14h-4" />
                                    <path d="M14 18h-4" />
                                    <path d="M14 8h-4" />
                                    <path d="M18 12h2a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-9a2 2 0 0 1 2-2h2" />
                                    <path d="M18 22V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v18" />
                                </svg>
                                Poli

                                <svg class="hs-accordion-active:block ms-auto hidden size-4"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="m18 15-6-6-6 6" />
                                </svg>

                                <svg class="hs-accordion-active:hidden ms-auto block size-4"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </button>

                            <div id="projects-accordion-child"
                                class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                                role="region" aria-labelledby="projects-accordion">
                                <ul class="ps-8 pt-1 space-y-1">
                                    <li>
                                        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                            href="{{ route('daftar-poli.index') }}">
                                            Daftar Poli
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- End Content -->
        </div>
    </div>
    <!-- End Sidebar -->

    <!-- Content -->
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            <!-- Card -->
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div
                            class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                            <!-- Header -->
                            <div
                                class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                        Detail Daftar Poli
                                    </h2>
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Table -->
                            <div class="p-4 overflow-y-auto">
                                <form action="{{ route('daftar-poli.save') }}" method="POST">
                                    @csrf

                                    <div class="mb-4">
                                        <label class="block text-gray-800 dark:text-neutral-400 font-bold">No. Rekam
                                            Medis</label>
                                        <p>{{ $daftarPoli->pasien->no_rm }}</p>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-800 dark:text-neutral-400 font-bold">Nama
                                            Poli</label>
                                        <p>{{ $daftarPoli->jadwal->dokter->poli->nama_poli }}</p>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-800 dark:text-neutral-400 font-bold">Nama
                                            Dokter</label>
                                        <p>{{ $daftarPoli->jadwal->dokter->nama }}</p>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-800 dark:text-neutral-400 font-bold">Hari</label>
                                        <p>{{ $daftarPoli->jadwal->hari }}</p>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-800 dark:text-neutral-400 font-bold">Jam</label>
                                        <p>{{ $daftarPoli->jadwal->jam_mulai }} - {{ $daftarPoli->jadwal->jam_selesai }}</p>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-800 dark:text-neutral-400 font-bold">No.
                                            Antrian</label>
                                        <p>{{ $daftarPoli->no_antrian }}</p>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-800 dark:text-neutral-400 font-bold">Status</label>
                                        <p>
                                            @if ($daftarPoli->status === 'diproses')
                                                <span class="badge bg-success">Diproses</span>
                                            @else
                                                <span class="badge bg-danger">Belum diproses</span>
                                            @endif
                                        </p>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-800 dark:text-neutral-400 font-bold">Keluhan</label>
                                        <p>{{ $daftarPoli->keluhan }}</p>
                                    </div>

                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('daftar-poli.index') }}"
                                            class="py-2 px-4 text-sm font-medium border bg-white text-gray-800 rounded-lg">Kembali</a>
                                    </div>
                                </form>
                            </div>

                            <!-- End Table -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->

        </div>
    </div>
@endsection
