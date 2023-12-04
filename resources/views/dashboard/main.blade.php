@extends('partials.header')

    {{-- SIDEBAR --}}
    @include('partials.sidebar')

    
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            {{-- CONTENT --}}
            @yield('content')
        </div>
    </div>
    
</body>
</html>