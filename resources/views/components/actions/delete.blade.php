@can($ability)
    <form method="POST" action="{{ $action }}" class="d-inline delete-form">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-sm btn-danger">
            <i class="fa fa-trash-alt"></i>
        </button>
    </form>
@endcan
