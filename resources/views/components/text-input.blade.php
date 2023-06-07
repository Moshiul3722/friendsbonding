@props([
    'disabled' => false,
    'type'     => 'text',
    'value'    => '',
    'name',
    'placeholder'=>'',
])

{{-- <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}> --}}


<input type="{{ $type }}" name="{{ $name }}" {{ $value }} placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control']) !!}>
