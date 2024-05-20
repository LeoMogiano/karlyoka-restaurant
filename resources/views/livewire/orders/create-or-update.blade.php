<div>
    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            {{ $action == \App\Enums\ActionType::Create->value ? 'Crear Orden' : 'Actualizar Orden' }}
        </x-slot>

        <x-slot name="content">
            <form class="flex flex-col gap-2">
              @if(count($productsOptions) > 0)
                  @foreach ($productsOptions as $product)
                      <div class="border p-2 rounded shadow-md flex items-center justify-between">
                          <div>
                            
                              <h2 class="text-sm font-bold">{{ $product->nombre }}</h2>
                              <p class="text-xs text-gray-500">{{ $product->descripcion }}</p>
                              <p class="text-sm text-gray-700">Precio: {{ $product->precio }} BS</p>
                          </div>
                          <div class="flex items-center">
                              <button wire:click.prevent="incrementCount({{ $product->id }}, false)"
                                  class="border rounded px-1 py-1">-</button>
                                  <input id="count{{ $product->id }}" type="text" min="0"
                                  class="border rounded px-1 py-1 w-8" 
                                  value="{{ $pedido_productos[$product->id] ?? 0 }}" disabled>
                                  <button wire:click.prevent="incrementCount({{ $product->id }}, true)"
                                      class="border rounded px-1 py-1">+</button>
                          </div>
                          
                      </div>
                  @endforeach
              @else
                  <div class="text-center">
                      <p class="text-4xl">😞</p>
                      <p class="text-gray-500">No hay productos disponibles en este momento.</p>
                  </div>
              @endif

            </form>
        </x-slot>
        <x-slot name="footer">
            <div class="flex justify-between space-x-2"> <!-- Añade la clase 'justify-between' para separar los elementos -->
                <span class="text-lg font-bold">Total: {{ $order->total ?? 0 }} BS</span> <!-- Usa el operador de coalescencia nula -->
        
                <div class="flex space-x-2"> <!-- Añade un div para agrupar los botones -->
                    <x-secondary-button wire:click="$toggle('isOpen')" wire:loading.attr="disabled">
                        Cancelar
                    </x-secondary-button>
        
                    <x-button wire:click="save" wire:loading.attr="disabled" autofocus>
                        {{ $action == \App\Enums\ActionType::Create->value ? 'Crear' : 'Actualizar' }}
                    </x-button>
                    
                </div>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
