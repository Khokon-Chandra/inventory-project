
<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>


            <x-nav-link :icon="__('sliders')" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>


            <!-- Dropdown link -->

            <x-dropdown :trigger="__('Inventory')" :active="__('inventory.products.product_types.categories')" :id="__('inventory')" :icon="__('aperture')">
                <x-slot name="content">
                    <x-dropdown-link :href="route('inventory.product_types.index')" :active="request()->routeIs('inventory.product_types.index')">{{ __('Prodouct Type List') }}</x-dropdown-link>

                    <x-dropdown-link :href="route('inventory.categories.index')" :active="request()->routeIs('inventory.categories.index')">{{ __('Category List') }}</x-dropdown-link>

                    <x-dropdown-link :href="route('inventory.products.index')" :active="request()->routeIs('inventory.products.index')">{{ __('Product List') }}</x-dropdown-link>

                </x-slot>
            </x-dropdown>

            <x-dropdown :trigger="__('Agents')" :active="__('agents')" :id="__('agents')" :icon="__('aperture')">
                <x-slot name="content">
                    <x-dropdown-link :href="route('agents.index')" :active="request()->routeIs('agents.index')">{{ __('Agent List') }}</x-dropdown-link>
                    <x-dropdown-link :href="route('agents.create')" :active="request()->routeIs('agents.create')">{{ __('Add New Agent') }}</x-dropdown-link>

                </x-slot>
            </x-dropdown>



            <li class="sidebar-header">
                Tools & Components
            </li>
        </ul>
    </div>
</nav>
