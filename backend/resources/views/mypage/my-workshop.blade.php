<x-mypage>
    <div>
        <div class="rounded overflow-hidden">
            <div class="m-0">
                <ul class="flex flex-wrap text120 text-center bg-gray-100">
                    <li class="w-1/3"><a class="block my-3 p-1" href="{{ route('profile.show') }}">{{ __('Profile') }}</a></li>
                    <li class="w-1/3  bg-gray-200"><a class="block my-3 p-1" href="#">開催ワークショップ</a></li>
                    <li class="w-1/3"><a class="block my-3 p-1" href="{{ route('mypage.joined-workshop') }}">参加ワークショップ</a></li>
                </ul>
            </div>
            <div class="px-6 pt-4 pb-2">
                {{ Form::open(['url' => route('workshop.create'), 'method' => 'GET']) }}
                    <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded">新規登録</button>
                {{ Form::close() }}
                {{ Form::open(['url' => route('mypage.my-workshop'), 'method' => 'GET', 'class' => 'table m-auto']) }}
                    @if ( $status === config('const.workshop.status.published') )
                        <button type="submit" name="status" value={{ config('const.workshop.status.unpublished') }} class="bg-white hover:bg-gray-300 text-gray-400 font-bold py-3 px-7 rounded btn-in-shadow">未公開</button>
                        <button type="submit" name="status" value={{ config('const.workshop.status.published') }} class="bg-white hover:bg-gray-300 text-gray-700 font-bold py-3 px-7 rounded btn-in-shadow">公開</button>
                        <button type="submit" name="status" value={{ config('const.workshop.status.done') }} class="bg-white hover:bg-gray-300 text-gray-400 font-bold py-3 px-7 rounded btn-in-shadow">開催済</button>
                    @elseif ( $status === config('const.workshop.status.unpublished') )
                        <button type="submit" name="status" value={{ config('const.workshop.status.unpublished') }} class="bg-white hover:bg-gray-300 text-gray-700 font-bold py-3 px-7 rounded btn-in-shadow">未公開</button>
                        <button type="submit" name="status" value={{ config('const.workshop.status.published') }} class="bg-white hover:bg-gray-300 text-gray-400 font-bold py-3 px-7 rounded btn-in-shadow">公開</button>
                        <button type="submit" name="status" value={{ config('const.workshop.status.done') }} class="bg-white hover:bg-gray-300 text-gray-400 font-bold py-3 px-7 rounded btn-in-shadow">開催済</button>
                    @else
                        <button type="submit" name="status" value={{ config('const.workshop.status.unpublished') }} class="bg-white hover:bg-gray-300 text-gray-400 font-bold py-3 px-7 rounded btn-in-shadow">未公開</button>
                        <button type="submit" name="status" value={{ config('const.workshop.status.published') }} class="bg-white hover:bg-gray-300 text-gray-400 font-bold py-3 px-7 rounded btn-in-shadow">公開</button>
                        <button type="submit" name="status" value={{ config('const.workshop.status.done') }} class="bg-white hover:bg-gray-300 text-gray-700 font-bold py-3 px-7 rounded btn-in-shadow">開催済</button>
                    @endif
                {{ Form::close() }}

                @include ('components.workshop-list', ['workshops' => $workshops, 'view' => 'workshop.detail'])

            </div>
        </div>
    </div>
</x-mypage>