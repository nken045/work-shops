<x-app-layout>
    <div>
        <div class="rounded overflow-hidden">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ __('My Page') }}</div>
            </div>
            <div class="bg-gray-200 max-w-screen-xl m-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-app-layout>