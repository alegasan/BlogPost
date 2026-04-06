@props(['stats' => ['draft' => 0]])
            
            <section class="rounded-3xl border border-[#d7d1c6] bg-[#fffdf7] p-4 sm:p-6">
				<div class="flex flex-wrap items-start justify-between gap-4">
					<div>
						<h2 class="text-2xl sm:text-3xl text-[#12211b] [font-family:'DM_Serif_Display',serif]">Create a new post</h2>
						<p class="mt-1 text-sm text-[#5f6f68]">Draft quickly, publish when it is ready.</p>
					</div>
					<span class="inline-flex rounded-full border border-[#d7d1c6] bg-white px-3 py-1 text-xs text-[#5f6f68]">Drafts: {{ $stats['draft'] ?? 0 }}</span>
				</div>

				<form class="mt-6 grid gap-4 md:grid-cols-2"
				method="POST"
				action="{{ route('posts.store') }}"
				>
					@csrf
					@method('POST')
					<label class="space-y-2">
						<span class="text-xs uppercase tracking-[0.18em] text-[#5f6f68]">Title</span>
						<x-ui.input
							type="text"
							name="title"
							placeholder="Enter post title..."
							required
							class="w-full rounded-2xl border border-[#d7d1c6] bg-white px-4 py-3 text-sm text-[#1f2b26] outline-none transition focus:border-[#1D9E75] focus:ring-2 focus:ring-[#1D9E75]/20"
						/>
					</label>
					<label class="space-y-2">
						<span class="text-xs uppercase tracking-[0.18em] text-[#5f6f68]">Category</span>
						<x-ui.input
							type="text"
							name="category"
							placeholder="e.g. Laravel, Tailwind, etc."
							required
							class="w-full rounded-2xl border border-[#d7d1c6] bg-white px-4 py-3 text-sm text-[#1f2b26] outline-none transition focus:border-[#1D9E75] focus:ring-2 focus:ring-[#1D9E75]/20"
						/>
					</label>
					<label class="space-y-2 md:col-span-2">
						<span class="text-xs uppercase tracking-[0.18em] text-[#5f6f68]">Content</span>
						<input
							id="content"
							type="hidden"
							name="content"
						/>
						<trix-editor
							input="content"
							class="min-h-[200px] rounded-2xl border border-[#d7d1c6] bg-white px-4 py-3 text-sm text-[#1f2b26] outline-none transition focus:border-[#1D9E75] focus:ring-2 focus:ring-[#1D9E75]/20"
						></trix-editor>
					</label>
					<div class="flex flex-col items-stretch justify-end gap-2 sm:flex-row sm:items-center md:col-span-2">
						<input type="hidden" name="status" id="status" value="published">
						<x-ui.button variant="secondary" size="sm" type="submit" class="w-full sm:w-auto" onclick="document.getElementById('status').value='draft'">
							Save Draft
						</x-ui.button>
						<x-ui.button size="sm" type="submit" class="w-full sm:w-auto" onclick="document.getElementById('status').value='published'">
							Publish Post
						</x-ui.button>


					</div>
				</form>
			</section>