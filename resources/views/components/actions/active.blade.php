@can($ability)
    <form method="POST" action="{{ $action }}" class="d-inline active-form">
        @csrf
        @method('PATCH')

        <button type="submit"
            @class(['btn btn-sm', 'btn-success' => !$active, 'btn-danger' => $active]) {{ $disabled ? 'disabled' : '' }}>
            <i @class([$activeIcon => !$active, $defaultIcon => $active])></i>
        </button>
    </form>
@endcan
