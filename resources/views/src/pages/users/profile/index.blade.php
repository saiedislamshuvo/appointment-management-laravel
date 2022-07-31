@extends('src.layouts.app')

@section('title', 'User Profile')

@section('contents')
    @include('src.layouts.partials.breadcrumb', [
        'title' => 'User Profile',
        'items' => [['title' => 'Dashboard', 'route' => route('dashboard')]],
    ])
    <div class="alert"></div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="list-group list-group-flush font-15" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="list-group-item list-group-item-action border-0 active" id="v-pills-profile-tab"
                            data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                            aria-selected="true">
                            <i class='mdi mdi-account font-16 me-1'></i> Proile</a>
                        <a class="list-group-item list-group-item-action border-0" id="v-pills-logo-tab"
                            data-bs-toggle="pill" href="#v-pills-logo" role="tab" aria-controls="v-pills-logo"
                            aria-selected="true">
                            <i class='mdi mdi-key font-16 me-1'></i> Change Password</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content pt-0">
                <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel"
                    aria-labelledby="v-pills-profile-tab">
                    @include('src.pages.users.profile.partials.profile')
                </div>
                <div class="tab-pane fade show" id="v-pills-logo" role="tabpanel" aria-labelledby="v-pills-logo-tab">
                    @include('src.pages.users.profile.partials.change-password')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/libs/dropzone/js/dropzone.min.js') }}"></script>
@endpush
