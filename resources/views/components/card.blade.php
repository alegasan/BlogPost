@props(['post'])

<article class="relative overflow-hidden rounded-3xl border border-[#d7d1c6] bg-white p-5 transition duration-300 hover:-translate-y-1">
	<div class="mb-4 h-20 w-full rounded-2xl bg-[radial-gradient(circle_at_30%_20%,rgba(29,158,117,0.24),transparent_65%)]"></div>
	<span class="inline-flex items-center rounded-full border border-[#d7d1c6] bg-[#f7f2ea] px-3 py-1 text-[0.65rem] uppercase tracking-[0.18em] text-[#5f6f68]">
		{{ $post->status }}
	</span>
	<h2 class="mt-4 text-lg font-semibold text-[#1f2b26]">{{ $post->title }}</h2>
	<p class="mt-2 text-sm leading-6 text-[#5f6f68]">
		{{ $post->excerpt }}
	</p>
	<div class="mt-4 flex items-center justify-between text-xs text-[#5f6f68]">
		<span>{{ $post->formatted_date }}</span>
		<a href="{{ route('posts.show', $post) }}" class="font-medium text-[#1D9E75]">Read more</a>
	</div>
</article>