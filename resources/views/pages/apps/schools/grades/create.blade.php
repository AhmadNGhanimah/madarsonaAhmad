@if(isset($grade))
    <form action="{{ route('schools.grades.update', [$school_id,$grade]) }}" id="gradeForm"
          method="POST"
          enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @else
            <form action="{{ route('schools.grades.store', $school_id) }}" method="POST"
                  id="gradeForm"
                  enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Curriculum Type</label>
                        <select id="select2_curriculum_type" class="form-select form-select-solid"
                                name="curriculum_type"
                                data-placeholder="Select a Curriculum Type">
                            <option></option>
                            <option value="national"  @if(isset($grade) && 'national' === $grade->curriculum_type) selected @endif> National</option>
                            <option value="international" @if(isset($grade) && 'international' === $grade->curriculum_type) selected @endif> International</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Grade</label>
                        <select id="select2_grade" class="form-select form-select-solid" name="grade_id"
                                data-placeholder="Select a Grade">
                            <option></option>
                            @foreach($grades as $item)
                                <option value="{{$item->id}}" class="text-capitalize"
                                        @if(isset($grade) && $item->id === $grade->grade_id) selected @endif>
                                    {{$item->title_en}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Price</label>
                        <input type="number" name="price" class="form-control form-control-solid-bg mb-2"
                               autocomplete="off"
                               placeholder="Price"
                               @isset($grade) value="{{ $grade->price }}" @endisset>
                    </div>

                    <div class="col-md-12 form-group">
                        <input type="submit" class="btn btn-light-success btn-sm float-end" value="Submit"
                               id="btn-submit">
                    </div>
                </div>
            </form>
    </form>
    <script>
        $('#select2_grade,#select2_curriculum_type').select2({
            dropdownParent: $('#modal'),
        });
    </script>
