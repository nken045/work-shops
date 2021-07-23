<x-app-layout>
    <!-- メインコンテンツ -->
    <div class="sm:px-6 lg:px-8 bg-white">
      <section class="bg-gray-100 p-12 search-pannel">
        {{ Form::open(['url' => route('search.list'), 'method' => 'GET']) }}
          <!-- <p>キーワードから探す</p>
          <input type="text"> -->
          <div class="my-4 grid">
            <p>開催地から探す</p>
            {{ Form::select('venue_id', App\Consts\AreaConsts::PREFECTURE_LIST, session('venue_id'), ['class' => 'mt-1 block w-full']) }}
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">search</button>
          </div>
        {{ Form::close() }}
        </form>
        <div class="my-4">
          <p>カテゴリから探す</p>
          @foreach (App\Consts\Category::CATEGORY_LIST_LOGICAL as $key => $category)
          
          <a href="{{ route('search.list') . '?category=' . $key }}">
          <div class="category inline-block">
            <div class="category-in {{ $category }}"></div>
            <span>{{ App\Consts\Category::CATEGORY_TO_PHYSICS[$category] }}</span>
          </div>
          </a>
          
          @endforeach 
        </div>
      
      </section>
      <section class="my-48 p-12 m-auto max-w-5xl">
        <h2>新着ワークショップ</h2>
        <div class="m-0">
        {{ Form::open(['url' => route('detail'), 'method' => 'GET']) }}
          @foreach ($workshopList as $workshop)
            @include ('components.workshop-card', ['workshop' => $workshop])
          @endforeach
        {{ Form::close() }}
        </div>
      </section>

      <section id="ws-link" class="my-48 orver-width fluid-box-wrap bg-gray-100">
      <div class="fluid-box">
      {{ Form::open(['url' => route('workshop.create'), 'method' => 'GET', 'class' => 'table m-auto']) }}
          <button type="submit" class="bg-green-600 hover:bg-yellow-400 text-white text-xl font-bold w-96 py-4 px-16 rounded-md m-auto my-14">ワークショップを開催する</button>
      {{ Form::close() }}
      </div>
      <section>

    </div>
    <!-- メインコンテンツ -->   
</x-app-layout>