<table>
    <thead>
        <tr>
            <th>{{ __('Nombre') }}</th>
            <th>{{ __('Descripción') }}</th>
            <th>{{ __('Activa') }}</th>
            <th>{{ __('Fecha alta') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->is_active ? __('Sí') : __('No') }}</td>
                <td>{{ $category->created_at->isoFormat('LL') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
