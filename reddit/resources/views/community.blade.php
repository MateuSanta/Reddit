<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Communities') }}
        </h2>
    </x-slot>

    @fragment('community-list')
        <div class="flex flex-col items-center flex-wrap  py-2  hover:shadow-sm">
            @foreach ($communities as $community)
                @can('view-community', $community)
                    <div class="text-center max-w-2xl m-8 p-1  rounded-lg w-1/4 ">
                        @unless($community->created_at->eq($community->updated_at))
                            <small class="text-sm text-gray-600"> &middot; {{ __('validation.edited') }}</small>
                        @endunless
                        <div class=" bg-white rounded-lg border-b-2 p-1 mb-3">
                            <p class="font-semibold">{{ $community->title }}</p>
                        </div>
                    </div>
                @endcan
            @endforeach
        </div>
</x-app-layout>
