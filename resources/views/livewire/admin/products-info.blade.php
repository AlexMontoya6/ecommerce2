<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-600">
                Lista de productos
            </h2>
            <x-button-link class="ml-auto" href="{{ route('admin.products.create') }}">
                Agregar producto
            </x-button-link>
        </div>
    </x-slot>

    <div class="container-menu py-12">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <x-table-responsive>
                            <h1>PROBANDO ESTA MIERDAS</h1>
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label>
                                    Marcas
                                </x-jet-label>

                                <div class="grid grid-cols-4">
                                    @foreach ($brands as $brand)
                                        <x-jet-label>
                                            <x-jet-checkbox wire:model.defer="createForm.brands" name="brands[]"
                                                value="{{ $brand->id }}" />
                                            {{ $brand->name }}
                                        </x-jet-label>
                                    @endforeach
                                </div>
                                <x-jet-input-error for="createForm.brands" />
                            </div>
                            <h1>PROBANDO ESTA MIERDAS</h1>
                            <div class="px-6 py-4">
                                <x-jet-input class="w-full" wire:model="search" type="text"
                                    placeholder="Introduzca el nombre del producto a buscar" />
                            </div>

                            @if ($products->count())
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>

                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nombre
                                            </th>

                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Categoría
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Estado
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Precio
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Marca
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Subcategorías
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Fecha de creación
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Colores/Tallas/Stock
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Editar</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($products as $product)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10 object-cover">
                                                            <img class="h-10 w-10 rounded-full"
                                                                src="{{ $product->images->count() ? Storage::url($product->images->first()->url) : 'img/default.jpg' }}"
                                                                alt="">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $product->name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $product->subcategory->category->name }}</div>
                                                    <div class="text-sm text-gray-500">{{ $product->subcategory->name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $product->status == 1 ? 'red' : 'green' }}-100 text-{{ $product->status == 1 ? 'red' : 'green' }}-800">
                                                        {{ $product->status == 1 ? 'Borrador' : 'Publicado' }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $product->price }} &euro;
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $product->brand->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $product->subcategory->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $product->created_at }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    @if ($product->sizes->count() > 0)
                                                        @foreach ($product->sizes as $size)
                                                            <strong>{{ $size->name }}:</strong>
                                                            <br>

                                                            @foreach ($size->colors as $color)
                                                                [{{ $color->name }}]:
                                                                {{ $color->pivot->quantity }}
                                                            @endforeach
                                                            <br>
                                                        @endforeach
                                                    @else
                                                        @if ($product->colors->count() > 0)
                                                            @foreach ($product->colors as $color)
                                                                [{{ $color->name }}]
                                                                {{ $color->pivot->quantity }}
                                                            @endforeach
                                                        @endif
                                                    @endif

                                                    @if ($product->sizes->count() == 0 && $product->colors->count() == 0)
                                                        {{ $product->quantity }}
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="{{ route('admin.products.edit', $product) }}"
                                                        class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="px-6 py-4">
                                    No existen productos coincidentes
                                </div>
                            @endif
                            @if ($products->hasPages())
                                <div class="px-6 py-4">
                                    {{ $products->links("pagination::tailwind") }}
                                </div>
                            @endif
                        </x-table-responsive>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
