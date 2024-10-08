
<div class="table">
    <div class="overflow-x-auto">
        <table>
            <thead>
                <tr>
                    @foreach ($columns as $column)
                        <th>{{ $column }}</th>
                    @endforeach
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
                            <div class="text-left">{{ $invoice->pedido->nro }}</div>
                        </td>
                        <td>
                            <div class="text-left">{{ $invoice->pedido->total }} Bs</div>
                        </td>
                        <td>
                            <div>
                               
                                <x-secondary-button wire:click="$emit('download-invoice', {{ $invoice->id }})">

                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 20 20" version="1.1">
    
                                        <title>file_pdf [#1754]</title>
                                     
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Dribbble-Light-Preview" transform="translate(-340.000000, -1279.000000)" fill="#000000">
                                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                                    <path d="M303.7144,1125.149 L298.2594,1119.364 C298.0704,1119.165 297.8034,1119.001 297.5294,1119.001 L285.9794,1119.001 C284.8744,1119.001 284.0004,1120.001 284.0004,1121.105 L284.0004,1128.105 C284.0004,1128.657 284.4374,1129.001 284.9894,1129.001 L284.9944,1129.001 C285.5474,1129.001 286.0004,1128.657 286.0004,1128.105 L286.0004,1122.105 C286.0004,1121.553 286.4274,1121.001 286.9794,1121.001 L296.0004,1121.001 L296.0004,1125.105 C296.0004,1126.21 296.8744,1127.001 297.9794,1127.001 L302.0004,1127.001 L302.0004,1128.105 C302.0004,1128.657 302.4374,1129.001 302.9894,1129.001 L302.9944,1129.001 C303.5474,1129.001 304.0004,1128.657 304.0004,1128.105 L304.0004,1125.838 C304.0004,1125.581 303.8914,1125.335 303.7144,1125.149 L303.7144,1125.149 Z M287.9794,1134.105 C287.9794,1133.553 287.5314,1133.105 286.9794,1133.105 L285.9794,1133.105 L285.9794,1135.105 L286.9794,1135.105 C287.5314,1135.105 287.9794,1134.657 287.9794,1134.105 L287.9794,1134.105 Z M289.9754,1133.839 C290.0654,1135.569 288.6894,1137.001 286.9794,1137.001 L286.0004,1137.001 L286.0004,1138.105 C286.0004,1138.657 285.5474,1139.001 284.9944,1139.001 L284.9894,1139.001 C284.4374,1139.001 284.0004,1138.657 284.0004,1138.105 L284.0004,1132.105 C284.0004,1131.553 284.4274,1131.001 284.9794,1131.001 L286.8094,1131.001 C288.4344,1131.001 289.8904,1132.217 289.9754,1133.839 L289.9754,1133.839 Z M295.0004,1134.105 C295.0004,1133.553 294.5314,1133.001 293.9794,1133.001 L293.0004,1133.001 L293.0004,1137.001 L293.9794,1137.001 C294.5314,1137.001 295.0004,1136.657 295.0004,1136.105 L295.0004,1134.105 Z M297.0004,1134.001 L297.0004,1136.001 C297.0004,1137.651 295.6504,1139.001 294.0004,1139.001 L291.8954,1139.001 C291.4004,1139.001 291.0004,1138.6 291.0004,1138.105 L291.0004,1131.98 C291.0004,1131.439 291.4384,1131.001 291.9794,1131.001 L294.0004,1131.001 C295.6504,1131.001 297.0004,1132.351 297.0004,1134.001 L297.0004,1134.001 Z M304.0004,1132.027 L304.0004,1132.053 C304.0004,1132.605 303.5314,1133.001 302.9794,1133.001 L300.0004,1133.001 L300.0004,1135.001 L302.9794,1135.001 C303.5314,1135.001 304.0004,1135.474 304.0004,1136.027 L304.0004,1136.053 C304.0004,1136.605 303.5314,1137.001 302.9794,1137.001 L300.0004,1137.001 L300.0004,1138.105 C300.0004,1138.657 299.5474,1139.001 298.9944,1139.001 L298.9894,1139.001 C298.4374,1139.001 298.0004,1138.657 298.0004,1138.105 L298.0004,1132.105 C298.0004,1131.553 298.4274,1131.001 298.9794,1131.001 L302.9794,1131.001 C303.5314,1131.001 304.0004,1131.474 304.0004,1132.027 L304.0004,1132.027 Z" id="file_pdf-[#1754]"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>                              
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