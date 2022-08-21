<x-app-layout>
    {{--    Edit post--}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <form action="{{ route('category.update',$categor->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <p class="text-sm leading-5 font-medium text-gray-900">
                                    <input type="text" name="name" value="{{ $categor->name }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                </p>
                                <p class="mt-1 text-sm leading-5 text-gray-500">
                                    <input type="text" name="description" value="{{ $categor->description }}"
                                           class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                </p>
                        </div>
                        <div class="flex-shrink-0">
                            <button type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
