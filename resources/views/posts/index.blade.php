<x-app-layout>
    <div class="px-4 py-2">
        <h1 class="text-xl font-semibold text-center">Posts</h1>
        <div>
            <a href="{{ route('posts.create') }}">Create Post</a>
        </div>
        <ul>
            @foreach ($posts as $post)
                <li class="py-2">
                    <a href="{{ route("posts.show", $post) }}" class="text-xl font-semibold block">{{ $post->title }}</a>
                    <span class="text-sm text-gray-600">
                        {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}
                    </span>
                    @can('delete', $post)
                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <x-button type="submit">Delete Post</x-button>
                        </form>
                    @endcan
                </li>
                <hr>
            @endforeach
        </ul>
        <div>
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
