{{-- <div class="radio-component">
    @foreach ($options as $value => $label)
        <div class="radio">
            <input type="radio"
                   name="{{ $name }}"
                   id="{{ $name . '-' . $value }}"
                   value="{{ $value }}"
                   {{ $selected == $value ? 'checked' : '' }}>
            <label for="{{ $name . '-' . $value }}">{{ $label }}</label>
        </div>
    @endforeach
</div> --}}


<div class="radio-component">
    @foreach ($options as $value => $label)
        <div class="radio">
            <label class="radio-container">
                <input  type="radio"
                        name="{{ $name }}"
                        id="{{ $name . '-' . $value }}"
                        value="{{ $value }}"
                        {{ $selected == $value ? 'checked' : '' }}>
                <span class="checkmark"></span>{{ $label }}
            </label>
        </div>
    @endforeach
</div>
