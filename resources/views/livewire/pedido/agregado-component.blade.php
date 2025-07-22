<div>
    <form class="needs-validation" novalidate="">
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Row-->
            <div class="row g-3">
                <!--begin::Col-->
                <div class="col-md-3"> <label for="validationCustom04" class="form-label">Productos<span
                            class="required-indicator sr-only"> (required)</span></label> <select class="form-select"
                        id="validationCustom04" wire:model="agregado.producto_id">
                        <option value="">-Seleccionar-</option>
                        @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}">{{$producto->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-md-1">
                    <label for="validationCustom01" class="form-label">
                        <Ri:a>Cantidad</Ri:a><span class="required-indicator sr-only"> (required)</span>
                    </label>
                    <input type="text" class="form-control" id="validationCustom01" wire:model="agregado.cantidad">
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-1">
                    <br>
                    <button type="button" class="btn btn-md btn-icon btn-success" wire:click='save'>
                        + Agregar
                    </button>
                </div>
                <!--end::Col-->
              

                <!--begin::Col-->
                <div class="col-md-12">
                    <table class="table" role="table">
                        <thead>
                            <tr>
                                <th style="width: 10px" scope="col">#</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Costo</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($detalle_pedido->agregados as $key => $agregado)
                            <tr >
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $agregado->nombre }}</td>
                                <td>{{ $agregado->pivot->precio }}</td>
                                <td>{{ $agregado->pivot->cantidad }}</td>
                                <td>
                                    <button type='button' class='btn btn-danger'  wire:click="delete({{$agregado->id}})">
                                        Eliminar
                                    </button>
                                </td>
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
            <!--end::Row-->
        </div>
        <!--end::Body-->
        <!--begin::Footer-->
       {{--  <div class="card-footer"> <button class="btn btn-info" type="button" wire:click='save'>Guardar</button> </div> --}}
        <!--end::Footer-->
    </form>
</div>