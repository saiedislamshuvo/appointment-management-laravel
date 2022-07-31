@extends('src.layouts.app')

@section('title', 'Appearance Setting')

@section('contents')
    @include('src.layouts.partials.breadcrumb', [
        'title' => 'Appearance Setting',
        'items' => [['title' => 'Dashboard', 'route' => route('dashboard')]],
    ])
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="list-group list-group-flush font-15" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="list-group-item list-group-item-action border-0 active" id="v-pills-general-tab"
                            data-bs-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general"
                            aria-selected="true">
                            <i class='mdi mdi-application font-16 me-1'></i> General</a>
                        <a class="list-group-item list-group-item-action border-0" id="v-pills-logo-tab"
                            data-bs-toggle="pill" href="#v-pills-logo" role="tab" aria-controls="v-pills-logo"
                            aria-selected="true">
                            <i class='mdi mdi-image font-16 me-1'></i> Logo</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content pt-0">
                <div class="tab-pane fade active show" id="v-pills-general" role="tabpanel"
                    aria-labelledby="v-pills-general-tab">
                    @include(
                        'src.pages.appearance.setting.partials.general'
                    )
                </div>
                <div class="tab-pane fade show" id="v-pills-logo" role="tabpanel" aria-labelledby="v-pills-logo-tab">
                    @include('src.pages.appearance.setting.partials.logo')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/libs/dropzone/js/dropzone.min.js') }}"></script>
@endpush
