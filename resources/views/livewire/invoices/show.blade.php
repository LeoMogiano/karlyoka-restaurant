<div>
    {{-- @dump($invoice) --}}
    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            Detalles de la Factura
        </x-slot>

        <x-slot name="content">
            <div class="flex flex-col gap-2">
                <div>
                    <x-label for="nit" value="NIT" />
                    <x-input id="nit" type="text" wire:model="invoice.nit" readonly />
                </div>
                <div>
                    <x-label for="nombre" value="Nombre" />
                    <x-input id="nombre" type="text" wire:model="invoice.nombre" readonly />
                </div>
                <div>
                    <x-label for="fecha_emision" value="Fecha de Emisión" />
                    <x-input id="fecha_emision" type="text" wire:model="invoice.fecha_emision" readonly />
                </div>
                <!-- Agrega más detalles de la factura según sea necesario -->
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex justify-end space-x-2">
                <x-secondary-button wire:click="$toggle('isOpen')" wire:loading.attr="disabled">
                    Cerrar
                </x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
