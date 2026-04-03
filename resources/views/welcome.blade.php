<x-layouts.app>
        <div class="mx-auto max-w-7xl px-4 pb-12 pt-6 sm:px-6 lg:px-8">
            <header class="mb-8 flex items-center justify-between gap-4">
                <a href="{{ url('/') }}" class="text-2xl tracking-wide text-[#12211b] [font-family:'DM_Serif_Display',serif]">
                    {{ config('app.name', 'Blog Post') }}
                </a>

                @if (Route::has('login'))
                    <nav class="flex flex-wrap items-center gap-2">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="rounded-full border border-[#d7d1c6] px-4 py-2 text-sm font-medium text-[#1f2b26] transition hover:-translate-y-px hover:border-[#adb5aa]"
                            >
                                Dashboard
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="rounded-full border border-[#d7d1c6] px-4 py-2 text-sm font-medium text-[#1f2b26] transition hover:-translate-y-px hover:border-[#adb5aa]"
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="rounded-full border border-[#1D9E75] bg-[#1D9E75] px-4 py-2 text-sm font-medium text-white transition hover:-translate-y-px hover:brightness-105"
                                >
                                    Start writing
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>

            <main class="space-y-4">
                <section class="grid grid-cols-1 gap-4 lg:grid-cols-5">
                    <article class="relative overflow-hidden rounded-3xl border border-[#d7d1c6] bg-[#fffdf7] p-8 lg:col-span-3">
                        <div class="pointer-events-none absolute -right-20 -top-24 h-64 w-64 rounded-full bg-[radial-gradient(circle,rgba(29,158,117,0.2),transparent_70%)]"></div>

                        <p class="mb-3 text-xs uppercase tracking-[0.16em] text-[#5f6f68]">Welcome to BlogPost</p>
                        <h1 class="max-w-[16ch] text-4xl leading-tight text-[#12211b] [font-family:'DM_Serif_Display',serif] sm:text-5xl">
                            Write stories people actually save, quote, and share.
                        </h1>
                        <p class="mt-4 max-w-2xl text-base leading-8 text-[#5f6f68]">
                            This blog is set up for thoughtful long-form writing, sharp updates, and curated notes.
                            Publish your first post, shape your voice, and build a home for ideas that deserve more than a quick scroll.
                        </p>

                        <div class="mt-6 flex flex-wrap gap-3">
                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="rounded-full border border-[#1D9E75] bg-[#1D9E75] px-5 py-2 text-sm font-medium text-white transition hover:brightness-105"
                                >
                                    Create first post
                                </a>
                            @endif
                            <a
                                href="#"
                                class="rounded-full border border-[#d7d1c6] bg-white px-5 py-2 text-sm font-medium text-[#1f2b26] transition hover:-translate-y-px hover:border-[#adb5aa]"
                            >
                                Explore writing tips
                            </a>
                        </div>
                    </article>

                    <aside class="grid gap-4 lg:col-span-2" aria-label="Highlights">
                        <article class="rounded-3xl border border-[#d7d1c6] bg-[#fffdf7] p-5 transition duration-300 hover:-translate-y-1">
                            <p class="mb-2 text-xs uppercase tracking-[0.16em] text-[#5f6f68]">Template</p>
                            <h2 class="mb-2 text-lg font-semibold text-[#1f2b26]">Featured essay layout ready</h2>
                            <p class="text-sm leading-6 text-[#5f6f68]">
                                Use a bold hero image, strong opener, and pull quotes to create a magazine-style reading experience.
                            </p>
                        </article>
                        <article class="rounded-3xl border border-[#d7d1c6] bg-[#fffdf7] p-5 transition delay-75 duration-300 hover:-translate-y-1">
                            <p class="mb-2 text-xs uppercase tracking-[0.16em] text-[#5f6f68]">Editorial note</p>
                            <h2 class="mb-2 text-lg font-semibold text-[#1f2b26]">Keep each post one core idea</h2>
                            <p class="text-sm leading-6 text-[#5f6f68]">
                                Focused posts are easier to finish and easier for readers to remember after they leave the page.
                            </p>
                        </article>
                        <article class="rounded-3xl border border-[#d7d1c6] bg-[#fffdf7] p-5 transition delay-100 duration-300 hover:-translate-y-1">
                            <p class="mb-2 text-xs uppercase tracking-[0.16em] text-[#5f6f68]">Growth</p>
                            <h2 class="mb-2 text-lg font-semibold text-[#1f2b26]">Build a reliable posting rhythm</h2>
                            <p class="text-sm leading-6 text-[#5f6f68]">
                                Publish weekly, then improve your archive. Consistency compounds faster than perfection.
                            </p>
                        </article>
                    </aside>
                </section>

                <section class="rounded-3xl border border-[#d7d1c6] bg-[#fffdf7] p-6">
                    <h3 class="mb-4 text-3xl text-[#12211b] [font-family:'DM_Serif_Display',serif]">Suggested first posts</h3>
                    <ul class="divide-y divide-dashed divide-[#d7d1c6]">
                        <li class="flex flex-col gap-1 py-3 text-sm text-[#5f6f68] sm:flex-row sm:items-center sm:justify-between">
                            <span class="font-medium text-[#1f2b26]">Why I started this blog</span>
                            <span>3 min read</span>
                        </li>
                        <li class="flex flex-col gap-1 py-3 text-sm text-[#5f6f68] sm:flex-row sm:items-center sm:justify-between">
                            <span class="font-medium text-[#1f2b26]">A weekly notes format that keeps me shipping</span>
                            <span>6 min read</span>
                        </li>
                        <li class="flex flex-col gap-1 py-3 text-sm text-[#5f6f68] sm:flex-row sm:items-center sm:justify-between">
                            <span class="font-medium text-[#1f2b26]">The tools behind my writing workflow</span>
                            <span>5 min read</span>
                        </li>
                    </ul>
                </section>
            </main>

            <footer class="mt-5 text-center text-sm text-[#5f6f68]">
                BlogPost · built for thoughtful publishing
            </footer>
        </div>
    </x-layouts.app>
