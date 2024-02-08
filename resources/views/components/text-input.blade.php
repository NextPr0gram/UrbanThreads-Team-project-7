@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border border-1 border-neutral-60 p-2 bg-transparent text-black h-11 focus:border-primary-300 focus:ring-primary-300 rounded-sm']) !!}>
