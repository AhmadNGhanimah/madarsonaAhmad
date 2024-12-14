<x-default-layout>

    @section('title')
        Schools Grades
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('schools.grades.index',$school) }}
    @endsection

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                           class="form-control form-control-solid w-250px ps-13" placeholder="Search Grades"
                           id="mySearchInput"/>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->


            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <a id="add_btn" type="button" class="btn btn-primary">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Add Schools Grades
                    </a>

                </div>

            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            addModal('add_btn', '{{ route('schools.grades.create',$school) }}', 'Add Grade', 'gradeForm', 'school-grades-table');
            editModal('edit_btn', 'schools/' + {{$school->id}} + '/grades', 'Edit Grade', 'gradeForm', 'school-grades-table')
            remove('remove_btn', 'schools/' + {{$school->id}} + '/grades', 'school-grades-table', '{{ csrf_token() }}')

            document.getElementById('mySearchInput').addEventListener('keyup', function () {
                window.LaravelDataTables['school-grades-table'].search(this.value).draw();
            });

        </script>
    @endpush

</x-default-layout>
