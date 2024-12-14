@if(isset($transportation))
    <form action="{{ route('schools.transportations.update', [$school_id,$transportation]) }}" id="transportationForm"
          method="POST"
          enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @else
            <form action="{{ route('schools.transportations.store', $school_id) }}" method="POST"
                  id="transportationForm"
                  enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Region Name En</label>
                        <input type="text" name="region_name_en" class="form-control form-control-solid-bg mb-2"
                               placeholder="Region Name En"
                               @isset($transportation) value="{{ $transportation->region_name_en }}" @endisset>
                    </div>

                    <div class="col-md-12 mb-12">
                        <label class="required fw-semibold fs-6 mb-2">Region Name Ar</label>
                        <input type="text" name="region_name_ar" class="form-control form-control-solid-bg mb-2"
                               placeholder="Region Name Ar"
                               @isset($transportation) value="{{ $transportation->region_name_ar }}" @endisset>
                    </div>
                    <div class="col-md-6 mb-7">
                        <label class="required fw-semibold fs-6 mb-2">One Way Price</label>
                        <input type="number" name="one_way_price" class="form-control form-control-solid-bg mb-2"
                               placeholder="One Way Price"
                               @isset($transportation) value="{{ $transportation->one_way_price }}" @endisset>
                    </div>
                    <div class="col-md-6 mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Two Way Price</label>
                        <input type="number" name="two_way_price" class="form-control form-control-solid-bg mb-2"
                               placeholder="Two Way Price"
                               @isset($transportation) value="{{ $transportation->two_way_price }}" @endisset>
                    </div>

                    <div class="col-md-12 form-group">
                        <input type="submit" class="btn btn-light-success btn-sm float-end" value="Submit"
                               id="btn-submit">
                    </div>
                </div>
            </form>
    </form>
