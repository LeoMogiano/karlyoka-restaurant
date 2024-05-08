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
                    
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
