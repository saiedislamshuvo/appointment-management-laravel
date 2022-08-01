<div class="d-flex">
    @if ($checkedRoute ?? false)
        <a href="{{ $checkedRoute }}" class="btn btn-primary shadow btn-xs sharp me-1">
            <i class="dripicons-checkmark"></i>
        </a>
    @endif
    @if ($editRoute ?? false)
        <a href="{{ $editRoute }}" class="btn btn-warning shadow btn-xs sharp me-1">
            <i class="dripicons-document-edit"></i>
        </a>
    @endif
    @if ($destroyRoute ?? false)
        <a @if ($destoryWarningText ?? false) onclick="return confirm(`{{ $destoryWarningText }}`)" @endif
            href="{{ $destroyRoute }}" class="btn btn-danger shadow btn-xs sharp me-1">
            <i class="dripicons-trash"></i>
        </a>
    @endif
</div>
