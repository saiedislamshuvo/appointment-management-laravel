<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @foreach ($items ?? [] as $li)
                        <li class="breadcrumb-item"><a href="{{ $li['route'] ?? '#' }}">{{ $li['title'] ?? '' }}</a>
                        </li>
                    @endforeach
                    <li class="breadcrumb-item active">{{ $title ?? '' }}</li>
                </ol>
            </div>
            <h4 class="page-title">{{ $title ?? '' }}</h4>
        </div>
    </div>
</div>
