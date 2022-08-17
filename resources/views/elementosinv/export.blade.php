<table>
    <thead>
        <tr>
        <th>Nombre</th>
        <th>Placa interna</th>
        <th>Placa externa</th>
        <th>Serial</th>
        <th>Contrato reacionado</th>
        <th>Objeto Contractual</th>
        <th>Estado</th>
        <th>Observaciones</th>
        <th>Responsable</th>
        <th>Cantidad actual</th>
        <th>Cantidad total</th>
        <th>Precio unitario</th>
        <th>Precio Total</th>
        <th>Fecha Creacion</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($elementoinventarios as $elementoinventario)
            <tr>
                <td>{{ $elementoinventario->id }}</td>
                <td>{{ $elementoinventario->nombreelemento }}</td>
                <td>{{ $elementoinventario->placainterna }}</td>
                <td>{{ $elementoinventario->placaexterna }}</td>
                <td>{{ $elementoinventario->serial }}</td>
                <td>{{ $elementoinventario->numero }}</td>
                <td>{{ $elementoinventario->objetocontractual }}</td>
                <td>{{ $elementoinventario->nombreestado }}</td>
                <td>{{ $elementoinventario->observaciones }}</td>
                <td>{{ $elementoinventario->nombre }}</td>
                <td>{{ $elementoinventario->cantidad }}</td>
                <td>{{ $elementoinventario->cantidadtotal }}</td>
                <td>{{ $elementoinventario->preciounitario }}</td>
                <td>{{ $elementoinventario->preciototal }}</td>
                <td>{{ $elementoinventario->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

