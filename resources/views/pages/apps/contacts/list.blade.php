<x-default-layout>

    @section('title')
        Contacts
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('contacts.index') }}
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
                           class="form-control form-control-solid w-250px ps-13" placeholder="Search Contacts"
                           id="mySearchInput"/>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->


            <div class="card-toolbar">

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
            editModal('edit_btn', 'contacts', 'Show Contact', 'contactsForm', 'contacts-table',true)
            remove('remove_btn', 'contacts', 'contacts-table', '{{ csrf_token() }}')

            document.getElementById('mySearchInput').addEventListener('keyup', function () {
                window.LaravelDataTables['contacts-table'].search(this.value).draw();
            });

        </script>
    @endpush

</x-default-layout>