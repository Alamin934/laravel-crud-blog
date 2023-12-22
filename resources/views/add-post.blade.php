<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Post') }}
        </h2>
    </x-slot>

    {{--Post Form--}}
    <div class="py-12 relative">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session()->has('status'))
                    <div class="bg-red-300 p-4 rounded-lg">{{session('status')}}</div>
                    @endif
                    <form action="{{route('store_post')}}" method="POST">
                        @csrf
                        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Add Post</h2>
                        <div class="relative mb-4">
                            <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                            <input type="text" id="title" name="title"
                                class="@error('title') is-invalid @enderror w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('title')
                            <div class="bg-red-200 p-3 rounded-lg text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="relative mb-4">
                            <label for="description" class="leading-7 text-sm text-gray-600">Description</label>
                            <textarea id="description" name="description" rows="5"
                                class="@error('description') is-invalid @enderror w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-200 h-80 text-base outline-none text-gray-700 py-2 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                            @error('description')
                            <div class="bg-red-200 p-3 rounded-lg text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit"
                            class="rounded-md bg-red-500 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>