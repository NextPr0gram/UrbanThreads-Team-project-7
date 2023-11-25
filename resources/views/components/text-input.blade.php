@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border border-2 border-bluish-purple p-2 bg-light-gray text-black h-13 focus:border-blue-500 focus:ring-blue-500']) !!}>