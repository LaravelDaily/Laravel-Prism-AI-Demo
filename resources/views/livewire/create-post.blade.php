<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6 text-center">Create New Post</h1>
    <form action="#" method="POST" class="w-full max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" wire:model="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-6">
            <label for="post_text" class="block text-gray-700 text-sm font-bold mb-2">Post Text</label>
            <textarea wire:model="postText" id="post_text" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
        </div>

        <div class="mb-6">
            <div class="flex items-center justify-between mb-2">
                <label for="summary" class="block text-gray-700 text-sm font-bold">Summary</label>
                <a href="#" wire:click.prevent="generateSummary" class="text-blue-500 hover:text-blue-700 text-sm">
                    Generate summary
                    <span wire:loading wire:target="generateSummary" class="ml-2">
                        <svg class="animate-spin h-4 w-4 text-blue-500 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                    @if ($summaryError)
                        <span class="ml-2 text-red-500">{{ $summaryError }}</span>
                    @endif
                </a>
            </div>
            <textarea wire:model="summary" id="summary" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Create Post
            </button>
        </div>
    </form>
</div>
