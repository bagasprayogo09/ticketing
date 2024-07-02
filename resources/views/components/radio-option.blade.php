@props(['name', 'value'])

<label class="radio-vertical">
    <input type="radio" name="{{ $name }}" value="{{ $value }}" {{ $attributes }}>
    <span>{{ $slot }}</span>
</label>
