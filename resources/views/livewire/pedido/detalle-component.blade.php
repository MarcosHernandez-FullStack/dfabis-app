<div>
     <!--begin::Col-->
    <div class="col-md-12">
        <table class="table" role="table">
            <thead>
                <tr>
                    <th style="width: 10px" scope="col">#</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Acciones</th>
                    <th scope="col">Agregados</th>
                    <th scope="col">Cremas</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pedido->detalles_pedido as $key => $ped_detalle)
                {{--   @php
                    $total = $total + $ped_detalle->precio_kg * $ped_detalle->peso;
                @endphp --}}
                <tr >
                    <td>--</td>
                    <td>{{ $ped_detalle->producto->nombre}}</td>
                    <td><button type='button' class='btn btn-warning'>Agregado</button></td>
                    <td>{{ $ped_detalle->agregados->pluck('nombre')->implode(', ') }}</td>
                    <td>
                        <div class="form-check">
                        @forelse($cremas as $key => $crema)
                            <input class="form-check-input" 
                             type="checkbox"
                             value="{{$crema->id}}"
                             id="crema-{{ $ped_detalle->id }}-{{ $crema->id }}"
                             wire:change="saveCrema({{$ped_detalle->id}},$event.target.value)"
                             @checked( $ped_detalle->cremas->contains($crema->id) )
                             >
                            <label class="form-check-label" for="flexCheckChecked">
                                {{$crema->nombre}}
                            </label>
                            </div>
                         @empty
                        @endforelse
                    </td>


                   {{--  <td>{{ $ped_detalle->cremas->pluck('nombre')->implode(', ')}}</td> --}}
                    {{--   <td >
                        <div class="flex align-items-center">
                            <button type="button" class="btn btn-sm btn-icon btn-danger"
                                wire:click='removepedido_detalle({{ $key }},{{ $ped_detalle->id ?? 0 }})'>
                                <i class="fas fa-trash"></i>
                                Eliminar
                            </button>
                        </div>
                    </td> --}}
                </tr>
            @empty
                <tr>
                    <td colspan="8" >No hay registros</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <!--end::Col-->

</div>
