<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="row">
                    <label for="projectname" class="mb-0">App Favicon</label>
                    <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>
                    <div class="col-md-8">
                        <form action="{{ route('appearance.settings.app-favicon.update') }}" method="post"
                            class="dropzone">
                            @csrf
                            <div class="fallback">
                                <input name="file" type="file" />
                            </div>

                            <div class="dz-message needsclick">
                                <i class="h3 text-muted dripicons-cloud-upload"></i>
                                <h4>Drop files here or click to upload.</h4>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ $info['app_favicon'] }}" alt="" class="img-fluid mb-2" style="max-width: 160px;">
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="row">
                    <label for="projectname" class="mb-0">App Logo</label>
                    <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>
                    <div class="col-md-8">
                        <form action="{{ route('appearance.settings.app-logo.update') }}" method="post"
                            class="dropzone">
                            @csrf
                            <div class="fallback">
                                <input name="file" type="file" />
                            </div>

                            <div class="dz-message needsclick">
                                <i class="h3 text-muted dripicons-cloud-upload"></i>
                                <h4>Drop files here or click to upload.</h4>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ $info['app_logo'] }}" alt="" class="img-fluid mb-2" style="max-width: 160px;">
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="row">
                    <label for="projectname" class="mb-0">Footer Logo</label>
                    <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>
                    <div class="col-md-8">

                        <form action="{{ route('appearance.settings.app-footer-logo.update') }}" method="post"
                            class="dropzone">
                            @csrf
                            <div class="fallback">
                                <input name="file" type="file" />
                            </div>

                            <div class="dz-message needsclick">
                                <i class="h3 text-muted dripicons-cloud-upload"></i>
                                <h4>Drop files here or click to upload.</h4>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ $info['app_footer_logo'] }}" alt="" class="img-fluid mb-2"
                            style="max-width: 160px;">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
