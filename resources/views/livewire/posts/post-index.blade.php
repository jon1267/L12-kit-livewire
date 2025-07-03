<section>
    <!-- time 11:45 Posts Index -->
    <div class="flex justify-end mr-6 pb-4">
        <a href="{{ route('posts.create') }}"
           class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
            <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 2a8 8 0 100 16A8 8 0 0010 2zm1 11H9v2a1 1 0 11-2 0v-2H6a1 1 0 110-2h1V8a1 1 0 112 0v3h2a1 1 0 110 2z"></path>
            </svg>
            Create Post
        </a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Content
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($posts as $post)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $post->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $post->title }}
                </td>
                <td class="px-6 py-4">
                    {{ Str::limit($post->content), 150, '...' }}
                </td>
                <td class="px-6 py-4">
                    <img src="{{ asset('storage/'.$post->image) }}" alt="image" class="w-16 h-16 object-cover rounded-2xl">
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('posts.edit', $post->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            @empty
                <tr class="bg-white dark:bg-gray-900">
                    <td colspan="5" class="px-6 py-4 text-center text-xl text-gray-500 dark:text-gray-400">
                        No posts found.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

</section>
