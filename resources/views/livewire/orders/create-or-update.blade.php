<div>
    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            {{ $action == \App\Enums\ActionType::Create->value ? 'Crear Orden' : 'Actualizar Orden' }}
        </x-slot>

        <x-slot name="content">
            <form class="flex flex-col gap-2">

                {{--  // poner cards de productos con cantidad --}}


                @foreach ($productsOptions as $product)
                    <div class="border p-2 rounded shadow-md flex items-center justify-between">
                        <div>
                            <h2 class="text-sm font-bold">{{ $product->nombre }}</h2>
                            <p class="text-xs text-gray-500">{{ $product->descripcion }}</p>
                        </div>
                        <div class="flex items-center">
                            <button onclick="decrementCount('count{{ $product->id }}')"
                                class="border rounded px-1 py-1">-</button>
                            <input id="count{{ $product->id }}" type="number" min="0"
                                class="border rounded px-1 py-1 w-8" value="0">
                            <button onclick="incrementCount('count{{ $product->id }}')"
                                class="border rounded px-1 py-1">+</button>
                        </div>
                    </div>
                @endforeach

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
