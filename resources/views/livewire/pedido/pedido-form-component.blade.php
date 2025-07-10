<div>
    <form class="needs-validation" novalidate="">
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Row-->
            <div class="row g-3">
                <!--begin::Col-->
                <div class="col-md-3">
                    <label for="validationCustom01" class="form-label">
                        <Ri:a>Referencia Cliente</Ri:a><span class="required-indicator sr-only"> (required)</span>
                    </label>
                    <input type="text" class="form-control" id="validationCustom01" wire:model="pedido.cliente_referencia">
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-9"> 
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-3"> <label for="validationCustom04" class="form-label">Productos<span
                            class="required-indicator sr-only"> (required)</span></label> <select class="form-select"
                        id="validationCustom04" wire:model="detalle.producto_id">
                        <option value="">-Seleccionar-</option>
                        @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->unidad->nombre}} {{$producto->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-md-1">
                    <label for="validationCustom01" class="form-label">
                        <Ri:a>Cantidadd</Ri:a><span class="required-indicator sr-only"> (required)</span>
                    </label>
                    <input type="text" class="form-control" id="validationCustom01" wire:model="detalle.cantidad">
                </div>
                <!--end::Col-->
                 <!--begin::Col-->
                <div class="col-md-4"> <label for="validationCustom04" class="form-label">Cremas<span
                            class="required-indicator sr-only"> (required)</span></label> <select class="form-select"
                        id="validationCustom04">
                        <option selected="" disabled="" value="">-Seleccionar-</option>
                        @foreach ($cremas as $crema)
                        <option value="{{ $crema->id }}">{{$crema->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <!--end::Col-->
                  <!--begin::Col-->
                <div class="col-md-3">
                    <label for="validationCustom01" class="form-label">
                        <Ri:a>Observación</Ri:a><span class="required-indicator sr-only"> (required)</span>
                    </label>
                    <input type="text" class="form-control" id="validationCustom01">
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-1">
                    <br>
                    <button type="button" class="btn btn-md btn-icon btn-success" wire:click='addPedidoDetalle'>
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
                                <th scope="col">Agregado</th>
                                <th scope="col">Cremas</th>
                                <th scope="col">Observación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($detalle_pedido as $key => $ped_detalle)
                          {{--   @php
                                $total = $total + $ped_detalle->precio_kg * $ped_detalle->peso;
                            @endphp --}}
                            <tr >
                                <td>--</td>
                                <td>{{ $ped_detalle->producto->nombre}}</td>
                                <td>S/. {{ $ped_detalle->producto->precio}}</td>
                                <td>{{ $ped_detalle->cantidad}}</td>
                                <td><button type='button' class='btn btn-warning'>Agregado</button></td>
                                <td><button type='button' class='btn btn-info'>Cremas</button></td>
                              
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
            <!--end::Row-->
        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer"> <button class="btn btn-info" type="button" wire:click='save'>Guardar</button> </div>
        <!--end::Footer-->
    </form>
</div>