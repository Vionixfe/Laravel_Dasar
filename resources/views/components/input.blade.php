@props(['name', 'label', 'type' => 'text', 'value'=>null])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label"><b>{{ $label }}</b></label>
    <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}">
</div>
