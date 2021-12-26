@props(['name','label','type','data'])
<div  {{ $attributes->merge(['class' => 'mb-3']) }}>
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type??'text' }}" id="{{ $name }}" name="{{ $name }}"
    value="{{ $data->{$name}??'' }}{{ old($name) }}"
    class="form-control @error($name) is-invalid @enderror" >
    <x-invalid-feedback attribute="{{ $name }}" />
</div>
