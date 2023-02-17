<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    @fragment('post-list')
        <div class="flex flex-col items-center flex-wrap  py-2  hover:shadow-sm">
            @foreach ($posts as $post)
                @can('view-post', $post)
                    <div class="text-center max-w-2xl m-8 p-1  rounded-lg w-1/4 ">
                        @unless($post->created_at->eq($post->updated_at))
                            <small class="text-sm text-gray-600"> &middot; {{ __('validation.edited') }}</small>
                        @endunless
                        <div class=" bg-white rounded-lg border-b-2 p-1 mb-3">
                            <p class="font-semibold">{{ $post->title }}</p>
                        </div>

                        <div class="bg-white rounded-sm  border-b p-1">
                            <div class="mx-10">
                                <p>{{ $post->body }}</p>
                            </div>

                        </div>
                        <div class="bg-white rounded-sm  border-b p-1">
                            <div class=" ">
                                <p class="text-right text-xs "> Creado {{ $post->created_at }}</p>
                                @can('update-post', $post)
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">

                                            <x-dropdown-link :href="route('posts.edit', $post)">
                                                {{ __('validation.edit') }}
                                            </x-dropdown-link>


                                            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                                @csrf
                                                @method('delete')
                                                <x-dropdown-link :href="route('posts.destroy', $post)"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('validation.delete') }}
                                                </x-dropdown-link>
                                            </form>
                                        @endcan


                                    </x-slot>
                                </x-dropdown>


                                @foreach ($comments as $comment)
                                    @if ($comment->post_id == $post->id)
                                        <div class="bg-white rounded-sm  border-b p-1">
                                            <div class="mx-10">
                                                <p>{{ $comment->body }}</p>
                                            </div>
                                        </div>
                                    @else
                                    @endif
                                @endforeach

                            </div>

                        </div>

                    </div>
                @endcan
            @endforeach
        </div>
    @endfragment
</x-app-layout>
