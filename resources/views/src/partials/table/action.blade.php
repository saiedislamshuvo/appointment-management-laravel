<div class="d-flex">
    @if ($destroyRoute)
        <a @if ($destoryWarningText) onclick="return confirm(`{{ $destoryWarningText }}`)" @endif
            href="{{ $destroyRoute }}" class="btn btn-danger shadow btn-xs sharp me-1">
            <i class="dripicons-trash"></i>
        </a>
    @endif
</div>
