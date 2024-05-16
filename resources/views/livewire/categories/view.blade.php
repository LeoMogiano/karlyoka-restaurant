<div class="w-full lg:w-3/5 mx-auto flex flex-col gap-5">

    <div class="flex justify-between">
        <h2 class="text-2xl font-bold">{{'Categorías'}}</h2>
        <x-button wire:click="$emit('open-form', null)">
            {{'Crear'}}
        </x-button>
    </div>
  
    <livewire:categories.table />
    <livewire:categories.create-or-update />
</div>
