<x-layouts.app title="{{ $post->title }}">
    <div class="mx-auto max-w-4xl px-4 pb-12 pt-6 sm:px-6 lg:px-8">
        <div class="mb-8">
            <x-dashboard.navbar />
        </div>

        <article class="rounded-3xl border border-[#d7d1c6] bg-white p-6 sm:p-8">
            <div class="mb-4 flex flex-wrap items-center gap-3 text-xs text-[#5f6f68]">
                <span class="inline-flex items-center rounded-full border border-[#d7d1c6] bg-[#f7f2ea] px-3 py-1 uppercase tracking-[0.18em]">
                    {{ $post->status }}
                </span>
                <span>{{ $post->formatted_date }}</span>

                @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="ml-auto" onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700 transition duration-300">
                        Delete
                    </button>
                </form>    
                @endcan        
           

             </div>

             <h1 class="text-3xl sm:text-4xl text-[#12211b] [font-family:'DM_Serif_Display',serif]">            <h1 class="text-3xl sm:text-4xl text-[#12211b] [font-family:'DM_Serif_Display',serif]">
                {{ $post->title }}
            </h1>

            <p class="mt-6 whitespace-pre-line text-base leading-7 text-[#1f2b26]">
                {{ $post->content }}
            </p>
        </article>
    </div>
</x-layouts.app>
