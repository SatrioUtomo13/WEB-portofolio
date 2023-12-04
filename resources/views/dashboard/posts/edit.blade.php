@extends('dashboard.main')

@section('content')
    <section class="w-1/2">

        <h1 class="font-montserrat font-semibold text-4xl text-gray-800 mb-5">Edit Post</h1>

        <form action="/dashboard/post/{{ $post->id }}" method="post">
            @method('put')
            @csrf
            <div class="mb-6">
                <label for="post_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" id="post_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title ..." required name="title" value="{{ old('title', $post->title) }}">
            </div>
            <div class="mb-6">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an category</label>
                <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="postcategory_id" required value="{{ old('postcategory_id') }}">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('postcategory_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="editor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                <textarea id="editor" name="body">{{ old('body', $post->body) }}</textarea>
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Post</button>
        </form>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection