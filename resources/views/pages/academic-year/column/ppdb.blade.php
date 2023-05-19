@can($ability)
    @if($academicYear->ppdb)
        <form action="{{ route('admin.academic-years.status', $academicYear->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <button class="btn btn-warning"><i class="fa fa-user"></i></button>
        </form>
    @else
        <form action="{{ route('admin.academic-years.status', $academicYear->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <button class="btn btn-success"><i class="fa fa-checked"></i></button>
        </form>
    @endif
@else
    <span @class([
    'btn disabled',
    'btn-success' => $academicYear->ppdb,
    'btn-danger' => !$academicYear->ppdb,
    ])>{{ $academicYear->ppdb ? 'Aktif' : 'Non-aktif' }}</span>
@endcan
