<x-default-layout>
    <style>
        .ck-editor__editable_inline {
            height: 300px;
            margin-bottom: 10px;
        }
    </style>
    @section('title')
        Supplier Create
    @endsection
    @if(isset($supplier))
        @section('breadcrumbs')
            {{ Breadcrumbs::render('suppliers.edit',$supplier) }}
        @endsection
    @else
        @section('breadcrumbs')
            {{ Breadcrumbs::render('suppliers.create') }}
        @endsection
    @endif

    <div class="container">
        <div class="card bg-light-secondary">
            <div class="card-body">
                @if(isset($supplier))
                    <form action="{{ route('suppliers.update', $supplier) }}" method="POST"
                          id="formSupplier"
                          enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @else
                            <form action="{{ route('suppliers.store') }}" method="POST" id="formSupplier">
                                @endif
                                @CSRF
                                <div class="row pb-3">
                                    <div class="col-md-2 form-group">
                                        <label class="required fw-semibold d-block fs-6 mb-2">Supplier Logo</label>
                                        <div class="image-input shadow-sm " data-kt-image-input="true"
                                             style="background-image: url('{{asset('assets/media/svg/avatars/blank.svg')}}') !important">
                                            <!--begin::Image preview wrapper-->
                                            <div class="image-input-wrapper w-125px h-125px"
                                                 @if(isset($supplier)) style="background-image:url('{{ isset($supplier) ? $supplier->logo_image: asset('assets/media/svg/avatars/blank.svg') }}');" @endif></div>
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
                                                       class="form-control  mb-2"
                                                       placeholder="Name En"
                                                       @isset($supplier) value="{{ $supplier->name_en }}" @endisset>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="required fw-semibold fs-6 mb-2">Name Ar</label>
                                                <input type="text" name="name_ar"
                                                       class="form-control  mb-2"
                                                       placeholder="Name Ar"
                                                       @isset($supplier) value="{{ $supplier->name_ar }}" @endisset>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="required fw-semibold fs-6 mb-2"> Supplier Type</label>
                                                <select name="supplier_type_id" class="form-select mb-2"
                                                        data-control="select2"
                                                        data-placeholder="Select an Supplier Type">
                                                    <option></option>
                                                    @foreach($types as $type)
                                                        <option value="{{$type->id}}"
                                                                @isset($supplier)  @if($supplier->supplier_type_id === $type->id) selected @endif @endisset>
                                                            {{$type->name_ar}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="required fw-semibold fs-6 mb-2">City</label>
                                                <select name="city_id" class="form-select mb-2" id="cities"
                                                        data-control="select2" data-placeholder="Select an Cit">
                                                    <option></option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}"
                                                                @isset($supplier) @if($supplier->city_id === $city->id) selected @endif @endisset>
                                                            {{$city->name_ar}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="required fw-semibold fs-6 mb-2">Region</label>
                                                <select name="region_id" class="form-select mb-2" id="regions"
                                                        data-control="select2"
                                                        data-placeholder="Select an Region">
                                                    <option></option>
                                                    @foreach($regions as $region)
                                                        <option value="{{$region->id}}"
                                                                @isset($supplier) @if($supplier->region_id === $region->id) selected @endif @endisset
                                                        >
                                                            {{$region->name_ar}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="fw-semibold fs-6 mb-2">
                                                    <span class="">  Sort order - </span>

                                                    <span
                                                        class="text-danger"> Last Order: {{$last_order->sort_order}} </span>
                                                </label>
                                                <input type="number" min="0" name="sort_order"
                                                       class="form-control  mb-2"
                                                       placeholder="Sort order"
                                                       @isset($supplier) value="{{ $supplier->sort_order }}" @endisset>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-10" style="color: #9f9494">
                                    <div class="col-md-3 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Email</label>
                                        <input type="text" name="email"
                                               class="form-control  mb-2"
                                               placeholder="Email"
                                               @isset($supplier) value="{{ $supplier->email }}" @endisset>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class=" fw-semibold fs-6 mb-2">Phone</label>
                                        <input type="text" name="phone"
                                               class="form-control  mb-2"
                                               placeholder="Phone"
                                               @isset($supplier) value="{{ $supplier->phone }}" @endisset>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class=" fw-semibold fs-6 mb-2">Mobile</label>
                                        <input type="text" name="mobile"
                                               class="form-control  mb-2"
                                               placeholder="Mobile"
                                               @isset($supplier) value="{{ $supplier->mobile }}" @endisset>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class=" fw-semibold fs-6 mb-2">Fax</label>
                                        <input type="text" name="fax"
                                               class="form-control  mb-2"
                                               placeholder="Fax"
                                               @isset($supplier) value="{{ $supplier->fax }}" @endisset>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Website</label>
                                        <input type="text" name="website"
                                               class="form-control  mb-2"
                                               placeholder="Website"
                                               @isset($supplier) value="{{ $supplier->website }}" @endisset>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class=" fw-semibold fs-6 mb-2">Location</label>
                                        <input type="text" name="location"
                                               class="form-control  mb-2"
                                               placeholder="Location"
                                               @isset($supplier) value="{{ $supplier->location }}" @endisset>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Contact Person Whatsapp</label>
                                        <input type="text" name="contact_person_whatsapp"
                                               class="form-control  mb-2"
                                               placeholder="Contact Person whatsapp"
                                               @isset($supplier) value="{{ $supplier->contact_person_whatsapp }}" @endisset>
                                    </div>


                                    <hr class="my-10" style="color: #9f9494">

                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Description En</label>
                                        <textarea
                                            init-editor
                                            name="description_en"
                                            id="description_en"
                                            class="form-control mb-2 h-400px"
                                            placeholder="Description En"
                                        >@isset($supplier)
                                                {{$supplier->description_en}}
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
                                        >@isset($supplier)
                                                {{$supplier->description_ar}}
                                            @endisset</textarea>
                                    </div>

                                    <hr class="" style="color: #9f9494;">
                                    @foreach(config('constants.school_links') as $index => $school_link)
                                        <div class="col-md-4 mb-2">
                                            <label class="fw-semibold fs-6 mb-2">{{$school_link}}</label>
                                            <input type="text" name="supplier_links[{{$index}}]"
                                                   class="form-control  mb-2"
                                                   placeholder="{{$school_link}}"
                                                   @isset($supplier) value="{{ Arr::get($supplier_links,$index) }}" @endisset>
                                        </div>
                                    @endforeach

                                    <div class="col-md-12 mb-2">
                                        <input class="" type="hidden" id="supplier_links" disabled>
                                    </div>
                                    <hr class="my-10" style="color: #9f9494">
                                    <div class="col-md-3 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Is Active</label>
                                        <select name="is_active" class="form-select mb-2"
                                                data-control="select2">
                                            <option value="1"
                                                    @isset($supplier) @if($supplier->is_active) selected @endif @endisset>
                                                Active
                                            </option>
                                            <option value="0"
                                                    @isset($supplier) @if(!$supplier->is_active) selected @endif @endisset>
                                                InActive
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Is Special</label>
                                        <select name="is_special" class="form-select mb-2"
                                                data-control="select2">
                                            <option value="0"
                                                    @isset($supplier) @if(!$supplier->is_special) selected @endif @endisset>
                                                General
                                            </option>
                                            <option value="1"
                                                    @isset($supplier) @if($supplier->is_special) selected @endif @endisset>
                                                Special
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="required fw-semibold fs-6 mb-2">Location Lat</label>
                                        <input type="text" name="lat"
                                               class="form-control  mb-2"
                                               placeholder="lat"
                                               @isset($supplier) value="{{ $supplier->lat }}" @endisset>
                                    </div>

                                    <div class="col-md-3 mb-2">
                                        <label class="required fw-semibold fs-6 mb-2">Location Lng</label>
                                        <input type="text" name="lng"
                                               class="form-control  mb-2"
                                               placeholder="lng"
                                               @isset($supplier) value="{{ $supplier->lng }}" @endisset>
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

            $('[init-editor]').each(function () {
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
                            window.location = '/suppliers/'
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
                var form = document.getElementById("formSupplier");
                var url = form.getAttribute('action');
                submit(url, form)
            });
        </script>
    @endpush

</x-default-layout>
