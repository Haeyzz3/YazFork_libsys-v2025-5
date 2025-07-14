<!-- resources/views/components/form-select-input.blade.php -->

@props([
    'options' => [],
    'wireModel' => null,
])

<select wire:model.change="{{ $wireModel }}">
    <option value="" selected disabled>Default</option>
    @foreach($options as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>
