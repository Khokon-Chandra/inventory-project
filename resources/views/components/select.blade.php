@props(['name','label','data','valueType','editableData'])

<div {{ $attributes->merge(["class"=>"mb-3"]) }}>
    <label for="{{ $name }}">{{ $label }}</label>
    <select id="{{ $name }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" >
        <option value="">Select an item</option>
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
