<div>
    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            Crear usuario
        </x-slot>

        <x-slot name="content">
            <form class="flex flex-col gap-2">
                <div>
                    <x-label value="Nombres"></x-label>
                    <x-input type="text" wire:model="user.name"></x-input>
                    @error('user.name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-label value="Apellidos"></x-label>
                    <x-input type="text" wire:model="user.apellidos"></x-input>
                    @error('user.apellidos') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-label value="Rol"></x-label>
                    <select wire:model="user.rol">
                        <option value="{{null}}">{{'Selecciona una opción'}}</option>
                        <option value="cajero">{{'Cajero'}}</option>
                        <option value="dueño">{{'Dueño'}}</option>
                    </select>
                    @error('user.rol') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-label value="Correo"></x-label>
                    <x-input type="email" wire:model="user.email" autocomplete="on"></x-input>
                    @error('user.email') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-label value="Contraseña"></x-label>
                    <x-input type="password" wire:model="password"></x-input>
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
            </form>
        </x-slot>


        <x-slot name="footer">
            <div class="space-x-2">
                <x-secondary-button wire:click="$toggle('isOpen')" wire:loading.attr="disabled">
                    Cancelar
                </x-secondary-button>

                <x-button wire:click="save" wire:loading.attr="disabled" autofocus>
                    Crear
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
