@props(['value'])

<label {{ $attributes->merge(['class' => 'form class']) }}>
    {{ $value ?? $slot }}
</label>
