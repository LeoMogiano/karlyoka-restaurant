<div>
    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            {{ $action == \App\Enums\ActionType::Create->value ? 'Crear categoría' : 'Actualizar categoría' }}
        </x-slot>

        <x-slot name="content">
            <form class="flex flex-col gap-2">
                <div>
                    <x-label value="Nombre"></x-label>
                    <x-input type="text" wire:model="category.nombre" maxlength="15"></x-input>
                    @error('category.nombre') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-label value="Descripción"></x-label>
                    <x-input type="text" wire:model="category.descripcion" maxlength="100">></x-input>
                    @error('category.descripcion') <span class="error">{{ $message }}</span> @enderror
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <div class="space-x-2">
                <x-secondary-button wire:click="$toggle('isOpen')" wire:loading.attr="disabled">
                    Cancelar
                </x-secondary-button>

                <x-button wire:click="save" wire:loading.attr="disabled" autofocus>
                    {{ $action == \App\Enums\ActionType::Create->value ? 'Crear' : 'Actualizar' }}
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
