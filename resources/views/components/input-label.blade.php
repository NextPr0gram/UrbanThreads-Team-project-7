@props(['value'])

<label {{ $attributes->merge(['class' => ' text-neutral-900 text-base ']) }}>
    {{ $value ?? $slot }}
</label>
