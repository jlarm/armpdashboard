<x-guest>
    <div class="flex min-h-screen">
        <div class="flex-1 flex justify-center items-center">
            <div class="w-80 max-w-80 space-y-6">
                <div class="flex justify-center">
                    <a href="/" class="group flex items-center gap-3">
                        <div>
                            <img class="size-14" src="{{ asset('favicon.svg') }}" alt="">
                        </div>
                    </a>
                </div>

                <flux:heading class="text-center" size="xl">Welcome back</flux:heading>

                <div class="flex flex-col gap-6">
                    <flux:input label="Email" type="email" placeholder="email@example.com" />

                    <flux:field>
                        <div class="mb-3 flex justify-between">
                            <flux:label>Password</flux:label>

                            <flux:link href="#" variant="subtle" class="text-sm">Forgot password?</flux:link>
                        </div>

                        <flux:input type="password" placeholder="Your password" />
                    </flux:field>

                    <flux:checkbox label="Remember me for 30 days" />

                    <flux:button variant="primary" class="w-full">Log in</flux:button>
                </div>
            </div>
        </div>

        <div class="flex-1 p-4 max-lg:hidden">
            <div class="text-white relative rounded-lg h-full w-full bg-zinc-900 flex flex-col items-start justify-end p-16" style="background-image: url('/road.webp'); background-size: cover">
            </div>
        </div>
    </div>
</x-guest>
