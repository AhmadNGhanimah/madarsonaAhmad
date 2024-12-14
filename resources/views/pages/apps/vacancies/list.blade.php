<x-default-layout>

    @section('title')
        Vacancies
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('vacancies.index') }}
    @endsection

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                           class="form-control form-control-solid w-250px ps-13" placeholder="Search Vacancy"
                           id="mySearchInput"/>
                </div>
            </div>


            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <a id="add_btn" type="button" class="btn btn-primary">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Add Vacancy
                    </a>

                </div>

            </div>
        </div>

        <div class="card-body py-4">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            addModal('add_btn', '{{ route('vacancies.create') }}', 'Add Vacancy', 'vacanciesForm', 'vacancies-table');
            editModal('edit_btn', 'vacancies', 'Edit Vacancy', 'vacanciesForm', 'vacancies-table')
            remove('remove_btn', 'vacancies', 'vacancies-table', '{{ csrf_token() }}')

            document.getElementById('mySearchInput').addEventListener('keyup', function () {
                window.LaravelDataTables['vacancies-table'].search(this.value).draw();
            });

        </script>
    @endpush

</x-default-layout>
