<div class="py-12">
    <div class="max-w-7x1 mx-auto sm:px6 lg:px-8">
        <div class="container mx-auto mt-4">
            @livewire('search-bar')
        </div>
        <div class="bg-indigo-600 overflow-hidden shadow-xl sm: rounded- 1g px-4 py-4">

            <button wire:click="crear()" class="bg-indigo-500 text-white font-bold py-4 px-4 my-3 rounded">
                Crear Producto
            </button>

            @if ($modal)
                @include('livewire.crear')
            @endif

            <table class="table-fixed w-full px-2">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Apellido</th>
                        <th class="px-4 py-2">Fecha Nacimiento</th>
                        <th class="px-4 py-2">Direccion</th>
                        <th class="px-4 py-2">No.Telefono</th>
                        <th class="px-4 py-2">Correo Electronico</th>
                        <th class="px-4 py-2">Historial Medico</th>
                        <th class="px-4 py-2">Acciones</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <td class="text-white border px-4 py-2">{{ $paciente->id }}</td>
                            <td class="text-white border px-4 py-2">{{ $paciente->nombre }}</td>
                            <td class="text-white border px-4 py-2">{{ $paciente->apellido }}</td>
                            <td class="text-white border px-4 py-2">{{ $paciente->f_nacimiento }}</td>
                            <td class="text-white border px-4 py-2">{{ $paciente->direccion }}</td>
                            <td class="text-white border px-4 py-2">{{ $paciente->telefono }}</td>
                            <td class="text-white border px-4 py-2">{{ $paciente->correo }}</td>
                            <td class="text-white border px-4 py-2">{{ $paciente->h_medico }}</td>
                            <td class="text-white border px-4 py-2 text-center">
                                <button wire:click="editar({{$paciente->id}})" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4">Editar</button>
                                <button wire:click="borrar({{$paciente->id}})" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4">Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                <tbody>

            </table>
        </div>
    </div>
</div>
