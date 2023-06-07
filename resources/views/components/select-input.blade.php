@props(['title'])

<div>
    <label for="{{ $name }}">{{ ucfirst($title) }}</label>
    <select id="{{ $name }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-control']) }}>
        <option value="">Select {{ strtolower($title) }}..</option>
        @foreach ($options as $key => $value)
            <option value="{{ $key }}" {{ $selected == $key ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>
</div>
