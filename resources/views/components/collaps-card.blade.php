<div class="card mb-0">
    <div id="accordion">
        <a class="card-header border mb-0 d-block d-flex justify-content-between align-items-center collapsed"
           data-toggle="collapse" data-target="#{{$collapsId}}" aria-expanded="false" aria-controls="{{$collapsId}}">
            <span>{{ $collapsHeader }}</span>
            <span class="fa fa-angle-down"></span>
        </a>
        <div id="{{ $collapsId }}" {{ $attributes->merge(['class'=>'collapse px-3']) }}  aria-labelledby="headingTwo" data-parent="#accordion">
            {{ $slot }}
        </div>
    </div>
</div>
