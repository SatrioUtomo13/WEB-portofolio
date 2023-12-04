@extends('partials.header')

<section class="px-4 lg:w-4/5 lg:m-auto">
    <div class="text-gray-700 font-montserrat font-semibold">
        <h1 class="mt-5 text-2xl lg:text-3xl">{{ $project->name }}</h1>
        <span class="lg:text-lg">Category: {{ $project->projectcategory->name }}</span>
        <img src="{{ asset('storage/' . $project->shoot_cover) }}" alt="{{ $project->name }}" class="mt-5 lg:mt-10">
    </div>

    <div class="my-5 flex space-x-3 justify-center lg:fixed lg:top-1/2 lg:right-10 lg:-translate-y-1/2 lg:flex-col lg:space-x-0 lg:space-y-5">
        <div class="w-8 h-8 border-[1.5px] border-gray-200 rounded-full hover:border-gray-300 transition duration-300 md:w-10 md:h-10 lg:w-11 lg:h-11 lg:relative">
            <button type="submit" data-tooltip-target="tooltip-like" class="flex justify-center items-center w-full h-full rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" id="like" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 md:w-6 md:h-6 lg:w-5 lg:h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg>
            </button>
            <div id="tooltip-like" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 rotate-90">
                Like
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>

        <div class="w-8 h-8 border-[1.5px] border-gray-200 rounded-full hover:border-gray-300 transition duration-300 md:w-10 md:h-10 lg:w-11 lg:h-11">
            <button type="submit" data-tooltip-target="tooltip-save" class="flex justify-center items-center w-full h-full rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 md:w-6 md:h-6 lg:w-5 lg:h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                </svg>
            </button>
            <div id="tooltip-save" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Save
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>

        <div class="w-8 h-8 border-[1.5px] border-gray-200 rounded-full hover:border-gray-300 transition duration-300 md:w-10 md:h-10 lg:w-11 lg:h-11">
            {{-- MODAL TOGGLE --}}
            <button type="submit" data-tooltip-target="tooltip-info" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="flex justify-center items-center w-full h-full rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 md:w-6 md:h-6 lg:w-5 lg:h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                </svg>
            </button>

            <!-- Main modal -->
            <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg p-4 shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between  border-b rounded-t dark:border-gray-600">
                            <h3 class="text-2xl font-montserrat font-bold text-gray-900 dark:text-white">
                                Shot detail
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        
                        <!-- Modal body -->
                        <p class="text-base text-gray-500 dark:text-gray-400">Posted {{ $project->created_at->diffForHumans() }}</p>

                        <div class="flex space-x-10 mt-5">
                            <div>
                                <p class="text-base text-gray-500 dark:text-gray-400">Technology</p>
                                <p class="text-2xl text-gray-700 dark:text-gray-600 font-semibold">{{ $project->technology }}</p>
                            </div>

                            <div>
                                <p class="text-base text-gray-500 dark:text-gray-400">Category</p>
                                <p class="text-2xl text-gray-700 dark:text-gray-600 font-semibold">{{ $project->projectcategory->name }}</p>
                            </div>
                        </div>

                        <div class="mt-5">
                            <p class="text-lg text-gray-700 dark:text-gray-600 font-semibold">Description</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $project->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- TOOLTIP --}}
            <div id="tooltip-info" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Details
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
    </div>

    <div class="flex">
        <hr class="w-full h-px bg-gray-200 border-0 dark:bg-gray-700 self-center md:bg-gray-400">
        @foreach ($name as $e)
            <a href="/" class="font-caveat text-primary text-4xl md:text-6xl">{{ $e}}</a>
        @endforeach
        <hr class="w-full h-px bg-gray-200 border-0 dark:bg-gray-700 self-center md:bg-gray-400">
    </div>

    <span class="block mt-5 mb-2 text-lg font-montserrat font-semibold md:text-2xl md:mb-3">More project</span>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-5">
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
        </div>
    </div>

    @include('partials.footer')
</section>
