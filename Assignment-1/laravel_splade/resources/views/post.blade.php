<x-app-layout>
    <x-slot name="header">
        Post
    </x-slot>
    <x-splade-modal>    
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-post-card :photos="$post->photos">
                        <x-slot name="content"> {{ $post->content }} </x-slot>
                        <x-slot name="name"> {{ $post->user->name }} </x-slot>
                        <x-slot name="created_at"> {{ $post->created_at }} </x-slot>
                    </x-post-card>
                </div>
            </div>
        </div>
    </div>
    </x-splade-modal>


</x-app-layout>
