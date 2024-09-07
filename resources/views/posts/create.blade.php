<x-app-layout>
    <div class="px-4 py-2">
        <h1 class="text-xl font-semibold text-center">Create New Blog Post</h1>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            @method('POST')
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="w-full" required></input>
            </div>
            <div>
                <label for="body">Body</label>
                <textarea name="body" id="body" cols="30" rows="5" class="w-full" required></textarea>
            </div>
            <x-button type="submit" class="mt-4">Create Post</x-button>
        </form>
    </div>
</x-app-layout>
