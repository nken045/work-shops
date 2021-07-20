<div class="ws-card-lg bg-white p-6 shadow-lg rounded-sm flex justify-between items-center">
  <div class="md:flex">
      <div class="md:flex-shrink-0">
          <img class="h-48 w-full object-cover md:w-48" src="{{ asset('images/image_sample.png') }}" alt="">
      </div>
      <div class="p-8">
          <p class="block mt-1 text-lg leading-tight font-medium text-black text-ellipsis">{{ $workshop->title }}</p>
          <p class="uppercase tracking-wide text-sm text-gray-400 font-semibold">{{ App\Consts\AreaConsts::PREFECTURE_LIST[$workshop->venue_id] }}</p>
          <span class="mt-2 text-ellipsis">参加日：{{ $workshop->event_date_time->format('Y/m/d') }}</span>
          <span class="mt-2 text-ellipsis">参加者名：{{ $name }}</span>
      </div>
  </div>
</div>