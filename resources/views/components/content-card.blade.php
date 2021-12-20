@props(['title','subTitle'])
<div {{ $attributes->merge(['class'=>'card']) }}>
   @if(isset($title))
   <div class="card-header">
        <h5 class="card-title">{{ $title }}</h5>
        <h6 class="card-subtitle text-muted"> {{ $subTitle }} </h6>
    </div>
    @endif
    {{ $slot }}
</div> 