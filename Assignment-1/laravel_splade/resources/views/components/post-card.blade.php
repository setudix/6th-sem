<div class="border border-gray-400 rounded-lg max-w-sm w-full lg:max-w-full lg:flex">
    <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
            <p class="text-gray-700 text-base"> {{ $content }} </p>
        </div>
        <div class="flex items-center">
            <div class="text-sm">
                <p class="text-gray-900 leading-none"> <i> Posted By:</i> {{ $name }}</p>
                <p class="text-gray-600">{{ $created_at }} </p>
            </div>
        </div>
    </div>
</div>
