@props([
	'name' => null,
])

@php
	$hasError = $name ? $errors->has($name) : false;
	$inputType = (string) $attributes->get('type', 'text');
	$supportsValue = ! in_array($inputType, ['password', 'file'], true);
	$inputValue = $attributes->get('value');

	if ($supportsValue && $name && ! $attributes->has('value')) {
		$inputValue = old($name);
	}
@endphp

<input
	@if ($name)
		name="{{ $name }}"
	@endif
	@if ($supportsValue && ! is_null($inputValue))
		value="{{ $inputValue }}"
	@endif
	{{ $attributes->except('value')->class([
		'w-full rounded-2xl border bg-[#fffdf7] px-4 py-2.5 text-sm text-[#1f2b26] shadow-sm outline-none transition placeholder:text-[#8a968f]',
		'border-[#d7d1c6] hover:border-[#adb5aa] focus:border-[#1D9E75] focus:ring-2 focus:ring-[#1D9E75]/20' => ! $hasError,
		'border-[#c85d4a] focus:border-[#c85d4a] focus:ring-2 focus:ring-[#c85d4a]/20' => $hasError,
		'disabled:cursor-not-allowed disabled:opacity-60 disabled:hover:border-[#d7d1c6]',
	]) }}
/>

@if ($name)
	<x-ui.InputError :name="$name" />
@endif
