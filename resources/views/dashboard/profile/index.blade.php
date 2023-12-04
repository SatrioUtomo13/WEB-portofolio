@extends('dashboard.main')

@section('content')
    <section class="space-y-5">
        <h1 class="font-montserrat font-semibold text-4xl text-gray-800">My Profile</h1>

        {{-- SUCCESS --}}
        @if (session()->has('success'))
            <div id="alert-3" class="w-1/2 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">{{ session('success') }}</div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                </button>
            </div>
        @endif

        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pb-10">
                @foreach ($users as $user)
                    <img class=" mt-3 w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name }}"/>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $user->name }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $user->profession }}</span>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</span>

                    <a href="/dashboard/user/{{ $user->id }}/edit" class="w-1/2 mt-3 px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>
                @endforeach
            </div>
        </div>

    </section>
@endsection