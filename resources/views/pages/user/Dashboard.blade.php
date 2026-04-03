<x-layouts.app title="Dashboard">
	<div class="mx-auto max-w-6xl px-4 pb-12 pt-6 sm:px-6 lg:px-8">
		<div class="mb-8">
			<x-dashboard.navbar />
		</div>

		<main class="space-y-8">
			<section class="rounded-3xl border border-[#d7d1c6] bg-[#fffdf7] p-6">
				<div class="flex flex-wrap items-center justify-between gap-4">
					<div>
						<h1 class="text-3xl text-[#12211b] [font-family:'DM_Serif_Display',serif]">Latest Articles</h1>
						<p class="mt-2 text-sm text-[#5f6f68]">3 posts published with the last 48 hours.</p>
					</div>
					<div class="flex items-center gap-2 text-xs uppercase tracking-[0.18em] text-[#5f6f68]">
						<span class="h-2 w-2 rounded-full bg-[#1D9E75]"></span>
						Live
					</div>
				</div>

				<div class="mt-6 grid gap-4 md:grid-cols-3">
					<article class="relative overflow-hidden rounded-3xl border border-[#d7d1c6] bg-white p-5 transition duration-300 hover:-translate-y-1">
						<div class="mb-4 h-20 w-full rounded-2xl bg-[radial-gradient(circle_at_30%_20%,rgba(29,158,117,0.24),transparent_65%)]"></div>
						<span class="inline-flex items-center rounded-full border border-[#d7d1c6] bg-[#f7f2ea] px-3 py-1 text-[0.65rem] uppercase tracking-[0.18em] text-[#5f6f68]">
							Pinned
						</span>
						<h2 class="mt-4 text-lg font-semibold text-[#1f2b26]">Getting started with Laravel</h2>
						<p class="mt-2 text-sm leading-6 text-[#5f6f68]">
							A practical checklist for setting up your environment, routing, and first model.
						</p>
						<div class="mt-4 flex items-center justify-between text-xs text-[#5f6f68]">
							<span>Apr 2, 2026</span>
							<a href="#" class="font-medium text-[#1D9E75]">Read more</a>
						</div>
					</article>

					<article class="relative overflow-hidden rounded-3xl border border-[#d7d1c6] bg-white p-5 transition duration-300 hover:-translate-y-1">
						<div class="mb-4 h-20 w-full rounded-2xl bg-[radial-gradient(circle_at_70%_20%,rgba(15,23,42,0.12),transparent_65%)]"></div>
						<span class="inline-flex items-center rounded-full border border-[#d7d1c6] bg-[#f7f2ea] px-3 py-1 text-[0.65rem] uppercase tracking-[0.18em] text-[#5f6f68]">
							Trending
						</span>
						<h2 class="mt-4 text-lg font-semibold text-[#1f2b26]">Why I chose Tailwind v4</h2>
						<p class="mt-2 text-sm leading-6 text-[#5f6f68]">
							Streamlined tokens, fewer config files, and faster design handoffs for the team.
						</p>
						<div class="mt-4 flex items-center justify-between text-xs text-[#5f6f68]">
							<span>Apr 3, 2026</span>
							<a href="#" class="font-medium text-[#1D9E75]">Read more</a>
						</div>
					</article>

					<article class="relative overflow-hidden rounded-3xl border border-[#d7d1c6] bg-white p-5 transition duration-300 hover:-translate-y-1">
						<div class="mb-4 h-20 w-full rounded-2xl bg-[radial-gradient(circle_at_50%_0%,rgba(242,168,79,0.25),transparent_65%)]"></div>
						<span class="inline-flex items-center rounded-full border border-[#d7d1c6] bg-[#f7f2ea] px-3 py-1 text-[0.65rem] uppercase tracking-[0.18em] text-[#5f6f68]">
							New
						</span>
						<h2 class="mt-4 text-lg font-semibold text-[#1f2b26]">Local auth in 15 minutes</h2>
						<p class="mt-2 text-sm leading-6 text-[#5f6f68]">
							Quick notes on routes, sessions, and the guard setup that keeps it tidy.
						</p>
						<div class="mt-4 flex items-center justify-between text-xs text-[#5f6f68]">
							<span>Apr 3, 2026</span>
							<a href="#" class="font-medium text-[#1D9E75]">Read more</a>
						</div>
					</article>
				</div>
			</section>

			<section class="rounded-3xl border border-[#d7d1c6] bg-[#fffdf7] p-6">
				<div class="flex flex-wrap items-center justify-between gap-3">
					<div>
						<h2 class="text-2xl text-[#12211b] [font-family:'DM_Serif_Display',serif]">Create a new post</h2>
						<p class="mt-1 text-sm text-[#5f6f68]">Draft quickly, publish when it is ready.</p>
					</div>
					<span class="rounded-full border border-[#d7d1c6] bg-white px-3 py-1 text-xs text-[#5f6f68]">Drafts: 2</span>
				</div>

				<form class="mt-6 grid gap-4">
					<div class="grid gap-4 md:grid-cols-[1.2fr_0.8fr]">
						<label class="space-y-2">
							<span class="text-xs uppercase tracking-[0.18em] text-[#5f6f68]">Title</span>
							<input
								type="text"
								placeholder="Enter post title..."
								class="w-full rounded-2xl border border-[#d7d1c6] bg-white px-4 py-3 text-sm text-[#1f2b26] outline-none transition focus:border-[#1D9E75] focus:ring-2 focus:ring-[#1D9E75]/20"
							/>
						</label>
						<label class="space-y-2">
							<span class="text-xs uppercase tracking-[0.18em] text-[#5f6f68]">Category</span>
							<select class="w-full rounded-2xl border border-[#d7d1c6] bg-white px-4 py-3 text-sm text-[#1f2b26] outline-none transition focus:border-[#1D9E75] focus:ring-2 focus:ring-[#1D9E75]/20">
								<option>Laravel</option>
								<option>Design</option>
								<option>Workflow</option>
							</select>
						</label>
					</div>
					<label class="space-y-2">
						<span class="text-xs uppercase tracking-[0.18em] text-[#5f6f68]">Content</span>
						<textarea
							rows="4"
							placeholder="Write your post content here..."
							class="w-full rounded-2xl border border-[#d7d1c6] bg-white px-4 py-3 text-sm text-[#1f2b26] outline-none transition focus:border-[#1D9E75] focus:ring-2 focus:ring-[#1D9E75]/20"
						></textarea>
					</label>
					<div class="flex flex-wrap items-center justify-end gap-2">
						<x-ui.button variant="secondary" size="sm">
							Save Draft
						</x-ui.button>
						<x-ui.button size="sm">
							Publish Post
						</x-ui.button>
					</div>
				</form>
			</section>
		</main>
	</div>
</x-layouts.app>
