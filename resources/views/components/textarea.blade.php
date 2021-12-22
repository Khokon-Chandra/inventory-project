@props(['name','label','type','data'])
<div  {{ $attributes->merge(['class' => 'mb-3']) }}>
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea name="{{ $name }}" id="{{ $name }}" rows="5"  class="form-control @error($name) is-invalid @enderror" >{{ $data->{$name}??'' }}</textarea>
    <x-invalid-feedback attribute="{{ $name }}" />
</div>
