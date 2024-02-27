{{-- Define a Blade component that accepts two props: 'href' and 'title'. --}}
@props(['href', 'title'])

{{-- Store the current route or channel in a variable. --}}
@php
    $currentRoute = \Request::route()->getName();
@endphp

{{-- Render an anchor element with a class that depends on whether the current route matches the 'href' prop. --}}
<a href="{{ route($href) }}"
    class="my-[5px] h-10 group flex items-center duration-150 ease-in-out rounded-sm active:bg-secondary-50 @if (Str::startsWith($currentRoute, $href)) bg-secondary-50 text-secondary-500 @else hover:bg-secondary-100 hover:text-secondary-500  text-neutral-30 hover:text-neutral-50  bg-white @endif">

    {{-- Render a div element with an aspect-ratio of 1:1. --}}
    <div class="aspect-square pl-4 pr-2 rounded-sm flex items-center justify-cente ">

        {{-- Render an image element that is visible when the current route does not match the 'href' prop. --}}
        <img class="@if (Str::startsWith($currentRoute, $href)) hidden @endif group-active:hidden"
            src="{{ asset('icons/admin-dashboard/bar-chart-icon-white.svg') }}" alt="">

        {{-- Render an image element that is visible when the current route matches the 'href' prop. --}}
        <img class="@if (Str::startsWith($currentRoute, $href)) @else hidden @endif group-active:block"
            src="{{ asset('icons/admin-dashboard/bar-chart-icon.svg') }}" alt="">
    </div>

    {{-- Render a div element with the 'title' prop as its content. --}}
    <div class="">
        {{ $title }}</div>

</a>
