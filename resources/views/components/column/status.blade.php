<div>
    <span @class([
        'badge',
        'badge-success' => $status,
        'badge-danger' => !$status,
    ])>
        <i @class([
            'fa',
            'fa-check' => $status,
            'fa-times' => !$status,
        ])></i>
    </span>
</div>
