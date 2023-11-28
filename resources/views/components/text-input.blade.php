@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border border-3 border-bluish-purple p-2 bg-transparent text-black h-13 focus:border-blue-500 focus:ring-blue-500']) !!}>
