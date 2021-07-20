<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Workshop Detail') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

    @include ('components.workshop-detail', ['workshop' => $workshop])

        @if (Auth::id() === $workshop->host_user_id)
            @if ($workshop->status === config('const.workshop.status.published'))
                <p>参加予定のメンバー</p>
                @foreach ($participationUsers as $user)
                    <div class="bg-white p-6 shadow-lg rounded-lg flex justify-between items-center">
                        <div class="flex">
                            <div>
                                <span class="text-xl font-medium">{{ $user->name }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="inline-flex m-auto">
            {{ Form::open(['url' => route('workshop.edit'), 'method' => 'GET']) }}
                <!-- 更新 -->
                <button name="id" value="{{ $workshop->id }}" type="submit" class="bg-white hover:bg-gray-300 text-gray-700 font-bold py-3 px-7 rounded btn-in-shadow">編集する</button>
            {{ Form::close() }}
            {{ Form::open(['url' => route('workshop.destroy')]) }}
                <!-- 削除 -->
                <button name="id" value="{{ $workshop->id }}" type="submit" onclick="return confirmDialog('ワークショップの削除')" class="bg-gray-500 hover:bg-red-500 hover:text-white text-gray-700 font-bold py-3 px-7 rounded btn-in-shadow">このワークショップを削除する</button>
            {{ Form::close() }}
            </div>
        @elseif (!$alreadyApplied)
            {{ Form::open(['url' => route('workshop.join.confirm')]) }}
                <!-- 参加申し込み確認画面に遷移 -->
                <button name="id" value="{{ $workshop->id }}" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">参加申し込み</button>
            {{ Form::close() }}
        @endif
    </div>
</x-app-layout>
