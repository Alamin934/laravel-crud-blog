<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- __("You're logged in!") --}}
                    <table class="table-auto w-full border border-slate-400 border-collapse border-spacing-7">
                        <thead>
                            <tr align="left">
                                <th class="border border-slate-300 p-4">Id</th>
                                <th class="border border-slate-300 p-4">Title</th>
                                <th class="border border-slate-300 p-4">Description</th>
                                <th class="border border-slate-300 p-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-slate-300 p-4">{{ $post->id}}</td>
                                <td class="border border-slate-300 p-4">{{ $post->title}}</td>
                                <td class="border border-slate-300 p-4">{{ $post->description}}</td>
                                <td class="border border-slate-300 p-4 w-80 text-center">
                                    <a href="{{route('dashboard')}}"
                                        class="text-white bg-indigo-500 border-0 py-2.5 px-6 focus:outline-none hover:bg-indigo-600 rounded">All
                                        Post</a>
                                    <a href="{{route('edit', $post->id)}}"
                                        class="text-white bg-amber-400 border-0 py-2.5 px-6 focus:outline-none hover:bg-indigo-600 rounded">Edit</a>
                                    <a href="{{route('delete', $post->id)}}"
                                        class="text-white bg-red-600 border-0 py-2.5 px-6 focus:outline-none hover:bg-indigo-600 rounded">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>