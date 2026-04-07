<header class="rounded-3xl border border-[#d7d1c6] bg-[#fffdf7] px-6 py-4">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div class="space-y-1">
            <a href="{{ url('/') }}" class="text-2xl tracking-wide text-[#12211b] [font-family:'DM_Serif_Display',serif]">
                {{ config('app.name', 'Blog Post') }}
            </a>
            <p class="text-xs uppercase tracking-[0.2em] text-[#5f6f68]">Contributor dashboard</p>
        </div>

        <div class="flex flex-wrap items-center gap-2">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-ui.button type="submit" variant="text" size="sm" class="text-[#5f6f68] hover:text-[#1f2b26] cursor-pointer">
                    Logout
                </x-ui.button>
                </form>
        </div>
    </div>

    <nav class="mt-4 border-t border-dashed border-[#d7d1c6] pt-4" x-data="{ currentPath: window.location.pathname }" x-init="window.addEventListener('popstate', () => currentPath = window.location.pathname)">
        <div class="flex flex-wrap items-center gap-2 text-sm">
            <a
                href="{{ url('/dashboard') }}"
                :class="currentPath === '/dashboard'
                    ? 'rounded-full border border-transparent bg-[#1D9E75]/10 px-4 py-2 font-medium text-[#1D9E75]'
                    : 'rounded-full border border-transparent px-4 py-2 text-[#5f6f68] transition hover:text-[#1f2b26]'
                "
                @click="currentPath = '/dashboard'"
            >
                Overview
            </a>
            <a
                href="{{ url('/posts') }}"
                :class="currentPath === '/posts'
                    ? 'rounded-full border border-transparent bg-[#1D9E75]/10 px-4 py-2 font-medium text-[#1D9E75]'
                    : 'rounded-full border border-transparent px-4 py-2 text-[#5f6f68] transition hover:text-[#1f2b26]'
                "
                @click="currentPath = '/posts'"
            >
               All Posts
            </a>
            <a
                href="{{ url('/my-posts') }}"
                :class="currentPath === '/my-posts'
                    ? 'rounded-full border border-transparent bg-[#1D9E75]/10 px-4 py-2 font-medium text-[#1D9E75]'
                    : 'rounded-full border border-transparent px-4 py-2 text-[#5f6f68] transition hover:text-[#1f2b26]'
                "
                @click="currentPath = '/my-posts'"
            >
               My Posts
            </a>
            <a
                href="{{ url('/settings') }}"
                :class="currentPath === '/settings'
                    ? 'rounded-full border border-transparent bg-[#1D9E75]/10 px-4 py-2 font-medium text-[#1D9E75]'
                    : 'rounded-full border border-transparent px-4 py-2 text-[#5f6f68] transition hover:text-[#1f2b26]'
                "
                @click="currentPath = '/settings'"
            >
                Settings
            </a>
            <div class="ml-auto flex items-center gap-2">
            
            </div>
        </div>
    </nav>
</header>
