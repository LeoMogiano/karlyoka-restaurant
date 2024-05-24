<div>
    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            Detalles de la Factura
        </x-slot>

        <x-slot name="content">
            <div class="flex flex-col gap-2">
                <div>
                    <x-label value="nit/ci"></x-label>
                    <x-input type="text" wire:model="invoice.nit"></x-input>
                    @error('invoice.nit') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-label value="nombre"></x-label>
                    <x-input type="text" wire:model="invoice.nombre"></x-input>
                    @error('invoice.nombre') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex justify-end space-x-2">
                <x-secondary-button wire:click="$toggle('isOpen')" wire:loading.attr="disabled">
                    Cerrar
                </x-secondary-button>
                <x-button wire:click="createInvoice(true)" wire:loading.attr="disabled">
                    Imprimir Factura
                </x-button>
                <x-button wire:click="createInvoice" wire:loading.attr="disabled">
                    Crear Factura
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
