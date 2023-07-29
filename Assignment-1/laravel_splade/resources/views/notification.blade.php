<x-app-layout>
    <x-slot name="header">
        Notifications
    </x-slot>
    @foreach (json_decode($notifications, true) as $notification)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-gray-200">
                        {{ $notification['data']['message'] }}
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                            <Link modal href="{{ route('dashboard.show', $notification['data']['post_id']) }}">
                            View
                            </Link>
                        </button>
                    </div>
                    <div class="pl-6 pt-4 pb-4 bg-white">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
