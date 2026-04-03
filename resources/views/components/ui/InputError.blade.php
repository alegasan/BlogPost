@props(['name'])

@error($name)
    <p class="rounded-xl border border-[#e5c6bf] bg-[#fff4f2] px-3 py-2 text-sm font-medium text-[#9f3f33]">
        {{ $message }}
    </p>
@enderror