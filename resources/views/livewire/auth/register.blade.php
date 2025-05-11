<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <!-- FORMULARIO EN 2 COLUMNAS -->
    <form wire:submit="register">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Columna 1 -->
            <div class="flex flex-col gap-6">
                <!-- Name -->
                <flux:input
                    wire:model="name"
                    :label="__('Name')"
                    type="text"
                    required
                    autofocus
                    autocomplete="name"
                    :placeholder="__('Full name')"
                />

                <!-- Email Address -->
                <flux:input
                    wire:model="email"
                    :label="__('Email address')"
                    type="email"
                    required
                    autocomplete="email"
                    placeholder="email@example.com"
                />

                <!-- Password -->
                <flux:input
                    wire:model="password"
                    :label="__('Password')"
                    type="password"
                    required
                    autocomplete="new-password"
                    :placeholder="__('Password')"
                    viewable
                />

                <!-- Confirm Password -->
                <flux:input
                    wire:model="password_confirmation"
                    :label="__('Confirm password')"
                    type="password"
                    required
                    autocomplete="new-password"
                    :placeholder="__('Confirm password')"
                    viewable
                />


                <!-- Community -->
                <flux:select
                    wire:model="community_id"
                    label="{{ __('Comunidad') }}"
                    placeholder="{{ __('Selecciona tú Comunidad') }}"
                >
                    @foreach($communities as $community)
                        <flux:select.option value="{{ $community->id }}">
                            {{ $community->name }}
                        </flux:select.option>
                    @endforeach
                </flux:select>
            </div>

            <!-- Columna 2 -->
            <div class="flex flex-col gap-6">
                <!-- Region -->
                <flux:input
                    wire:model="region"
                    :label="__('Region')"
                    type="text"
                    :placeholder="__('Tú region')"
                />

                <!-- Specialty -->
                <flux:input
                    wire:model="specialty"
                    :label="__('Especialidad')"
                    type="text"
                    :placeholder="__('Tú Especialidad')"
                />

                <!-- Bio -->
                <flux:textarea
                    wire:model="bio"
                    :label="__('Bio')"
                    :placeholder="__('Sobre tí...')"
                    rows="3"
                />

                <!-- Role -->
                <flux:select
                    wire:model="role_id"
                    label="{{ __('Que quieres hacer?') }}"
                    placeholder="{{ __('Seleciona tú rol') }}"
                    description="{{ __('Visitante: Ver contenido. Contribuidor: Crear y compartir contenido.') }}"
                >
                    @foreach($roles as $role)
                        <flux:select.option value="{{ $role->id }}">
                            {{ __($role->name) }}
                        </flux:select.option>
                    @endforeach
                </flux:select>


            </div>
        </div>

        <!-- Submit button -->
        <div class="w-full max-w-md m-auto flex flex-col mt-5">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <!-- Link to login -->
    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>
