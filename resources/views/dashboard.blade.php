<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-slate-900">
                    <h2 class="text-white text-lg mb-1 font-bold title-font mb-3">All Posts</h2>
                </div>
                <div class="p-6 text-white">
                    {{-- __("You're logged in!") --}}
                    <table class="table-auto w-full border border-slate-400 border-collapse border-spacing-7">
                        <thead>
                            <tr align="left">
                                <th class="border border-slate-300 p-4">Id</th>
                                <th class="border border-slate-300 p-4">User Name</th>
                                <th class="border border-slate-300 p-4">Title</th>
                                <th class="border border-slate-300 p-4">Description</th>
                                <th class="border border-slate-300 p-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td class="border border-slate-300 p-4">{{ $post->id}}</td>
                                <td class="border border-slate-300 p-4">{{ $post->user->name}}</td>
                                <td class="border border-slate-300 p-4">{{ $post->title}}</td>
                                <td class="border border-slate-300 p-4">{{ $post->description}}</td>
                                <td class="border border-slate-300 p-4 w-80 text-center">
                                    <a href="{{route('single_post', $post->id)}}"
                                        class="text-white bg-indigo-500 border-0 py-2.5 px-6 focus:outline-none hover:bg-indigo-600 rounded">View</a>
                                    <a href=""
                                        class="text-white bg-amber-400 border-0 py-2.5 px-6 focus:outline-none hover:bg-indigo-600 rounded">Edit</a>
                                    <a href=""
                                        class="text-white bg-red-600 border-0 py-2.5 px-6 focus:outline-none hover:bg-indigo-600 rounded">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>