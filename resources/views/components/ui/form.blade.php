@props(['title', 'description'])

<div class="relative flex min-h-[calc(100dvh-4rem)] items-center justify-center overflow-hidden px-4 py-10 sm:px-6">
    <div class="pointer-events-none absolute -left-28 -top-24 h-64 w-64 rounded-full bg-[radial-gradient(circle,rgba(29,158,117,0.2),transparent_70%)]"></div>
    <div class="pointer-events-none absolute -bottom-28 -right-20 h-72 w-72 rounded-full bg-[radial-gradient(circle,rgba(18,33,27,0.12),transparent_72%)]"></div>

    <div class="w-full max-w-md rounded-3xl border border-[#d7d1c6] bg-[#fffdf7]/95 p-6 shadow-[0_10px_35px_rgba(31,43,38,0.08)] backdrop-blur sm:p-8">
        <div class="mb-6 text-center sm:mb-7">
            <p class="mb-2 text-xs uppercase tracking-[0.16em] text-[#5f6f68]">Welcome back</p>
            <h1 class="text-3xl leading-tight text-[#12211b] [font-family:'DM_Serif_Display',serif] sm:text-4xl">{{ $title }}</h1>
            <p class="mt-2 text-sm leading-6 text-[#5f6f68]">{{ $description }}</p>
        </div>

        <div class="space-y-4">
            {{ $slot }}
        </div>
    </div>
</div>