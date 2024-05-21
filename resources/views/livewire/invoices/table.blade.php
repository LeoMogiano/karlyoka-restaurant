
<div class="table">
    <div class="overflow-x-auto">
        <table>
            <thead>
                <tr>
                    @foreach ($columns as $column)
                        <th>{{ $column }}</th>
                    @endforeach
                    <th>{{ 'Total del Pedido' }}</th>
                    <th>{{'Acciones'}}</th>
                </tr>
            </thead>
        
            <tbody class="text-sm divide-y divide-gray-100">
                @foreach ($invoices as $invoice)
                    <tr>
                        <td>
                            <div class="text-left">{{ $invoice->nit }}</div>
                        </td>
                        <td>
                            <div class="text-left">{{ $invoice->nombre }}</div>
                        </td>
                        <td>
                            <div class="text-left">{{ $invoice->fecha_emision }}</div>
                        </td>
                        <td>
                            <div class="text-left">{{ $invoice->pedido_id }}</div>
                        </td>
                        <td>
                            <div class="text-left">{{ $invoice->pedido->total }}</div>
                        </td>
                        <td>
                            <div>
                                {{-- <x-secondary-button wire:click="$emit('open-form', {{ $invoice->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                </x-secondary-button> --}}
                                <x-secondary-button wire:click="deleteInvoice({{ $invoice->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </x-secondary-button>
                                {{-- <x-secondary-button wire:click="$emit('show-invoice-details', {{ $invoice->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M12 2c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </x-secondary-button>   --}}
                                {{-- <x-secondary-button wire:click="showInvoiceDetails({{ $invoice->id }})">
                                    Ver Detalles
                                </x-secondary-button> --}}

                                <x-secondary-button wire:click="$emit('show-invoice-details', {{ $invoice->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M12 2c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    Ver Detalles2
                                </x-secondary-button>
                            </div>
                        </td>
                    </tr>
                @endforeach
              
            </tbody>
        </table>
        @if($confirmDeletionIsOpen)
        <x-confirmation-modal wire:model="confirmDeletionIsOpen">
            <x-slot name="title">
                Eliminar factura
            </x-slot>
            <x-slot name="content">
                ¿Estás seguro de eliminar la factura <span class="font-bold">{{ $invoiceSelected['nombre'] }}</span>?
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmDeletionIsOpen')" wire:loading.attr="disabled">
                    Cancelar
                </x-secondary-button>
                <x-danger-button class="ml-2" wire:click="confirmInvoiceDeletion({{ $invoiceSelected['id'] }})" wire:loading.attr="disabled">
                    Eliminar
                </x-danger-button>
            </x-slot>
        </x-confirmation-modal>
    @endif
    </div>
</div>

{{-- @push('scripts')
    <script>
        Livewire.on('load-invoice-details', invoiceId => {
            Livewire.emit('show-invoice-details', invoiceId);
        });
    </script>
@endpush --}}

{{-- 
<script>
    Livewire.on('load-invoice-details', invoiceId => {
        Livewire.emit('show-invoice-details', invoiceId);
    });
</script> --}}
