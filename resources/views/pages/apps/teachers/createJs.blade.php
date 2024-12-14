<script>

    $(document).ready(function () {
        initSelect2();
        initRepeater();
        function initSelect2() {
            $('.specializations,.degrees').select2();
        }
        function initRepeater() {
            $("[data-repeater-create]").click(function () {
                var repeaterList = $("[data-repeater-list]");
                var newItem = repeaterList.find("[data-repeater-item]:first").clone();

                newItem.find("input").val(""); // Reset input values
                newItem.find("select").prop("selectedIndex", 0); // Reset select values

                // Remove the duplicated select2 container if any and re-initialize select2
                newItem.find('.select2-container').remove();
                repeaterList.append(newItem);
                initSelect2(); // Reinitialize select2 for new dropdowns

                checkVariantDeletability();
            });

            // Handle deletion of a variant
            $(document).on("click", "[data-repeater-delete]", function () {
                if ($('[data-repeater-item]').length > 1) {
                    $(this).closest("[data-repeater-item]").remove();
                    updateVariantNames();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'At least one variant is required!',
                    });
                }
                checkVariantDeletability();
            });
        }
        function checkVariantDeletability() {
            if ($('[data-repeater-item]').length <= 1) {
                $('[data-repeater-delete]').prop('disabled', true).addClass('disabled');
            } else {
                $('[data-repeater-delete]').prop('disabled', false).removeClass('disabled');
            }
        }
        checkVariantDeletability();

    });

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
                    window.location = '/teachers/'
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
        var form = document.getElementById("formTeachers");
        var url = form.getAttribute('action');
        submit(url, form)
    });
</script>
