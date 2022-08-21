<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Show Category
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{--New Post--}}
            <a href="{{ route('category.create') }}" class="text-sm bg-blue-800 font-medium text-white hover:text-white py-2 px-4 rounded-md">
                New Post
            </a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>

                        {{--Show all Posts--}}
                        @forelse($categories as $categorie)
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                                    <div class="flex items-center justify-between">
                                        <div class="flex-1">
                                            <p class="text-sm leading-5 font-medium text-gray-900">
                                                {{ $categorie->name }}
                                            </p>
                                            <p class="mt-1 text-sm leading-5 text-gray-500">
                                                {{ $categorie->description }}
                                            </p>
                                        </div>
                                        <div class="flex justify-between ">
                                            <a href="{{ route('category.show', $categorie->slug) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition ease-in-out duration-150">
                                                {{ __('View') }}
                                            </a>
                                            <form method="post" action="{{ route('category.destroy', $categorie->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=" ml-3 inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition ease-in-out duration-150">
                                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No posts found</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
