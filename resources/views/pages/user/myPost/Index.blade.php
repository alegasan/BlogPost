<x-layouts.app title="My Posts">
 <div class="mx-auto max-w-6xl px-4 pb-12 pt-6 sm:px-6 lg:px-8">
    <x-dashboard.navbar />
          <section class="mt-8">
            <h2 class="text-2xl sm:text-3xl text-[#12211b] [font-family:'DM_Serif_Display',serif]">All Posts</h2>
            <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($MyPosts as $post)
                    <x-card :post="$post" />
                @empty
                    <div class="col-span-full rounded-3xl border border-[#d7d1c6] bg-white p-5 text-center text-sm text-[#5f6f68]">
                        No posts found. Start by creating your first post!
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $MyPosts->links() }}
            </div>
        </section>
 </div>
</x-layouts.app>