
    <div class="table">
        <div class="overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        @foreach ($columns as $column)
                            <th>{{ $column }}</th>
                        @endforeach
                        <th>{{'Acciones'}}</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                <div class="text-left">{{ $product->nombre }}</div>
                            </td>
                            <td>
                                <div class="text-left">{{ $product->descripcion }}</div>
                            </td>
                            <td>
                                <div class="text-left">{{ $product->precio }}</div>
                            </td>
                            <td>
                                <div class="text-left">{{ $product->stock }}</div>
                            </td>
                            <td>
                                <div class="text-left">{{ $product->image_url }}</div> 
                            <td>
                                <div class="text-left">{{ $product->categoria->nombre }}</div>
                            </td>
                            <td>
                                <div>
                                    <x-secondary-button wire:click="$emit('open-form', {{$product->id}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    </x-secondary-button>
                                    <x-secondary-button wire:click="deleteProducts({{ $product }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </x-secondary-button>
                                </div>
                            </td>
                                
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($productSelected)
                <x-confirmation-modal wire:model="confirmDeletionIsOpen">
                    <x-slot name="title">
                        Eliminar producto
                    </x-slot>
                    <x-slot name="content">
                        ¿Estas seguro de eliminar la producto <span class="font-bold">{{ $productSelected['nombre'] }}</span>?
                    </x-slot>
                    <x-slot name="footer">
                        <x-secondary-button wire:click="$toggle('deleteProducts')" wire:loading.attr="disabled">
                        Cancelar
                        </x-secondary-button>
                        <x-danger-button class="ml-2" wire:click="deleteProducts({{ $productSelected['id'] }})" wire:loading.attr="disabled">
                        Eliminar
                        </x-danger-button>
                    </x-slot>
                </x-confirmation-modal>
            @endif
        </div>
    </div>

