@props(['name','label','data','valueType','editableData','optionLabel'])
<div {{ $attributes->merge(["class"=>""]) }}>
   @isset($label)
   <label for="{{ $name }}">{{ $label }}</label>
   @endisset
    <select id="{{ $name }}" name="{{ $name }}" class="selectpicker select-control @error($name) is-invalid @enderror" data-live-search="true" data-width="fit" >
        <option value="">{{ $optionLabel??'Select an item' }}</option>
        @foreach ($data as $item)
            <option
            {{ request($name)? 'selected':'' }}
            @isset($editableData)
            {{ $editableData->{$name} === $item->{$valueType}? 'selected' :'' }}
            @endisset
             value="{{ $item->{$valueType} }}">{{ $item->name }}</option>
        @endforeach
    </select>
    <x-invalid-feedback attribute="{{ $name }}" />
</div>


