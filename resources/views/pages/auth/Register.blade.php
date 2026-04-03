<x-layouts.app title="Register · {{ config('app.name', 'Blog Post') }}">
    <x-ui.form title="Create your account" description="Join {{ config('app.name', 'Blog Post') }} to start sharing your ideas and stories with the world.">
        <form class="space-y-4" method="POST" action="{{ route('register.store') }}">
            @csrf
            @method('POST')
            <div class="space-y-1.5">
                <label for="name" class="text-sm font-medium text-[#1f2b26]">Name</label>
                <x-ui.input id="name" name="name" type="text" placeholder="Your name" autocomplete="name" required />
            </div>

            <div class="space-y-1.5">
                <label for="email" class="text-sm font-medium text-[#1f2b26]">Email</label>
                <x-ui.input id="email" name="email" type="email" placeholder="Your email" autocomplete="email" required />
            </div>

            <div class="space-y-1.5">
                <label for="password" class="text-sm font-medium text-[#1f2b26]">Password</label>
                <x-ui.input id="password" name="password" type="password" placeholder="Create a password" autocomplete="new-password" required />
            </div>

            <div class="space-y-1.5">
                <label for="password_confirmation" class="text-sm font-medium text-[#1f2b26]">Confirm Password</label>
                <x-ui.input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm your password" autocomplete="new-password" required />
            </div>

            <x-ui.button type="submit" block="true">Register</x-ui.button>
            <x-ui.button tag="a" href="{{ route('login') }}" variant="secondary" block="true">
                Already have an account? Log in
            </x-ui.button>
        </form>
    </x-ui.form>

</x-layouts.app>