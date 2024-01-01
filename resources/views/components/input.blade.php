@props(['name', 'placeholder', 'type' => 'text'])
<input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" placeholder="{{ $placeholder }}"
    wire:model="{{ $name }}">
