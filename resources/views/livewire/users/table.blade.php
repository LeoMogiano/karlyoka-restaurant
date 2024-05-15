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
            @foreach ($users as $user)
                <tr>

                    <td>
                        <div class="text-left">{{ $user->email }}</div>
                    </td>
                    <td>
                        <div class="text-left">{{ $user->name }}</div>
                    </td>
                    <td>
                        <div class="text-left">{{ $user->apellidos }}</div>
                    </td>
                    <td>
                        <div class="text-left">{{ $user->rol }}</div>
                    </td>
                    <td>
                        <div>
                            <x-button wire:click="deleteUser({{ $user }})">eliminar</x-button>
                            <x-button>actualizar</x-button>
                        </div>
                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>

        @if($userSelected)
            <x-confirmation-modal wire:model="confirmDeletionIsOpen">
                <x-slot name="title">
                    Eliminar usuario
                </x-slot>

                <x-slot name="content">
                    ¿Estas seguro de eliminar al usuario <span class="font-bold">{{ $userSelected['name'] }}</span>?
                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button wire:click="$toggle('confirmDeletionIsOpen')" wire:loading.attr="disabled">
                        Cancelar
                    </x-secondary-button>

                    <x-danger-button class="ml-2" wire:click="confirmUserDeletion({{ $userSelected['id'] }})" wire:loading.attr="disabled">
                        Eliminar
                    </x-danger-button>
                </x-slot>
            </x-confirmation-modal>
        @endif
    </div>
</div>
