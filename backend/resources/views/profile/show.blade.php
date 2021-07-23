<x-mypage>
    <div>
        <div class="m-0">
                <ul class="flex flex-wrap text120 text-center bg-gray-100">
                    <li class="w-1/3 bg-gray-200"><a class="block my-3 p-1" href="{{ route('profile.show') }}">{{ __('Profile') }}</a></li>
                    <li class="w-1/3"><a class="block my-3 p-1" href="{{ route('mypage.my-workshop') }}">開催ワークショップ</a></li>
                    <li class="w-1/3"><a class="block my-3 p-1" href="#">参加ワークショップ</a></li>
                </ul>
            </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            {{-- @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif --}}

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-mypage>
