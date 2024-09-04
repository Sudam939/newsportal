<x-frontend-layout>
    <section class="py-10">
        <div class="container">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-8 space-y-6">
                    @foreach ($posts as $post)
                        <div class="grid grid-cols-12 gap-4 items-center">
                            <div class="col-span-4">
                                <img src="{{ asset($post->image) }}" class="w-full h-[200px] object-cover"
                                    alt="{{ $post->title }}">
                            </div>
                            <div class="col-span-8">
                                <div>
                                    <h1>{{ $post->title }}</h1>
                                    <small>{{ nepalidate($post->created_at) }}</small>
                                </div>
                                <a href="{{route('news',$post->id)}}" class="primary">पुरा पढ्नुहोस्</a>
                            </div>
                        </div>
                    @endforeach

                    <div>
                        {{ $posts->links() }}
                    </div>
                </div>



                <div class="col-span-4">
                    @foreach ($advertises as $ad)
                        <div>
                            <a href="{{ $ad->link }}" target="_blank">
                                <img src="{{ asset($ad->image) }}" class="w-full h-[200px] object-cover"
                                    alt="{{ $ad->title }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>
