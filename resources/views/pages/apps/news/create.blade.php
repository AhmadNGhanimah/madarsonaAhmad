@if(isset($news))
    <form action="{{ route('news.update', $news) }}" id="newsForm"
          method="POST"
          enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @else
            <form action="{{ route('news.store') }}" method="POST"
                  id="newsForm"
                  enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Title En</label>
                        <input type="text" name="title_en" class="form-control form-control-solid-bg mb-2"
                               autocomplete="off"
                               placeholder="Title En"
                               @isset($news) value="{{ $news->title_en }}" @endisset>
                    </div>
                    <div class="col-md-6 mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Title Ar</label>
                        <input type="text" name="title_ar" class="form-control form-control-solid-bg mb-2"
                               autocomplete="off"
                               placeholder="Title Ar"
                               @isset($news) value="{{ $news->title_ar }}" @endisset>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label required">Description En</label>
                        <textarea
                                init-editor
                                name="description_en"
                                id="description_en"
                                class="form-control mb-2 h-400px"
                                placeholder="Description En"
                        >@isset($news)
                                {{$news->description_en}}
                            @endisset</textarea>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label required">Description Ar</label>
                        <textarea
                                init-editor
                                name="description_ar"
                                id="description_ar"
                                class="form-control mb-2 "
                                placeholder="Description Ar"
                        >@isset($news)
                                {{$news->description_ar}}
                            @endisset</textarea>
                    </div>
                    <div class="row pb-3 mt-5">
                        <div class="col-md-2 form-group">
                            <label class="required fw-semibold d-block fs-6 mb-2">Image Path</label>
                            <div class="image-input shadow-sm " data-kt-image-input="true"
                                 style="background-image: url('{{asset('assets/media/svg/avatars/brochure-catalog-icon.svg')}}') !important">
                                <div class="image-input-wrapper w-125px h-125px"
                                     @if(isset($news)) style="background-image:url('{{ isset($news) ? $news->image_path: asset('assets/media/svg/avatars/blank.svg') }}');" @endif></div>
                                <label
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="Change icon">
                                    <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span
                                                class="path2"></span></i>
                                    <input type="file" name="image_path" accept="image/*"
                                           style="width: 0px;height: 0px;overflow: hidden;"/>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="row ">
                                <div class="col-md-6 mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Active Days</label>
                                    <input type="number" name="active_days"
                                           class="form-control form-control-solid-bg mb-2"
                                           autocomplete="off" placeholder="Active Days" min="0"
                                           @isset($news) value="{{ $news->active_days }}" @endisset>
                                </div>
                                <div class="col-md-6 mb-7">
                                    <label class="fw-semibold fs-6 mb-2">Youtube Link</label>
                                    <input type="text" name="youtube_link"
                                           class="form-control form-control-solid-bg mb-2"
                                           autocomplete="off" placeholder="Youtube Link"
                                           @isset($news) value="{{ $news->youtube_link }}" @endisset>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="fw-semibold required fs-6 mb-2">Is Active</label>
                                    <select name="is_active" id="select2_active"
                                            class="form-select form-select-solid mb-2"
                                            data-control="select2">
                                        <option value="1"
                                                @isset($news) @if($news->is_active) selected @endif @endisset>
                                            Active
                                        </option>
                                        <option value="0"
                                                @isset($news) @if(!$news->is_active) selected @endif @endisset>
                                            InActive
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="fw-semibold required fs-6 mb-2">Is Urgent</label>
                                    <select name="is_urgent" id="select2_urgent"
                                            class="form-select form-select-solid mb-2"
                                            data-control="select2">
                                        <option value="0"
                                                @isset($news) @if(!$news->is_urgent) selected @endif @endisset>
                                            No
                                        </option>
                                        <option value="1"
                                                @isset($news) @if($news->is_urgent) selected @endif @endisset>
                                            Yes
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <input type="submit" class="btn btn-light-success btn-sm float-end" value="Submit"
                               id="btn-submit">
                    </div>
                </div>
            </form>
    </form>

    <script>
        KTImageInput.createInstances();

        $('#select2_active,#select2_urgent').select2({
            dropdownParent: $('#modal'),
        });

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

    </script>
