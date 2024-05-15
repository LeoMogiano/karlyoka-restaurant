
    <div class="table">
        <div class="overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        @foreach ($columns as $column)
                            <th>{{ $column }}</th>
                        @endforeach
                    </tr>
                    <th>{{'Acciones'}}</th>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                <div class="text-left">{{ $category->nombre }}</div>
                            </td>
                            <td>
                                <div class="text-left">{{ $category->descripcion }}</div>
                            </td>
                            <td>
                                <div>
                                    <x-button wire:click="deleteCategory({{ $category }})">Eliminar</x-button>
                                    <x-button>Actualizar</x-button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($categorySelected)
                <x-confirmation-modal wire:model="confirmDeletionIsOpen">
                    <x-slot name="title">
                        Eliminar usuario
                    </x-slot>
                    <x-slot name="content">
                        ¿Estas seguro de eliminar la categoría <span class="font-bold">{{ $categorySelected['nombre'] }}</span>?
                    </x-slot>
                    <x-slot name="footer">
                        <x-secondary-button wire:click="$toggle('confirmDeletionIsOpen')" wire:loading.attr="disabled">
                        Cancelar
                        </x-secondary-button>
                        <x-danger-button class="ml-2" wire:click="confirmUserDeletion({{ $categorySelected['id'] }})" wire:loading.attr="disabled">
                        Eliminar
                        </x-danger-button>
                    </x-slot>
                </x-confirmation-modal>
            @endif
        </div>
    </div>

