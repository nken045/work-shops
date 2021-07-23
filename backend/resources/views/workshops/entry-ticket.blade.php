<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Entry Ticket') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @include ('components.entry-ticket', ['workshop' => $workshop, 'name' => $name])
    </div>
</x-app-layout>