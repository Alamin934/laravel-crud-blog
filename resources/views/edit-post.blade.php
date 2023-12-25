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
                    <form action="{{route('update', $epost->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Add Post</h2>
                        <div class="relative mb-4">
                            <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                            <input type="text" id="title" name="title"
                                class="@error('title') is-invalid @enderror w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 mb-1 leading-8 transition-colors duration-200 ease-in-out"
                                value="{{$epost->title}}">
                            @error('title')
                            <div class="bg-red-200 p-3 rounded-lg text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="relative mb-4">
                            <label for="description" class="leading-7 text-sm text-gray-600">Description</label>
                            <textarea id="description" name="description"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-2 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out @error('description') is-invalid @enderror">{{ $epost->title}}</textarea>
                            @error('description')
                            <div class="bg-red-200 p-3 rounded-lg text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit"
                            class="rounded-md bg-indigo-500 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>

                        @if (session()->has('status'))
                        <div class="p-3 mt-3 rounded-lg text-emerald-300 bg-green-200">{{session('status')}}</div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>