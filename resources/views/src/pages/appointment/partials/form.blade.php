<div class="row">
    <div class="col-md-6">
        <div class="form-group mt-2">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Type Name"
                value="{{ $appointment->name ?? '' }}" maxlength="254">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mt-2">
            <label>Phone</label>
            <input type="number" name="phone" class="form-control" placeholder="Type Phone"
                value="{{ $appointment->phone ?? '' }}" maxlength="254">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mt-2">
            <label>Date Time</label>
            <input type="datetime-local" name="datetime" class="form-control" placeholder="Enter Date Time"
                value="{{ $appointment->datetime ?? '' }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mt-2">
            <label>Serial</label>
            <input type="number" name="serial" class="form-control" placeholder="Type Serial"
                value="{{ $appointment->serial ?? '' }}" maxlength="254">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group mt-2">
            <label>Note</label>
            <textarea name="note" class="form-control" rows="3" placeholder="Type Note">{{ $appointment->note ?? '' }}</textarea>
        </div>
    </div>
    <div class="col-md-12 mt-2">
        <div class="form-check">
            <input type="checkbox" name="status" class="form-check-input" id="appointment-status"
                @if ($appointment->status ?? false) checked @endif>
            <label class="form-check-label" for="appointment-status">Status</label>
        </div>
    </div>
</div>
