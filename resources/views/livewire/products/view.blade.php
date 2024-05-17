<div class="w-full lg:w-3/5 mx-auto flex flex-col gap-5">

    <div class="flex justify-between">
        <div class="flex gap-4">
            <h2 class="text-2xl font-bold">{{'Productos'}}</h2>
            <x-button wire:click="$emit('open-form', null)">
                {{'Crear'}}
            </x-button>
            
        </div>
        <x-input wire:input="$emit('product-loaded', $event.target.value)" type="search" placeholder="Buscar por nombre o descripción" class="w-full ml-2 border border-gray-300 rounded"></x-input>
    </div>
  
    <livewire:products.table />
    <livewire:products.create-or-update />
</div>
