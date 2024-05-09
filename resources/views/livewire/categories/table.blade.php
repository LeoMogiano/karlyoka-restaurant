<div class="flex flex-col justify-center h-full">
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
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                <div class="text-left">{{ $category->nombre }}</div>
                            </td>
                            <td>
                                <div class="text-left">{{ $category->descripcion }}</div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
