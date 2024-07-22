<div>
    <input type="text" wire:model="search" placeholder="Buscar paciente..." class="border rounded p-2 w-full">

    @if ($results)
        <ul class="mt-2 border rounded p-2">
            @forelse ($results as $result)
                <li class="p-1 border-b last:border-b-0">{{ $result->nombre }}</li>
            @empty
                <li class="p-1">No se encontraron pacientes que coincidan con la busqueda</li>
            @endforelse
        </ul>
    @endif
</div>
