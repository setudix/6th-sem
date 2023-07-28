<x-app-layout>
    <x-slot name="header">
        Notifications
    </x-slot>
    @foreach (json_decode($notifications, true) as $notification)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ $notification['data']['message'] }}
                    </div>
                    <Link modal href="{{ route('dashboard.show', $notification['data']['post_id'] ) }}">
                    View
                    </Link>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
