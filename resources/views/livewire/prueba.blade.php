<div>
    <input type="text" wire:model='categoria.descripcion'>
    <button type="button" wire:click='guardado()'>Guardar</button>
    {{$categoria->descripcion}}
</div>
