<div class="row">
    <div class="col-md-3 mb-7">
        <label class="fw-semibold fs-6 mb-2">Full Name</label>
        <input type="text" class="form-control form-control-solid-bg mb-2"
               placeholder="Full Name"
               disabled
               value="{{ $contact->full_name }}">
    </div>
    <div class="col-md-3 mb-7">
        <label class="fw-semibold fs-6 mb-2">Phone</label>
        <input type="text" class="form-control form-control-solid-bg mb-2"
               placeholder="Phone"
               value="{{ $contact->phone }}">
    </div>
    <div class="col-md-3 mb-7">
        <label class="fw-semibold fs-6 mb-2">Email</label>
        <input type="text" class="form-control form-control-solid-bg mb-2"
               placeholder="email"
               value="{{ $contact->email }}">
    </div>

    <div class="col-md-3 mb-7">
        <label class="fw-semibold fs-6 mb-2">Contact At</label>
        <input type="text" class="form-control form-control-solid-bg mb-2"
               placeholder="Contact At"
               value="{{  \Carbon\Carbon::parse($contact->created_at)->format('d M Y h:i a')}}">
    </div>
    <div class="col-md-12 mb-2">
        <label class="form-label ">Message</label>
        <div class="form-control mb-2 h-400px overflow-auto" placeholder="Message">{!! $contact->message !!}</div>
    </div>

</div>

