<header class="rounded-3xl border border-[#d7d1c6] bg-[#fffdf7] px-6 py-4">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div class="space-y-1">
            <a href="{{ url('/') }}" class="text-2xl tracking-wide text-[#12211b] [font-family:'DM_Serif_Display',serif]">
                {{ config('app.name', 'Blog Post') }}
            </a>
            <p class="text-xs uppercase tracking-[0.2em] text-[#5f6f68]">Contributor dashboard</p>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <x-ui.button tag="a" href="{{ url('/posts') }}" variant="secondary" size="sm">
                All Posts
            </x-ui.button>
            <x-ui.button tag="a" href="{{ url('/posts/create') }}" size="sm">
                + New Post
            </x-ui.button>
        </div>
    </div>

    <nav class="mt-4 border-t border-dashed border-[#d7d1c6] pt-4">
        <div class="flex flex-wrap items-center gap-2 text-sm">
            <a href="{{ url('/dashboard') }}" class="rounded-full border border-transparent bg-[#1D9E75]/10 px-4 py-2 font-medium text-[#1D9E75]">
                Overview
            </a>
            <a href="{{ url('/posts') }}" class="rounded-full border border-transparent px-4 py-2 text-[#5f6f68] transition hover:text-[#1f2b26]">
                Posts
            </a>
            <a href="{{ url('/posts/create') }}" class="rounded-full border border-transparent px-4 py-2 text-[#5f6f68] transition hover:text-[#1f2b26]">
                New Draft
            </a>
            <a href="{{ url('/settings') }}" class="rounded-full border border-transparent px-4 py-2 text-[#5f6f68] transition hover:text-[#1f2b26]">
                Settings
            </a>
            <div class="ml-auto flex items-center gap-2">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-ui.button type="submit" variant="text" size="sm" class="text-[#5f6f68] hover:text-[#1f2b26] cursor-pointer">
                    Logout
                </x-ui.button>
                </form>
            </div>
        </div>
    </nav>
</header>
