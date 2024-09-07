<x-app-layout>
    <div class="px-4 py-2">
        @can('update', $post)
            <div>
                <a href="{{ route('posts.edit', ['post' => $post]) }}">Edit Post</a>
            </div>
        @endcan
        @can('delete', $post)
            <form action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <x-button type="submit">Delete Post</x-button>
            </form>
        @endcan
        <h1 class="text-xl font-semibold block">{{ $post->title }}</h1>
        <span class="text-sm text-gray-600">
            {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}
        </span>
        <p class="py-4">
            {!! nl2br(e($post->body)) !!}
        </p>
        <div>
            <h2 class="text-xl font-bold block">Comments</h2>
            <form action="{{ route('posts.comments.store', $post) }}" method="post">
                @csrf
                <textarea name="body" id="body" cols="30" rows="5" class="w-full"></textarea>
                <x-button type="submit">Add Comment</x-button>
            </form>
            <ul>
                @foreach ($comments as $comment)
                    <li class="py-2">
                        <p>{{ $comment->body }}</p>
                        <span class="text-sm text-gray-600">
                            {{ $comment->created_at->diffForHumans() }} by {{ $comment->user->name }}
                        </span>
                        @can('delete', $comment)
                            <form action="{{ route('posts.comments.destroy', ['post' => $post, 'comment' => $comment]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <x-button type="submit">Delete</x-button>
                            </form>
                        @endcan
                    </li>
                    <hr>
                @endforeach
            </ul>
            <div>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
