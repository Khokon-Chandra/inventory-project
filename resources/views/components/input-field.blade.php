@props(['name','label','type'])
<div  {{ $attributes->merge(['class' => 'mb-3']) }}>
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type??'text' }}" id="{{ $name }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" >
    <x-invalid-feedback attribute="{{ $name }}" />
</div>
