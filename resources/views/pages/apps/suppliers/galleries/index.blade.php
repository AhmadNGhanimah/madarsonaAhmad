<style>
    .dz-progress {
        display: none;
    }

    .img-gallery {
        border-radius: 10px;
        display: inline-block;
        webkit-box-shadow: 0 0.5rem 1.5rem 0.5rem rgba(0, 0, 0, .075);
        box-shadow: 0 0.5rem 1.5rem 0.5rem rgba(0, 0, 0, .075);
        border: 3px solid #fff;
    }

    .btn_close {
        position: absolute;
        right: 50px;
        top: -8px;
    }
</style>

<div class="row my-10">

    @foreach($galleries as $gallery)

        <div class="col-md-3 form-group my-5 div_gallery_{{$gallery->id}}">
            <div class="image-input shadow-sm " data-kt-image-input="true">
                <div class="image-input-wrapper w-200px h-200px"
                     style="background-image:url('{{$gallery->path}}')"></div>
                <span
                    class="btn btn-icon btn-circle btn-color-muted btn_remove_gallery
                    btn-active-color-danger w-25px h-25px bg-body shadow" id="{{$gallery->id}}"
                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                    title="Remove icon"><i class="ki-outline ki-cross fs-3 text-danger"></i></span>
            </div>
        </div>
    @endforeach


</div>
<form action="{{ route('suppliers.gallery.store') }}" method="POST" id="gallery">
    @CSRF
    <input type="hidden" value="{{$supplier->id}}" name="supplier_id">
    <div class="row">
        <div class="col-md-12 form-group">
            <label> Images </label>
            <div class="card-body pt-0">
                <div class="fv-row mb-2">
                    <div class="dropzone" id="dropzone">
                        <!--begin::Message-->
                        <div class="dz-message needsclick">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-file-up text-primary fs-3x">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <!--end::Icon-->
                            <!--begin::Info-->
                            <div class="ms-4">
                                <h3 class="fs-5 fw-bold text-gray-900 mb-1">
                                    Drop files here or click to upload.
                                </h3>
                                <span class="fs-7 fw-semi bold text-gray-500"
                                >Upload files</span
                                >
                            </div>
                        </div>
                    </div>

                </div>

                <div class="text-muted fs-7">Set the School media gallery.</div>
            </div>
        </div>
    </div>
    <div class="col-md-12 form-group">
        <input type="submit" class="btn btn-light-success btn-sm float-end" value="Save Changes" id="btn-submit">
    </div>

</form>

<script>
    $(document).ready(function () {
        let myDropzone = new Dropzone("#dropzone", {
            url: "#",
            autoProcessQueue: false,
            uploadMultiple: true,
            paramName: "images",
            maxFiles: 10,// Max filesize in MB
            maxFilesize: 10,
            addRemoveLinks: true,
        });

        $('#gallery').submit(function (e) {
            $(".span_error").each(function () {
                $(this).remove()
            });
            $('#error').remove()
            e.preventDefault();
            $("#btn-submit").prop("disabled", true)
            let form = $(this);
            let url = form.attr('action');
            let formData = new FormData(this);
            myDropzone.files.forEach(function (file, index) {
                formData.append('images[' + index + ']', file);
            });
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
                        $("#btn-submit").prop("disabled", false)
                        $.each(data.errors, function (index, value) {
                            var error = '<span class="text-danger span_error"> ' + value + '</span>'
                            if (index.split('.').length > 1) {
                                $('#error').last().append(error)
                            } else {
                                $('[name="' + index + '"]').parent().last().append(error)
                            }
                        });
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops,there were an errors...',
                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#modal').modal('hide');
                        $('#modal-body').empty()
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#btn-submit").prop("disabled", false)
                }
            });

        });

        $(document).on('click', '.btn_remove_gallery', function () {
            var id = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: '/suppliers/gallery/' + id + '/remove',
                        method: 'get',
                        success: function (data) {
                            $('.div_gallery_' + id).fadeOut('slow', function () {
                                $('.div_gallery_' + id).remove();
                            });
                            Swal.fire({
                                icon: 'success',
                                title: 'Your image Gallery has been removed',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    });
                }
            });

        });


    });
</script>
