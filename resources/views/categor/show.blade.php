{{--Show one Post--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $categor->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm leading-5 font-medium text-gray-900">
                                    {{ $categor->name }}
                                </p>
                                <p class="mt-1 text-sm leading-5 text-gray-500">
                                    By : {{ $categor->description }}
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="{{ route('category.edit',$categor->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition ease-in-out duration-150">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
