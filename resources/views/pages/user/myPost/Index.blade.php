<x-layouts.app title="My Posts">
    <div class="mx-auto max-w-6xl px-4 pb-12 pt-6 sm:px-6 lg:px-8">
        <x-dashboard.navbar />

        <section class="mt-8" x-data="{ search: '', results: [], loading: false, searched: false, controller: null, requestId: 0 }">
            <h2 class="text-2xl sm:text-3xl text-[#12211b] [font-family:'DM_Serif_Display',serif]">All Posts</h2>

            <div class="mt-6">
             
                <div class="col-span-full flex items-center justify-between rounded-3xl border border-[#d7d1c6] bg-white p-5 mb-4">
                    <input
                        type="text"
                        x-model="search"
                        aria-label="Search posts"
                        @input.debounce.500ms="
                            if (search.length > 2) {
                                const currentRequestId = ++requestId;

                                if (controller) {
                                    controller.abort();
                                }

                                controller = new AbortController();
                                const currentSearch = search;

                                loading = true;
                                searched = true;

                                fetch(`/my-posts/search?query=${encodeURIComponent(search)}`, { signal: controller.signal })
                                    .then(res => {
                                        if (!res.ok) {
                                            throw new Error(`HTTP ${res.status}`);
                                        }

                                        return res.json();
                                    })
                                    .then(data => {
                                        if (controller.signal.aborted || currentRequestId !== requestId || currentSearch !== search) {
                                            return;
                                        }

                                        results = data.data;
                                        loading = false;
                                        searched = true;
                                    })
                                    .catch(() => {
                                        if (controller.signal.aborted || currentRequestId !== requestId) {
                                            return;
                                        }

                                        results = [];
                                        loading = false;
                                        searched = true;
                                    });
                            } else {
                                if (controller) {
                                    controller.abort();
                                }

                                results = [];
                                loading = false;
                                searched = false;
                            }
                        "
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