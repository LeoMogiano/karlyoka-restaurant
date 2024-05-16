<div class="w-full lg:w-3/5 mx-auto flex flex-col gap-5">

    <div class="flex justify-between">
        <div class="flex gap-4">
            <h2 class="text-2xl font-bold">{{'Usuarios'}}</h2>
            @if(\Illuminate\Support\Facades\Auth::user()->rol == \App\enums\UserType::Administrador->value)
                <x-button wire:click="$emit('open-form', null)">
                    {{'Crear'}}
                </x-button>
            @endif
        </div>
        <x-input wire:input="$emit('user-search', $event.target.value)" type="search" placeholder="Buscar por nombre, apellido o correo" class="w-96"></x-input>
    </div>

    <livewire:users.table/>
    <livewire:users.create-or-update/>
</div>
