<x-default-layout>
    <style>
        .ck-editor__editable_inline {
            height: 300px;
            margin-bottom: 10px;
        }
    </style>
    @section('title')
        Schools Create
    @endsection
    @if(isset($school))
        @section('breadcrumbs')
            {{ Breadcrumbs::render('schools.edit',$school) }}
        @endsection
    @else
        @section('breadcrumbs')
            {{ Breadcrumbs::render('schools.create') }}
        @endsection
    @endif

    <div class="container">
        <div class="card bg-light-secondary">
            <div class="card-body">
                @if(isset($school))
                    <form action="{{ route('schools.update', $school) }}" method="POST"
                          id="formSchool"
                          enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @else
                            <form action="{{ route('schools.store') }}" method="POST" id="formSchool">
                                @endif
                                @CSRF
                                <div class="row pb-3">
                                    <div class="col-md-2 form-group">
                                        <label class="required fw-semibold d-block fs-6 mb-2">School Logo</label>
                                        <div class="image-input shadow-sm " data-kt-image-input="true"
                                             style="background-image: url('{{asset('assets/media/svg/avatars/blank.svg')}}') !important">
                                            <!--begin::Image preview wrapper-->
                                            <div class="image-input-wrapper w-125px h-125px"
                                                 @if(isset($school)) style="background-image:url('{{ isset($school) ? $school->logo_image: asset('assets/media/svg/avatars/blank.svg') }}');" @endif></div>
                                            <label
                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Change icon">
                                                <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span
                                                        class="path2"></span></i>

                                                <input type="file" name="logo_image" accept="image/*"
                                                       style="width: 0px;height: 0px;overflow: hidden;"/>
                                            </label>
                                            <span
                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Cancel icon">
                                    <i class="ki-outline ki-cross fs-3"></i>
                                </span>
                                            <span
                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Remove icon">
                                <i class="ki-outline ki-cross fs-3"></i>
                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4 mb-2">
                                                <label class="required fw-semibold fs-6 mb-2">Name En</label>
                                                <input type="text" name="name_en"
                                                       class="form-control form-control-solid-bg mb-2"
                                                       placeholder="Name En"
                                                       @isset($school) value="{{ $school->name_en }}" @endisset>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="required fw-semibold fs-6 mb-2">Name Ar</label>
                                                <input type="text" name="name_ar"
                                                       class="form-control form-control-solid-bg mb-2"
                                                       placeholder="Name Ar"
                                                       @isset($school) value="{{ $school->name_ar }}" @endisset>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="required fw-semibold fs-6 mb-2">Institution Type</label>
                                                <select name="institution_type_id" class="form-select mb-2"
                                                        data-control="select2"
                                                        data-placeholder="Select an Institution Type">
                                                    <option></option>
                                                    @foreach($institutionTypes as $institutionType)
                                                        <option value="{{$institutionType->id}}"
                                                                @isset($school)  @if($school->institution_type_id === $institutionType->id) selected @endif @endisset>
                                                            {{$institutionType->name_ar}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="required fw-semibold fs-6 mb-2">City</label>
                                                <select name="city_id" class="form-select mb-2" id="cities"
                                                        data-control="select2" data-placeholder="Select an Cit">
                                                    <option></option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}"
                                                                @isset($school) @if($school->city_id === $city->id) selected @endif @endisset>
                                                            {{$city->name_ar}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="required fw-semibold fs-6 mb-2">Region</label>
                                                <select name="region_id" class="form-select mb-2" id="regions"
                                                        data-control="select2"
                                                        data-placeholder="Select an Region">
                                                    <option></option>
                                                    @foreach($regions as $region)
                                                        <option value="{{$region->id}}"
                                                                @isset($school) @if($school->region_id === $region->id) selected @endif @endisset
                                                        >
                                                            {{$region->name_ar}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="fw-semibold fs-6 mb-2">
                                                    <span class="">  Sort order - </span>

                                                    <span
                                                        class="text-danger"> Last Order: {{$last_order->sort_order}} </span>
                                                </label>
                                                <input type="number" min="0" name="sort_order"
                                                       class="form-control form-control-solid-bg mb-2"
                                                       placeholder="Sort order"
                                                       @isset($school) value="{{ $school->sort_order }}" @endisset>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="fw-semibold fs-6 mb-2">Madaresona Discount</label>
                                                <input type="number" min="1" name="madaresona_discount"
                                                       class="form-control form-control-solid-bg mb-2"
                                                       placeholder="Madaresona Discount"
                                                       @isset($school) value="{{ $school->madaresona_discount }}" @endisset>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-10" style="color: #9f9494">
                                    <div class="col-md-2  form-group">
                                        <label class="fw-semibold d-block fs-6 mb-2">Brochure</label>
                                        <div class="image-input shadow-sm " data-kt-image-input="true"
                                             style="background-image: url('{{asset('assets/media/svg/avatars/brochure-catalog-icon.svg')}}') !important">
                                            <!--begin::Image preview wrapper-->
                                            <div class="image-input-wrapper w-125px h-125px"
                                                 @if(isset($school)) style="background-size:contain; background-image:url('{{ isset($school) ? $school->brochure : asset('assets/media/svg/avatars/brochure-catalog-icon.svg') }}');" @endif ></div>
                                            <label
                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Change icon">
                                                <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span
                                                        class="path2"></span></i>

                                                <input type="file" name="brochure" accept="image/*"
                                                       style="width: 0px;height: 0px;overflow: hidden;"/>
                                            </label>
                                            <span
                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Cancel icon">
                                    <i class="ki-outline ki-cross fs-3"></i>
                                </span>
                                            <span
                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Remove icon">
                                <i class="ki-outline ki-cross fs-3"></i>
                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4 mb-2">
                                                <label class="fw-semibold fs-6 mb-2">Email</label>
                                                <input type="text" name="email"
                                                       class="form-control form-control-solid-bg mb-2"
                                                       placeholder="Email"
                                                       @isset($school) value="{{ $school->email }}" @endisset>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class=" fw-semibold fs-6 mb-2">Phone</label>
                                                <input type="text" name="phone"
                                                       class="form-control form-control-solid-bg mb-2"
                                                       placeholder="Phone"
                                                       @isset($school) value="{{ $school->phone }}" @endisset>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class=" fw-semibold fs-6 mb-2">Fax</label>
                                                <input type="text" name="fax"
                                                       class="form-control form-control-solid-bg mb-2"
                                                       placeholder="Fax"
                                                       @isset($school) value="{{ $school->fax }}" @endisset>
                                            </div>

                                            <div class="col-md-4 mb-2">
                                                <label class="fw-semibold fs-6 mb-2">Website</label>
                                                <input type="text" name="website"
                                                       class="form-control form-control-solid-bg mb-2"
                                                       placeholder="Website"
                                                       @isset($school) value="{{ $school->website }}" @endisset>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class=" fw-semibold fs-6 mb-2">PO. Box</label>
                                                <input type="text" name="po_box"
                                                       class="form-control form-control-solid-bg mb-2"
                                                       placeholder="PO. Box"
                                                       @isset($school) value="{{ $school->po_box }}" @endisset>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="fw-semibold fs-6 mb-2">Zip code</label>
                                                <input type="text" name="zip_code"
                                                       class="form-control form-control-solid-bg mb-2"
                                                       placeholder="Zip code"
                                                       @isset($school) value="{{ $school->zip_code }}" @endisset>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-10" style="color: #9f9494">
                                    <div class="col-md-3 mb-2">
                                        <label class="fw-semibold fs-6 mb-2 required">Genders</label>
                                        <select name="genders[]" id="genders" class="form-select mb-2"
                                                data-control="select2" multiple
                                                data-placeholder="Select an Genders">
                                            <option></option>
                                            @foreach(config('constants.genders') as $index => $gender)
                                                <option value="{{$index}}"
                                                        @isset($school) @if(in_array($index,$genders_type)) selected @endif @endisset
                                                >
                                                    {{$gender}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="fw-semibold fs-6 mb-2 required">Curriculum Type</label>
                                        <select name="curriculum_type" class="form-select mb-2"
                                                data-control="select2"
                                                data-placeholder="Select an Curriculum Type">
                                            <option></option>
                                            @foreach(config('constants.curriculum_types') as $index => $curriculum_type)
                                                <option value="{{$index}}"
                                                        @isset($school) @if($school->curriculum_type === $index) selected @endif @endisset>
                                                    {{$curriculum_type}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Discounts</label>
                                        <select name="discounts[]" class="form-select mb-2"
                                                data-control="select2" multiple
                                                data-placeholder="Select an Discounts">
                                            <option></option>
                                            @foreach($discounts as $discount)
                                                <option value="{{$discount->id}}"
                                                        @isset($school)
                                                            @if(in_array($discount->id, $discounts_id, true)) selected @endif
                                                    @endisset>
                                                    {{$discount->name_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Contact Person Name</label>
                                        <input type="text" name="contact_person_name"
                                               class="form-control form-control-solid-bg mb-2"
                                               placeholder="Contact Person Name"
                                               @isset($school) value="{{ $school->contact_person_name }}" @endisset>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Contact Person Email</label>
                                        <input type="text" name="contact_person_email"
                                               class="form-control form-control-solid-bg mb-2"
                                               placeholder="Contact Person Email"
                                               @isset($school) value="{{ $school->contact_person_email }}" @endisset>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Contact Person Phone</label>
                                        <input type="text" name="contact_person_phone"
                                               class="form-control form-control-solid-bg mb-2"
                                               placeholder="Contact Person Phone"
                                               @isset($school) value="{{ $school->contact_person_phone }}" @endisset>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Contact Person Whatsapp</label>
                                        <input type="text" name="contact_person_whatsapp"
                                               class="form-control form-control-solid-bg mb-2"
                                               placeholder="Contact Person whatsapp"
                                               @isset($school) value="{{ $school->contact_person_phone }}" @endisset>
                                    </div>
                                    <hr class="my-10" style="color: #9f9494">
                                    <div class="col-md-6 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">About Title En</label>
                                        <input type="text" name="about_title_en"
                                               class="form-control form-control-solid-bg mb-2"
                                               placeholder="About Title En"
                                               @isset($school) value="{{ $school->about_title_en }}" @endisset>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">About Title AR</label>
                                        <input type="text" name="about_title_ar"
                                               class="form-control form-control-solid-bg mb-2"
                                               placeholder="About Title AR"
                                               @isset($school) value="{{ $school->about_title_ar }}" @endisset>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Description En</label>
                                        <textarea
                                            init-editor
                                            name="description_en"
                                            id="description_en"
                                            class="form-control mb-2 h-400px"
                                            placeholder="Description En"
                                        >@isset($school)
                                                {{$school->description_en}}
                                            @endisset</textarea>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Description Ar</label>
                                        <textarea
                                            init-editor
                                            name="description_ar"
                                            id="description_ar"
                                            class="form-control mb-2 "
                                            placeholder="Description Ar"
                                        >@isset($school)
                                                {{$school->description_ar}}
                                            @endisset</textarea>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Principal En</label>
                                        <textarea
                                            init-editor
                                            name="principal_en"
                                            id="principal_en"
                                            class="form-control mb-2 "
                                            placeholder="Principal En"
                                        >@isset($school)
                                                {{$school->principal_en}}
                                            @endisset</textarea>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Principal Ar</label>
                                        <textarea
                                            init-editor
                                            name="principal_ar"
                                            id="principal_ar"
                                            class="form-control mb-2 "
                                            placeholder="Principal Ar"
                                        >@isset($school)
                                                {{$school->principal_ar}}
                                            @endisset</textarea>
                                    </div>
                                    <hr class="" style="color: #9f9494; margin-top:110px">
                                    @foreach(config('constants.school_links') as $index => $school_link)
                                        <div class="col-md-4 mb-2">
                                            <label class="fw-semibold fs-6 mb-2">{{$school_link}}</label>
                                            <input type="text" name="school_links[{{$index}}]"
                                                   class="form-control form-control-solid-bg mb-2"
                                                   placeholder="{{$school_link}}"
                                                   @isset($school) value="{{ Arr::get($school_links,$index) }}" @endisset>
                                        </div>
                                    @endforeach
                                    <div class="col-md-12 mb-2">
                                        <input class="" type="hidden" id="school_links" disabled>
                                    </div>
                                    <hr class="my-10" style="color: #9f9494">
                                    <div class="col-md-3 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Is Active</label>
                                        <select name="is_active" class="form-select mb-2"
                                                data-control="select2">
                                            <option value="1"
                                                    @isset($school) @if($school->is_active) selected @endif @endisset>
                                                Active
                                            </option>
                                            <option value="0"
                                                    @isset($school) @if(!$school->is_active) selected @endif @endisset>
                                                InActive
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Is Special</label>
                                        <select name="is_special" class="form-select mb-2"
                                                data-control="select2">
                                            <option value="0"
                                                    @isset($school) @if(!$school->is_special) selected @endif @endisset>
                                                General
                                            </option>
                                            <option value="1"
                                                    @isset($school) @if($school->is_special) selected @endif @endisset>
                                                Special
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="required fw-semibold fs-6 mb-2">Location Lat</label>
                                        <input type="text" name="lat"
                                               class="form-control form-control-solid-bg mb-2"
                                               placeholder="lat"
                                               @isset($school) value="{{ $school->lat }}" @endisset>
                                    </div>

                                    <div class="col-md-3 mb-2">
                                        <label class="required fw-semibold fs-6 mb-2">Location Lng</label>
                                        <input type="text" name="lng"
                                               class="form-control form-control-solid-bg mb-2"
                                               placeholder="lng"
                                               @isset($school) value="{{ $school->lng }}" @endisset>
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

        <script>
            function generateID() {
                return "id" + Math.random().toString(16).slice(2)
            }

            $('[init-editor]').each(function(){
                var textarea = $(this);

                var id = textarea.attr('id');
                if (!id) {
                    id = generateID();
                    textarea.attr('id', id);
                }


                ClassicEditor
                    .create(document.querySelector('#' + id))
                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            textarea.val(editor.getData());
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });


            $(document).on('change', '#cities', function () {
                var city_id = $(this).val();
                $.ajax({
                    url: '/city/' + city_id + '/regions',
                    method: 'get',
                    success: function (result) {
                        $('#regions option').remove();
                        $('#regions').append("<option> </option>");
                        $.each(result, function (index, value) {
                            $('#regions').append("<option value='" + value.id + "'>" + value.name_ar + "</option>");
                        });
                    }
                });
            });

            function submit(url, form) {
                $(".span_error").each(function () {
                    $(this).remove()
                });
                formData = new FormData(form)
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data.status === 422) {
                            $("#submit").css("pointerEvents", 'auto')
                            $(".submit").css("pointerEvents", 'auto');
                            $.each(data.errors, function (index, value) {
                                var span = '<span class="span_error text-danger"> ' + value + '</span>'
                                $('#' + index + ',[name="' + index + '"]').parent().last().append(span)
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops,there were an errors...',
                            })
                            $("#kt_scrolltop").click()
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.location = '/schools/'
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $("#submit").css("pointerEvents", 'auto')
                    }
                });
            }

            $(document).on('click', '#submit', function (e) {
                e.preventDefault();
                $("#submit").css("pointerEvents", "none");
                var form = document.getElementById("formSchool");
                var url = form.getAttribute('action');
                submit(url, form)
            });
        </script>
    @endpush

</x-default-layout>
