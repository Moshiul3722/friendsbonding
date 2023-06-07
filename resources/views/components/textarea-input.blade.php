
@props([
    'disabled' => false,
    // 'type'     => 'text',
    'value'    => '',
    'name',
    'placeholder'=>'',
    'rows', 'cols'
])






<textarea {!! $attributes->merge(['class' => 'form-control']) !!} name="{{ $name }}" rows="{{ $rows }}" cols="{{ $cols }}"></textarea>
