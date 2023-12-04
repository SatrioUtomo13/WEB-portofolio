@extends('partials.header')

<section>
    <div class="w-full h-1/3 bg-red-500 relative lg:h-3/4">
        <img src="https://source.unsplash.com/1800x600/?{{ $post->postcategory->name }}" alt="{{ $post->name }}" class="h-full max-w-full">
        <h1 class="hidden lg:block absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white text-6xl font-semibold">{{ $post->title }}</h1>
        <div class="w-full h-16 hidden absolute bottom-0 backdrop-blur-xl bg-black/20 md:block">
            <div class="h-full px-5 flex items-center text-white justify-between">
                <div class="flex flex-col ">
                    @foreach ($name as $e)
                        <span class="">By {{ $e }}</span>
                        <span class="text-sm">Created at: {{ $post->created_at->diffForHumans() }}</span>
                    @endforeach
                </div>
                <div class="flex items-center">
                    <a href="#">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                                <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                            </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <hr class="rotate-90 w-4">
                    <a href="#">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                        </svg>
                        <span class="sr-only">GitHub account</span>
                    </a>
                    <hr class="rotate-90 w-4">
                    <a href="#">
                        <svg role="img" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                        <span class="sr-only">Instagram</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <article class="px-2 py-5 text-gray-500 font-serif md:px-5 lg:px-10">
        <div class="flex mb-5 md:hidden">
            <div class="flex flex-col">
                @foreach ($name as $e)
                    <span class="font-semibold text-lg">By {{ $e }}</span>
                    <span class="text-sm">Created at: {{ $post->created_at->diffForHumans() }}</span>
                @endforeach
            </div>
        </div>
        <h1 class="font-semibold text-lg md:mb-5 md:text-2xl">{{ $post->title }}</h1>
        <p class="md:text-lg"> {!! $post->body !!}</p>
    </article>

    <section class="container p-6 mx-auto space-y-8 md:p-0 lg:px-10">
        <h2 class="font-bebas text-xl text-gray-800 md:text-2xl" id="blogSection">Related Articles</h2>

        <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
            <article class="flex flex-col dark:bg-gray-900">
                @foreach ($relatedPost as $relatePost)
                    <a href="/detailPost/{{ $post->id }}?category={{ $post->postcategory->name }}">
                        <img alt="{{ $post->postcategory->name }}" class="object-cover w-full h-52 dark:bg-gray-500" src="https://source.unsplash.com/200x200/?{{ $post->postcategory->name }}">
                    </a>
                    <div class="flex flex-col flex-1 p-6">
                        <p class="text-xs tracki uppercase dark:text-violet-400">{{ $post->postcategory->name }}</p>
                        <a href="/detailPost/{{ $post->id }}?category={{ $post->postcategory->name }}">
                            <h3 class="flex-1 py-2 text-lg font-semibold">{{ $post->title }}</h3>
                        </a>
                        <div class="flex flex-wrap justify-between pt-3 space-x-2 text-xs dark:text-gray-400">
                            <span>Created at : {{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @endforeach
            </article>
        </div>
    </section>
    @include('partials.footer')
</section>