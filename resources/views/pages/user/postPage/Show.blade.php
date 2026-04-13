<x-layouts.app title="{{ $post->title }} · {{ config('app.name', 'Blog Post') }}">
    <div class="mx-auto max-w-4xl px-4 pb-12 pt-6 sm:px-6 lg:px-8">
        <div class="mb-8">
            <x-dashboard.navbar />
        </div>

        <article class="rounded-3xl border border-[#d7d1c6] bg-white p-6 sm:p-8">
            <div class="mb-4 flex flex-wrap items-center gap-3 text-xs text-[#5f6f68]">
                <span
                    class="inline-flex items-center rounded-full border border-[#d7d1c6] bg-[#f7f2ea] px-3 py-1 uppercase tracking-[0.18em]">
                    {{ $post->status }}
                </span>
                <span>{{ $post->formatted_date }}</span>
                <div class="ml-auto flex items-center gap-2">
                    
                    <a href="{{ route('posts.edit', $post) }}" class="font-medium text-[#1D9E75] border border-[#1D9E75] rounded-md hover:bg-[#1D9E75] hover:text-white px-4 py-2 transition-colors duration-200">
                        Edit
                    </a>


                    @can('delete', $post)
                        <form action="{{ route('posts.destroy', $post) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <x-ui.button type="submit" variant="danger" size="xs" class="cursor-pointer">
                                Delete
                            </x-ui.button>
                        </form>
                    @endcan


                </div>
            </div>



            <h1 class="text-3xl sm:text-4xl text-[#12211b] [font-family:'DM_Serif_Display',serif]">
                {{ $post->title }}
            </h1>

            <p class="mt-6 whitespace-pre-line text-base leading-7 text-[#1f2b26]">
                {{ $post->content }}
            </p>
        </article>
    </div>
</x-layouts.app>
