<x-app-layout>
    {{-- <x-slot name="header">
     
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-form :for="$form" />
                </div>
            </div>
        </div>
    </div>

    @foreach ($posts as $post)    
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-post-card>
                        <x-slot name="content"> {{ $post->content }} </x-slot>
                        <x-slot name="name"> {{ $post->user->name }} </x-slot>
                        <x-slot name="created_at"> {{ $post->created_at }} </x-slot>
                    </x-post-card>
                </div>
            </div>
        </div>
    </div>
    @endforeach


</x-app-layout>
