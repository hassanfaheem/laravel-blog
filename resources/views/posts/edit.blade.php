<x-app-layout>
    <div class="px-4 py-2">
        <h1 class="text-xl font-semibold text-center">Edit Blog Post</h1>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('posts.update', ['post' => $post]) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="w-full" value="{{ $post->title }}" required></input>
            </div>
            <div>
                <label for="body">Body</label>
                <textarea name="body" id="body" cols="30" rows="5" class="w-full" required>{{ $post->body }}</textarea>
            </div>
            <x-button type="submit" class="mt-4">Edit Post</x-button>
        </form>
    </div>
</x-app-layout>
