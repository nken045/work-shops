<x-mypage>
    <div>
        <div class="rounded overflow-hidden">
            <div class="m-0">
                <ul class="flex flex-wrap text120 text-center bg-gray-100">
                    <li class="w-1/3"><a class="block my-3 p-1" href="{{ route('profile.show') }}">{{ __('Profile') }}</a></li>
                    <li class="w-1/3"><a class="block my-3 p-1" href="{{ route('mypage.my-workshop') }}">開催ワークショップ</a></li>
                    <li class="w-1/3 bg-gray-200"><a class="block my-3 p-1" href="#">参加ワークショップ</a></li>
                </ul>
            </div>
            <div class="px-6 pt-4 pb-2">
                {{ Form::open(['url' => route('mypage.joined-workshop'), 'method' => 'GET', 'class' => 'table m-auto']) }}
                    @if ( $status === config('const.workshop.status.published') )
                        <button type="submit" name="status" value={{ config('const.workshop.status.published') }} class="bg-white hover:bg-gray-300 text-gray-700 font-bold py-3 px-7 rounded btn-in-shadow">参加予定</button>
                        <button type="submit" name="status" value={{ config('const.workshop.status.done') }} class="bg-white hover:bg-gray-300 text-gray-400 font-bold py-3 px-7 rounded btn-in-shadow">参加済</button>
                    @else
                        <button type="submit" name="status" value={{ config('const.workshop.status.published') }} class="bg-white hover:bg-gray-300 text-gray-400 font-bold py-3 px-7 rounded btn-in-shadow">参加予定</button>
                        <button type="submit" name="status" value={{ config('const.workshop.status.done') }} class="bg-white hover:bg-gray-300 text-gray-700 font-bold py-3 px-7 rounded btn-in-shadow">参加済</button>
                    @endif
                {{ Form::close() }}

                @include ('components.workshop-list', ['workshops' => $workshops, 'view' => 'workshop.detail'])

            </div>
        </div>
    </div>
</x-mypage>