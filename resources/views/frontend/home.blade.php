<x-frontend-layout>

    {{-- Home Section --}}
    <section class="py-10">
        <div class="container">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-8">
                    <img class="h-[500px] w-full object-cover" src="{{ asset($latest_news->image) }}" alt="Latest News">
                    <h1 class="text-xl font-bold pt-2">{{ $latest_news->title }}</h1>
                </div>

                <div class="col-span-4 space-y-4">
                    <div class="bg-[#d507071a] py-4 border-l-8 border-[#d50707]">
                        <h3 class="primary text-xl pl-4 font-semibold">ट्रेन्डिङ</h3>
                    </div>

                    @foreach ($trending_news as $news)
                        <x-news-card :news="$news" />
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{-- Home Section --}}


    {{-- News By Category --}}
    <section class="py-10">
        <div class="container space-y-10">
            @foreach ($categories as $category)
                @if (count($category->posts) > 0)
                    <div>
                        <h1 class="text-xl font-bold">{{ $category->nep_title }}</h1>
                        <div class="grid grid-cols-4 gap-4 pt-2">
                            @foreach ($category->posts as $news)
                                <x-news-card :news="$news" />
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    {{-- News By Category --}}

</x-frontend-layout>
