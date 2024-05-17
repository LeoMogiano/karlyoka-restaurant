<div>
    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            {{ $action == \App\Enums\ActionType::Create->value ? 'Crear producto' : 'Actualizar producto' }}
        </x-slot>

        <x-slot name="content">
            <form class="flex flex-col gap-2">
                <div>
                    <x-label value="Nombre"></x-label>
                    <x-input type="text" wire:model="product.nombre"></x-input>
                    @error('product.nombre') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-label value="Descripción"></x-label>
                    <x-input type="text" wire:model="product.descripcion"></x-input>
                    @error('product.descripcion') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-label value="Precio"></x-label>
                    <x-input type="number" wire:model="product.precio"></x-input>
                    @error('product.precio') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-label value="Stock"></x-label>
                    <x-input type="number" wire:model="product.stock"></x-input>
                    @error('product.stock') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-label value="Imagen"></x-label>
                    <x-input type="text" wire:model="product.image_url"></x-input>
                    @error('product.image_url') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-label value="Categoría"></x-label>
                    <select wire:model="product.categoria_id">
                        <option value="">Selecciona una categoría</option>
                        @foreach($categoriesOptions as $category)
                            <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                        @endforeach
                    </select>
                    @error('product.categoria_id') <span class="error">{{ $message }}</span> @enderror
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
