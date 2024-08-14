<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>
            [x-cloak]{
                display: none !important;
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">

        <div class="drawer lg:drawer-open">
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content items-center justify-center" style="background-image: linear-gradient(to right bottom, #0d038f, #003ab0, #0060ca, #0084dc, #00a7e9, #00a7e9, #00a7e9, #00a7e9, #0084dc, #0060ca, #003ab0, #0d038f);">
              <!-- Page content here -->
              {{-- <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label> --}}
                {{$slot}}
            </div> 
            <div class="drawer-side md:bg-slate-100 overflow-visible z-10">
              <label for="my-drawer-2" class="drawer-overlay"></label> 
            
              {{-- @include('layouts.sidebar') --}}
              <livewire:components.sidebar />
            
            </div>
          </div>
  
          @livewire('wire-elements-modal')

    </body>
</html>
