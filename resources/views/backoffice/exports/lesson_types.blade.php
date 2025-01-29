<table>
    <thead>
        <tr>
            <th>{{ __('Nombre') }}</th>
            <th>{{ __('Activo') }}</th>
            <th>{{ __('Fecha alta') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lessonTypes as $lessonType)
            <tr>
                <td>{{ $lessonType->name }}</td>
                <td>{{ $lessonType->is_active ? 'Sí' : 'No' }}</td>
                <td>{{ $lessonType->created_at->isoFormat('LL') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
