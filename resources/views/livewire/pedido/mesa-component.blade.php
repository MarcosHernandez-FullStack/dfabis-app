<div>
    <div class="row" align="center">
    @foreach ($mesas as $mesa)
        <div class="col-2">
            <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                <a href="{{route('pedidoform', ['mesa_id' => $mesa->id])}}">Mesa {{ $mesa->numero }}</a>
            </div>
        </div>
    @endforeach
    </div>
</div>
