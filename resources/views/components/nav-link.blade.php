@props(['active','icon'])

<li class="sidebar-item {{ $active ? 'active':'' }}">
    <a {{ $attributes->merge(['class' => 'sidebar-link']) }} >

        <i class="align-middle" data-feather="{{ $icon??'' }}"></i>

        <span class="align-middle">
            {{ $slot }}
        </span>

    </a>
</li>
