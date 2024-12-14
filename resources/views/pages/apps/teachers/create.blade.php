<x-default-layout>
    <style>
        .ck-editor__editable_inline {
            height: 300px;
            margin-bottom: 10px;
        }
    </style>
    @section('title')
        Teachers create
    @endsection
    @if(isset($teacher))
        @section('breadcrumbs')
            {{ Breadcrumbs::render('teachers.edit',$teacher) }}
        @endsection
    @else
        @section('breadcrumbs')
            {{ Breadcrumbs::render('teachers.create') }}
        @endsection
    @endif

    <div class="container">
        <div class="card bg-light-secondary">
            <div class="card-body">
                @if(isset($teacher))
                    <form action="{{ route('teachers.update', $teacher) }}" method="POST"
                          id="formTeachers"
                          enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @else
                            <form action="{{ route('teachers.store') }}" method="POST" id="formTeachers">
                                @endif
                                @CSRF
                                <div class="row pb-3">
                                    <div class="col-md-4 mb-2">
                                        <label class="required fw-semibold fs-6 mb-2">Full name (English)</label>
                                        <input type="text" name="full_name_en"
                                               class="form-control  mb-2"
                                               placeholder="Full name (English)"
                                               @isset($teacher) value="{{ $teacher->full_name_en }}" @endisset>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label class="required fw-semibold fs-6 mb-2">Full name (Arabic)</label>
                                        <input type="text" name="full_name_ar"
                                               class="form-control  mb-2"
                                               placeholder="Full name (Arabic)"
                                               @isset($teacher) value="{{ $teacher->full_name_ar}}" @endisset>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">National Number</label>
                                        <input type="text" name="national_number"
                                               class="form-control mb-2"
                                               placeholder="National Number"
                                               @isset($teacher) value="{{ $teacher->national_number }}" @endisset>
                                    </div>

                                    <div class="col-md-3 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Place of birth</label>
                                        <input type="text" name="place_birth"
                                               class="form-control mb-2"
                                               placeholder="Place of birth"
                                               @isset($teacher) value="{{ $teacher->place_birth }}" @endisset>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Birth Date</label>
                                        <input type="date" name="birth_date"
                                               class="form-control mb-2"
                                               placeholder="Birth Date"
                                               @isset($teacher) value="{{ $teacher->birth_date }}" @endisset>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="required fw-semibold fs-6 mb-2">Nationality</label>
                                        <select name="nationality_id" class="form-select mb-2 text"
                                                data-control="select2" data-placeholder="Select an Nationality">
                                            <option></option>
                                            @foreach($nationalities as $nationality)
                                                <option value="{{$nationality->id}}"
                                                        @isset($teacher) @if($teacher->nationality_id === $nationality->id) selected @endif @endisset>
                                                    {{$nationality->name_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="required fw-semibold fs-6 mb-2">Sex</label>
                                        <select name="sex_id" class="form-select mb-2 text"
                                                data-control="select2" data-placeholder="Select an Sex">
                                            <option></option>
                                            @foreach($sexes as $sex)
                                                <option value="{{$sex->id}}"
                                                        @isset($teacher) @if($teacher->sex_id === $sex->id) selected @endif @endisset>
                                                    {{$sex->name_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="required fw-semibold fs-6 mb-2">Marital Status</label>
                                        <select name="marital_status_id" class="form-select mb-2 text"
                                                data-control="select2" data-placeholder="Select an Marital Status">
                                            <option></option>
                                            @foreach($marital_statuses as $marital_status)
                                                <option value="{{$marital_status->id}}"
                                                        @isset($teacher) @if($teacher->marital_status_id === $marital_status->id) selected @endif @endisset>
                                                    {{$marital_status->name_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Email</label>
                                        <input type="text" name="email"
                                               class="form-control  mb-2"
                                               placeholder="Email"
                                               @isset($teacher) value="{{ $teacher->email }}" @endisset>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class=" fw-semibold fs-6 mb-2">Phone</label>
                                        <input type="text" name="phone"
                                               class="form-control  mb-2"
                                               placeholder="Phone"
                                               @isset($teacher) value="{{ $teacher->phone }}" @endisset>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class=" fw-semibold fs-6 mb-2">Mobile</label>
                                        <input type="text" name="mobile"
                                               class="form-control  mb-2"
                                               placeholder="Mobile"
                                               @isset($teacher) value="{{ $teacher->mobile }}" @endisset>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class=" fw-semibold fs-6 mb-2">Number of years of experience</label>
                                        <input type="number" name="experience_years"
                                               class="form-control mb-2"
                                               placeholder="Number of years of experience"
                                               @isset($teacher) value="{{ $teacher->experience_years }}" @endisset>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">City</label>
                                        <select name="city_id" class="form-select mb-2" id="cities"
                                                data-control="select2" data-placeholder="Select an Cit">
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}"
                                                        @isset($teacher) @if($teacher->city_id === $city->id) selected @endif @endisset>
                                                    {{$city->name_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Region</label>
                                        <select name="region_id" class="form-select mb-2" id="regions"
                                                data-control="select2"
                                                data-placeholder="Select an Region">
                                            <option></option>
                                            @foreach($regions as $region)
                                                <option value="{{$region->id}}"
                                                        @isset($teacher) @if($teacher->region_id === $region->id) selected @endif @endisset >
                                                    {{$region->name_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class=" fw-semibold fs-6 mb-2">Address</label>
                                        <input type="text" name="address"
                                               class="form-control mb-2"
                                               placeholder="Address"
                                               @isset($teacher) value="{{ $teacher->address }}" @endisset>
                                    </div>

                                    <div class="col-md-12 my-10">
                                        <h6 class="text-primary">Subscription information</h6>
                                        <hr class="mb-3">
                                    </div>


                                    <div class="col-md-4 mb-2">
                                        <label class="fw-semibold fs-6 mb-2 required">Subscription Date</label>
                                        <input type="date" name="subscription_date"
                                               class="form-control mb-2"
                                               placeholder="Subscription Date"
                                               @isset($teacher) value="{{ $teacher->subscription_date }}" @endisset>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="fw-semibold fs-6 mb-2 required">Subscription End Date</label>
                                        <input type="date" name="subscription_end_date"
                                               class="form-control mb-2"
                                               placeholder="Subscription End Date"
                                               pattern="\d{4}-\d{2}-\d{2}"
                                               @isset($teacher) value="{{ $teacher->subscription_end_date }}" @endisset>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class=" fw-semibold fs-6 mb-2 required">Paid/Unpaid</label>
                                        <select name="paid_type" class="form-select mb-2"
                                                data-control="select2" data-placeholder="Select an Paid Type">
                                            <option value="1"
                                                    @isset($teacher) @if($teacher->paid_type === 1) selected @endif @endisset>
                                                Paid
                                            </option>
                                            <option value="0"
                                                    @isset($teacher) @if($teacher->paid_type === 0) selected @endif @endisset>
                                                Unpaid
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 my-10">
                                        <h6 class="text-primary">Educational Qualifications</h6>
                                        <small class="form-text text-muted">If there is more than one certificate,
                                            please write all certificates and specializations.</small>
                                        <hr class="mb-3">
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <div
                                                data-repeater-list="kt_ecommerce_add_product_options"
                                                class="d-flex flex-column gap-3">
                                                @if(isset($teacher) && count($teacher->educationalQualifications) > 0)
                                                    @foreach($teacher->educationalQualifications as $educationalQualification)
                                                        <div data-repeater-item=""
                                                             class="form-group d-flex flex-wrap align-items-center gap-5">
                                                            <div class="w-150 w-md-250px">
                                                                <select class="specializations form-select"
                                                                        name="specializations[]"
                                                                        data-placeholder="Select a Specialization">
                                                                    <option></option>
                                                                    @foreach($specializations as $specialization)
                                                                        <option value="{{ $specialization->id }}"
                                                                                @if($educationalQualification->specialization_id == $specialization->id) selected @endif>
                                                                            {{ $specialization->name_ar}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <input name="institutes[]" type="text"
                                                                   class="form-control mw-100 w-200px"
                                                                   placeholder="University / Institute"
                                                                   value="{{ $educationalQualification->institute }}"
                                                            />
                                                            <input id="cities" type="text"
                                                                   class="form-control mw-100 w-200px"
                                                                   name="cities[]" placeholder="City"
                                                                   value="{{ $educationalQualification->city }}"
                                                            />
                                                            <input type="date" name="graduation_dates[]"
                                                                   class="form-control mw-100 w-200px"
                                                                   placeholder="Graduation date"
                                                                   value="{{ $educationalQualification->graduation_date }}">
                                                            <div class="w-150 w-md-250px">
                                                                <select class="degrees form-select"
                                                                        name="degrees[]"
                                                                        data-placeholder="Select a Degree">
                                                                    <option></option>
                                                                    @foreach($degrees as $degree)
                                                                        <option value="{{ $degree->id }}"
                                                                                @if($educationalQualification->degree_id == $degree->id) selected @endif>
                                                                            {{ $degree->name_ar}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <button type="button" data-repeater-delete=""
                                                                    class="btn btn-sm btn-icon btn-light-danger">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    @endforeach

                                                @else

                                                    <div data-repeater-item=""
                                                         class="form-group d-flex flex-wrap align-items-center gap-5">
                                                        <div class="w-150 w-md-250px">
                                                            <select class="specializations form-select"
                                                                    name="specializations[]"
                                                                    data-placeholder="Select a Specialization">
                                                                <option></option>
                                                                @foreach($specializations as $specialization)
                                                                    <option value="{{ $specialization->id }}">
                                                                        {{ $specialization->name_ar}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <input name="institutes[]" type="text"
                                                               class="form-control mw-100 w-200px"
                                                               placeholder="University / Institute"
                                                        />
                                                        <input id="cities" type="text"
                                                               class="form-control mw-100 w-200px"
                                                               name="cities[]" placeholder="City"/>
                                                        <input type="date" name="graduation_dates[]"
                                                               class="form-control mw-100 w-200px"
                                                               placeholder="Graduation date">
                                                        <div class="w-150 w-md-250px">
                                                            <select class="degrees form-select"
                                                                    name="degrees[]"
                                                                    data-placeholder="Select a Degree">
                                                                <option></option>
                                                                @foreach($degrees as $degree)
                                                                    <option value="{{ $degree->id }}">
                                                                        {{ $degree->name_ar}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <button type="button" data-repeater-delete=""
                                                                class="btn btn-sm btn-icon btn-light-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>

                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group mt-5">
                                            <button type="button" data-repeater-create=""
                                                    class="btn btn-sm btn-light-primary">
                                                <i class="ki-duotone ki-plus fs-2"></i>Add
                                                Educational Qualification
                                            </button>
                                        </div>

                                    </div>

                                    <hr class="my-10">
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Practical experiences (English)</label>
                                        <textarea
                                            init-editor
                                            name="practical_experiences_en"
                                            class="form-control mb-2 h-400px"
                                            placeholder="Practical Experiences En"
                                        >@isset($teacher)
                                                {{$teacher->practical_experiences_en}}
                                            @endisset</textarea>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Practical experiences (Arabic)</label>
                                        <textarea
                                            init-editor
                                            name="practical_experiences_ar"
                                            class="form-control mb-2 h-400px"
                                            placeholder="Practical Experiences (Arabic)"
                                        >@isset($teacher)
                                                {{$teacher->practical_experiences_ar}}
                                            @endisset</textarea>
                                    </div>
                                    <div class="col-md-12 mb-10 text-end fw-bold text-info" dir="rtl">
                                        <small>* في حال وجود أكثر من مكان عمل يرجى كتابة جميع الخبرات وتفاصيلها
                                            الرجاء ذكر كل ما يلي (اسم الشركة - مكان الشركة - المسمى الوظيفي - المدة -
                                            الراتب - سبب ترك العمل).</small>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Personal skills and abilities (English)</label>
                                        <textarea
                                            init-editor
                                            name="skills_abilities_en"
                                            class="form-control mb-2 h-400px"
                                            placeholder="Practical Experiences En"
                                        >@isset($teacher)
                                                {{$teacher->skills_abilities_en}}
                                            @endisset</textarea>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Personal skills and abilities (Arabic)</label>
                                        <textarea
                                            init-editor
                                            name="skills_abilities_ar"
                                            class="form-control mb-2 h-400px"
                                            placeholder="Practical Experiences (Arabic)"
                                        >@isset($teacher)
                                                {{$teacher->skills_abilities_ar}}
                                            @endisset</textarea>
                                    </div>
                                    <div class="col-md-12 mb-2 text-end fw-bold text-info" dir="rtl">
                                        <small>* ( عربي ، انجليزي ، فرنسي ، تركي ، وغيرها ... ) ودرجة اتقانها (محادثة ،
                                            كتابة ، قراءة ) ومستواها (ممتاز ، جيد جدا ، جيد ، مقبول ) و مهارات الحاسب
                                            الآلي و مهارات أخرى</small>
                                    </div>

                                    {{--Job Titles--}}
                                    <div class="col-md-12 my-10">
                                        <h6 class="text-primary">Job Titles</h6>
                                        <hr class="mb-3">
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="fw-semibold fs-6 mb-2 required">First Job Title</label>
                                        <select name="first_job_title_id" class="form-select mb-2"
                                                id="first_job_title_id"
                                                data-control="select2" data-placeholder="Select an First Job Title">
                                            @foreach($job_titles as $job_title)
                                                <option value="{{$job_title->id}}"
                                                        @isset($teacher) @if($teacher->first_job_title_id === $job_title->id) selected @endif @endisset>
                                                    {{$job_title->name_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Second Job Title</label>
                                        <select name="second_job_title_id" class="form-select mb-2"
                                                id="second_job_title_id"
                                                data-control="select2" data-placeholder="Select an Second Job Title">
                                            <option></option>
                                            @foreach($job_titles as $job_title)
                                                <option value="{{$job_title->id}}"
                                                        @isset($teacher) @if($teacher->second_job_title_id === $job_title->id) selected @endif @endisset>
                                                    {{$job_title->name_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Third Job Title</label>
                                        <select name="third_job_title_id" class="form-select mb-2"
                                                id="third_job_title_id"
                                                data-control="select2" data-placeholder="Select an Third Job Title">
                                            <option></option>
                                            @foreach($job_titles as $job_title)
                                                <option value="{{$job_title->id}}"
                                                        @isset($teacher) @if($teacher->third_job_title_id === $job_title->id) selected @endif @endisset>
                                                    {{$job_title->name_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{--//Desired Job Cities--}}
                                    <div class="col-md-12 my-10">
                                        <h6 class="text-primary">Desired Job Cities</h6>
                                        <hr class="mb-3">
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label class="fw-semibold fs-6 mb-2 required">First Desired Job City</label>
                                        <select name="first_desired_job_city_id" class="form-select mb-2"
                                                id="first_desired_job_city_id"
                                                data-control="select2"
                                                data-placeholder="Select an First Desired Job City">
                                            <option value="100"> الكل</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}"
                                                        @isset($teacher) @if($teacher->first_desired_job_city_id === $city->id) selected @endif @endisset>
                                                    {{$city->name_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="fw-semibold fs-6 mb-2 ">Second Desired Job City</label>
                                        <select name="second_desired_job_city_id" class="form-select mb-2"
                                                id="second_desired_job_city_id"
                                                data-control="select2"
                                                data-placeholder="Select an Second Desired Job City">
                                            <option></option>
                                            <option value="100"> الكل</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}"
                                                        @isset($teacher) @if($teacher->second_desired_job_city_id === $city->id) selected @endif @endisset>
                                                    {{$city->name_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="fw-semibold fs-6 mb-2 ">Third Desired Job City</label>
                                        <select name="third_desired_job_city_id" class="form-select mb-2"
                                                id="third_desired_job_city_id"
                                                data-control="select2"
                                                data-placeholder="Select an Third Desired Job City">
                                            <option></option>
                                            <option value="100"> الكل</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}"
                                                        @isset($teacher) @if($teacher->third_desired_job_city_id === $city->id) selected @endif @endisset>
                                                    {{$city->name_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </form>
                    </form>
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-light-primary" id="submit">Save Changes</a>
                    </div>
            </div>
        </div>
    </div>
    @push('scripts')
        @include('pages.apps.teachers.createJs')
    @endpush

</x-default-layout>
