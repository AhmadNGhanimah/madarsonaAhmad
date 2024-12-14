@if (isset($vacancy))
    <form action="{{ route('vacancies.update', $vacancy) }}" id="vacanciesForm" method="POST"
        enctype="multipart/form-data">
        @method('PUT')
    @else
        <form action="{{ route('vacancies.store') }}" method="POST" id="vacanciesForm" enctype="multipart/form-data">
@endif
@csrf
<div class="row">
    <div class="col-md-3 mb-2">
        <label class="required fw-semibold fs-6 mb-2">School</label>
        <select name="school_id" class="form-select mb-2" id="schools" data-control="select2"
            data-placeholder="Select an School">
            <option></option>
            @foreach ($schools as $school)
                <option value="{{ $school->id }}"
                    @isset($vacancy) @if ($vacancy->school_id === $school->id) selected @endif @endisset>
                    {{ $school->name_ar }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 mb-2">
        <label class="required fw-semibold fs-6 mb-2">Job Title</label>
        <select name="job_title_id" class="form-select mb-2" id="job_titles" data-control="select2"
            data-placeholder="Select an Job Title">
            <option></option>
            @foreach ($job_titles as $job_title)
                <option value="{{ $job_title->id }}"
                    @isset($vacancy) @if ($vacancy->job_title_id === $job_title->id) selected @endif @endisset>
                    {{ $job_title->name_ar }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 mb-2">
        <label class=" required fw-semibold fs-6 mb-2">Years of Experience</label>
        <input type="number" name="experience_years" class="form-control mb-2" placeholder="Years of Experience"
            @isset($vacancy) value="{{ $vacancy->experience_years }}" @endisset>
    </div>
    <div class="col-md-3 mb-2">
        <label class="fw-semibold fs-6 mb-2">Sex</label>
        <select name="sex_id" class="form-select mb-2" id="sexes" data-control="select2"
            data-placeholder="Select an Sex">
            <option></option>
            <option value="0" @isset($vacancy) selected @endisset> كلا الجنسين </option>
            @foreach ($sexes as $sex)
                <option value="{{ $sex->id }}"
                    @isset($vacancy) @if ($vacancy->sex_id === $sex->id) selected @endif @endisset>
                    {{ $sex->name_ar }}
                </option>
            @endforeach
        </select>
    </div>


    <div class="col-md-6 mb-2">
        <label class="form-label required">Details En</label>
        <textarea init-editor name="details_en" id="details_en" class="form-control mb-2 h-400px" placeholder="Details En">
@isset($vacancy)
{{ $vacancy->details_en }}
@endisset
</textarea>
    </div>
    <div class="col-md-6 mb-2">
        <label class="form-label required">Details Ar</label>
        <textarea init-editor name="details_ar" id="details_ar" class="form-control mb-2 " placeholder="Details Ar">
@isset($vacancy)
{{ $vacancy->details_ar }}
@endisset
</textarea>
    </div>

    <div class="col-md-6 mb-2 mt-2">
        <label class="fw-semibold fs-6 mb-2 required">Start Date</label>
        <input type="date" name="start_date" class="form-control mb-2" placeholder="Start Date"
            @isset($vacancy) value="{{ $vacancy->start_date }}" @endisset>
    </div>
    <div class="col-md-6 mb-2 mt-2">
        <label class="fw-semibold fs-6 mb-2 required">End Date</label>
        <input type="date" name="end_date" class="form-control mb-2" placeholder="End Date"
            @isset($vacancy) value="{{ $vacancy->end_date }}" @endisset>
    </div>

    <div class="col-md-12 form-group">
        <input type="submit" class="btn btn-light-success btn-sm float-end" value="Submit" id="btn-submit">
    </div>
</div>
</form>
</form>

<script>
    $('#schools,#job_titles,#sexes').select2({
        dropdownParent: $('#modal'),
    });

    $('[init-editor]').each(function() {
        var textarea = $(this);

        var id = textarea.attr('id');
        if (!id) {
            id = generateID();
            textarea.attr('id', id);
        }

        ClassicEditor
            .create(document.querySelector('#' + id), {
                toolbar: ['undo', 'redo', '|', 'bold', 'italic', '|', 'bulletedList', 'numberedList', ]
            })
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
