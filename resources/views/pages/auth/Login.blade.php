<x-layouts.app title="Log in · {{ config('app.name', 'Blog Post') }}">
	<x-ui.form title="Welcome back" description="Sign in to continue writing and managing your posts.">
		<form class="space-y-4" method="POST" action="{{ route('login.store') }}">
			@csrf
			@method('POST')
			<div class="space-y-1.5">
				<label for="email" class="text-sm font-medium text-[#1f2b26]">Email</label>
				<x-ui.input id="email" name="email" type="email" placeholder="you@example.com" autocomplete="email" required />
			</div>

			<div class="space-y-1.5">
				<div class="flex items-center justify-between gap-2">
					<label for="password" class="text-sm font-medium text-[#1f2b26]">Password</label>
					<a href="#" class="text-xs font-medium text-[#1D9E75] transition hover:brightness-90">Forgot password?</a>
				</div>
				<x-ui.input id="password" name="password" type="password" placeholder="Enter your password" autocomplete="current-password" required />
			</div>

			<x-ui.button type="submit" block="true">Log in</x-ui.button>

			<x-ui.button tag="a" href="{{ route('register') }}" variant="secondary" block="true">
				Create an account
			</x-ui.button>
		</form>
	</x-ui.form>
</x-layouts.app>
