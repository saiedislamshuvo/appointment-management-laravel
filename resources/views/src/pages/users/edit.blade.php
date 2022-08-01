@extends('src.layouts.app')

@section('title', 'Edit User')

@section('contents')
    @include('src.layouts.partials.breadcrumb', [
        'title' => 'Edit User',
        'items' => [
            ['title' => 'Dashboard', 'route' => route('dashboard')],
            ['title' => 'Users', 'route' => route('users.index')],
        ],
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
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content pt-0">
                <div class="tab-pane fade active show" id="v-pills-general" role="tabpanel"
                    aria-labelledby="v-pills-general-tab">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('src.pages.users.partials.form')
                                <div class="form-group mt-4">
                                    <input type="submit" class="btn btn-primary" value="Update User">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
