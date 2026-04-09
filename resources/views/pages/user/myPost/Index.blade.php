<x-layouts.app title="My Posts">
    <div class="mx-auto max-w-6xl px-4 pb-12 pt-6 sm:px-6 lg:px-8">
        <x-dashboard.navbar />

        <section class="mt-8" x-data="searchPosts()">
            <h2 class="text-2xl sm:text-3xl text-[#12211b] [font-family:'DM_Serif_Display',serif]">All Posts</h2>

            <div class="mt-6">
             
                <div class="col-span-full flex items-center justify-between rounded-3xl border border-[#d7d1c6] bg-white p-5 mb-4">
                    <input
                        type="text"
                        x-model="search"
                        aria-label="Search posts"
                        @input.debounce.500ms="handleSearch"
                        placeholder="Search posts..."
                        class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                    />                </div>

             
                <div x-show="loading" class="text-center text-sm text-[#5f6f68] py-4">
                    Searching...
                </div>

                <div x-show="searched && !loading" class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <template x-for="post in results" :key="post.id">
                        <div class="rounded-3xl border border-[#d7d1c6] bg-white p-5">
                            <a :href="`/posts/${post.created_at}`" x-text="post.title" class="font-semibold text-[#12211b] hover:underline"></a>
                            <p x-text="post.excerpt" class="mt-2 text-sm text-[#5f6f68]"></p>
                        </div>
                    </template>

                
                    <div
                        x-show="results.length === 0"
                        class="col-span-full rounded-3xl border border-[#d7d1c6] bg-white p-5 text-center text-sm text-[#5f6f68]"
                    >
                        No posts found for your search.
                    </div>
                </div>

             
                <div x-show="!searched" class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @forelse ($MyPosts as $post)
                        <x-card :post="$post" />
                    @empty
                        <div class="col-span-full rounded-3xl border border-[#d7d1c6] bg-white p-5 text-center text-sm text-[#5f6f68]">
                            No posts found. Start by creating your first post!
                        </div>
                    @endforelse
                </div>

                <div x-show="!searched" class="mt-6">
                    {{ $MyPosts->links() }}
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>