<x-layouts.app title="Edit Post · {{ config('app.name', 'Blog Post') }}">
     <div class="mx-auto max-w-6xl px-4 pb-12 pt-6 sm:px-6 lg:px-8">
        <div class="mb-8">
            <x-dashboard.navbar />
        </div>
    </div>

    <div class="mx-auto max-w-4xl px-4 pb-12 pt-6 sm:px-6 lg:px-8">
        <section class="rounded-3xl border border-[#d7d1c6] bg-[#fffdf7] p-4 sm:p-6">
            <div class="flex flex-wrap items-start justify-between gap-4">
                <div>
                    <h2 class="text-2xl sm:text-3xl text-[#12211b] [font-family:'DM_Serif_Display',serif]">Edit Post</h2>
                    <p class="mt-1 text-sm text-[#5f6f68]">Make changes to your post and save when you're done.</p>
                </div>
                <span class="inline-flex rounded-full border border-[#d7d1c6] bg-white px-3 py-1 text-xs text-[#5f6f68]">Status:
                    {{ $post->status }}</span>
            </div>

            <form class="mt-6 grid gap-4 md:grid-cols-2" 
                method="POST" action="{{ route('posts.update', $post) }}" 
                x-data="{ submitting: null, status: '{{ $post->status }}' }"
                x-on:submit="submitting = submitting ?? status">
                @csrf
                @method('PUT')

                <label class="space-y-2">
                    <span class="text-xs uppercase tracking-[0.18em] text-[#5f6f68]">Title</span>
                    <x-ui.input type="text" name="title" placeholder="Enter post title..." required
                        value="{{ old('title', $post->title) }}"
                        class="w-full rounded-2xl border border-[#d7d1c6] bg-white px-4 py-3 text-sm text-[#1f2b26] outline-none transition focus:border-[#1D9E75] focus:ring-2 focus:ring-[#1D9E75]/20" />
                </label>

                <label class="space-y-2">
                    <span class="text-xs uppercase tracking-[0.18em] text-[#5f6f68]">Category</span>
                    <x-ui.input type="text" name="category" placeholder="e.g. Laravel, Tailwind, etc." required
                        value="{{ old('category', $post->category) }}"
                        class="w-full rounded-2xl border border-[#d7d1c6] bg-white px-4 py-3 text-sm text-[#1f2b26] outline-none transition focus:border-[#1D9E75] focus:ring-2 focus:ring-[#1D9E75]/20" />
                </label>
            
                <label class="space-y-2 md:col-span-2">
                    <span class="text-xs uppercase tracking-[0.18em] text-[#5f6f68]">Content</span>
                    <input id="content" type="hidden" name="content" value="{{ old('content', $post->content) }}" />
                    <trix-editor input="content"
                        class="min-h-[200px] rounded-2xl border border-[#d7d1c6] bg-white px-4 py-3 text-sm text-[#1f2b26] outline-none transition focus:border-[#1D9E75] focus:ring-2 focus:ring-[#1D9E75]/20"></trix-editor>
                </label>
                <x-ui.button size="sm" type="submit" :block="true"
                    x-bind:disabled="submitting !== null"
                    x-on:click="status = 'published'">
                    <span x-show="submitting !== 'published'">Update Post</span>
                    <span x-show="submitting === 'published'">Updating...</span>
                </x-ui.button>
            </form>


</x-layouts.app>