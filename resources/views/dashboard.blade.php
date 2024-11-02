<!-- resources/views/dashboard.blade.php -->
@extends('layouts.main-layout')
<!-- keknya ini ga dipake -->
@section('content')
    <h1 class="text-3xl font-bold mb-6">Selamat Datang di Dashboard Posyandu Payungi Negeri</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Data Anak -->
        <a href="{{ route('data-anak.index') }}"
            class="bg-white p-4 rounded shadow-lg flex items-center justify-between hover:bg-gray-100">
            <div class="flex items-center">
                <!-- Ikon SVG untuk Data Anak -->
                <svg class="w-8 h-8 text-blue-500 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8a3 3 0 100-6 3 3 0 000 6zM12 10a4.978 4.978 0 00-3.5 1.207A6.972 6.972 0 006 16v2a1 1 0 001 1h2a1 1 0 001-1v-1a1 1 0 012 0v1a1 1 0 001 1h2a1 1 0 001-1v-2a6.972 6.972 0 00-2.5-4.793A4.978 4.978 0 0012 10z">
                    </path>
                </svg>
                <span class="text-xl font-semibold">Data Anak</span>
            </div>
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>

        <!-- Data Ibu Hamil -->
        <a href="{{ route('data-ibu-hamil.index') }}"
            class="bg-white p-4 rounded shadow-lg flex items-center justify-between hover:bg-gray-100">
            <div class="flex items-center">
                <!-- Ikon SVG untuk Data Ibu Hamil -->
                <svg class="w-8 h-8 text-pink-500 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 2a6 6 0 00-6 6v2a6 6 0 00-4 5.29V17a1 1 0 001 1h2a1 1 0 001-1v-1a1 1 0 012 0v1a1 1 0 001 1h2a1 1 0 001-1v-1a1 1 0 012 0v1a1 1 0 001 1h2a1 1 0 001-1v-1.71A6 6 0 0012 10V8a6 6 0 00-6-6z">
                    </path>
                </svg>
                <span class="text-xl font-semibold">Data Ibu Hamil</span>
            </div>
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>

        <!-- Data PUS -->
        <a href="{{ route('data-push.index') }}"
            class="bg-white p-4 rounded shadow-lg flex items-center justify-between hover:bg-gray-100">
            <div class="flex items-center">
                <!-- Ikon SVG untuk Data PUS -->
                <svg class="w-8 h-8 text-green-500 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 2a1 1 0 011 1v2a1 1 0 001 1h3a1 1 0 011 1v1a1 1 0 001 1h1a1 1 0 011 1v2a1 1 0 011 1v3a1 1 0 011 1v1a1 1 0 01-1 1h-1a1 1 0 01-1 1h-1a1 1 0 01-1-1h-1a1 1 0 01-1-1v-1a1 1 0 01-1-1v-2a1 1 0 01-1-1v-1a1 1 0 01-1-1v-3a1 1 0 01-1-1v-1a1 1 0 01-1-1h-1a1 1 0 01-1-1v-2a1 1 0 011-1h3a1 1 0 001-1V3a1 1 0 011-1z">
                    </path>
                </svg>
                <span class="text-xl font-semibold">Data PUS</span>
            </div>
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>

        <!-- Data Lansia -->
        <a href="{{ route('data-lansia.index') }}"
            class="bg-white p-4 rounded shadow-lg flex items-center justify-between hover:bg-gray-100">
            <div class="flex items-center">
                <!-- Ikon SVG untuk Data Lansia -->
                <svg class="w-8 h-8 text-gray-600 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 2a1 1 0 011 1v2a1 1 0 001 1h3a1 1 0 011 1v1a1 1 0 001 1h1a1 1 0 011 1v2a1 1 0 011 1v1a1 1 0 011 1v1a1 1 0 01-1 1h-1a1 1 0 01-1 1h-1a1 1 0 01-1-1h-1a1 1 0 01-1-1v-1a1 1 0 01-1-1v-1a1 1 0 01-1-1h-1a1 1 0 01-1-1v-3a1 1 0 01-1-1v-1a1 1 0 01-1-1h-1a1 1 0 01-1-1v-2a1 1 0 011-1h3a1 1 0 001-1V3a1 1 0 011-1z">
                    </path>
                </svg>
                <span class="text-xl font-semibold">Data Lansia</span>
            </div>
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
         <!-- Rekapan Pemeriksaan -->
         <a href="{{ route('rekapan-pemeriksaan.index') }}"
         class="bg-white p-4 rounded shadow-lg flex items-center justify-between hover:bg-gray-100">
         <div class="flex items-center">
             <svg class="w-8 h-8 text-yellow-500 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M12 2a9.97 9.97 0 00-7.16 3.27A9.97 9.97 0 002 12a9.97 9.97 0 002.84 6.73A9.97 9.97 0 0012 22a9.97 9.97 0 007.16-3.27A9.97 9.97 0 0022 12a9.97 9.97 0 00-2.84-6.73A9.97 9.97 0 0012 2z">
                 </path>
             </svg>
             <span class="text-xl font-semibold">Data Rekapan Posyandu</span>
         </div>
         <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
         </svg>
     </a>
    </div>
@endsection
