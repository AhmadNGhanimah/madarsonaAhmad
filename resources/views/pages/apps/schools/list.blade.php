<x-default-layout>

    @section('title')
        Schools
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('schools.index') }}
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
                           class="form-control form-control-solid w-250px ps-13" placeholder="Search Schools"
                           id="mySearchInput"/>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->


            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <a type="button" class="btn btn-primary" href="{{route('schools.create')}}">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Add Schools
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
            remove('remove_btn', 'schools', 'schools-table', '{{ csrf_token() }}')

            document.getElementById('mySearchInput').addEventListener('keyup', function () {
                window.LaravelDataTables['schools-table'].search(this.value).draw();
            });

            $(document).on('click', '.btn_gallery_school', function () {
                let id = $(this).attr('id');
                let school_name = $(this).attr('data-school-name')
                $.ajax({
                    url: '/schools/' + id + '/gallery',
                    method: 'get',
                    success: function (data) {
                        $('#modal-body').html(data);
                        $('#modal-title').html('Gallery <span class="text-primary">' + school_name + '</span>');
                        $('#modal').modal('show');
                    }
                });
            });

        </script>
    @endpush

</x-default-layout>
