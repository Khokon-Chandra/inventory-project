<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-md-3">
            <div class="bg-primary border card shadow p-3">
                <h3 class="text-white">Total Product:</h3>
                <h3 class="text-white">$ {{ $product_counts }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="bg-info border card shadow p-3">
                <h3 class="text-white">Total Product Type:</h3>
                <h3 class="text-white">$ {{ $product_type_counts }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="bg-success border card shadow p-3">
                <h3 class="text-white">Total Category:</h3>
                <h3 class="text-white">$ {{ $category_counts }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="bg-warning border card shadow p-3">
                <h3 class="text-white">Total User:</h3>
                <h3 class="text-white">$ {{ $user_counts }}</h3>
            </div>
        </div>

    </div>
</x-app-layout>
