<?php

namespace App\DataTables;

use App\Models\School;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SuppliersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['supplier', 'location', 'is_special', 'is_active'])
            ->editColumn('supplier', function (Supplier $model) {
                return view('pages.apps.suppliers.columns._supplier', compact('model'));
            })
            ->editColumn('location', function (Supplier $model) {
                $location = $model->city?->name_ar . ', ' . $model->region?->name_ar;
                return sprintf('<div class="fw-bold">%s</div>', $location);
            })
            ->editColumn('is_special', function (Supplier $model) {
                $class = $model->is_special ? 'badge-light-success' : 'badge-light-danger';
                return sprintf('<div class="badge ' . $class . ' fw-bold">%s</div>', $model->is_special ? 'Special' : 'General');

            })
            ->editColumn('is_active', function (Supplier $model) {
                $class = $model->is_active ? 'badge-light-success' : 'badge-light-danger';
                return sprintf('<div class="badge ' . $class . ' fw-bold">%s</div>', $model->is_active ? 'Active' : 'Inactive');

            })
            ->addColumn('action', function (Supplier $model) {
                return view('pages.apps.suppliers.columns._actions', compact('model'));
            })
            ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(Supplier $model): QueryBuilder
    {
        return $model
            ->select('id', 'name_ar', 'name_en', 'sort_order', 'logo_image', 'is_special',
                'is_active', 'city_id', 'region_id', 'supplier_type_id')
            ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('suppliers-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12'tr>><'d-flex justify-content-between'<'col-sm-12 col-md-5'i><'d-flex justify-content-between'p>>")
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(4)
            ->orderBy(5, false)
            ->responsive()
            ->pageLength(30);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('supplier')->addClass('d-flex align-items-center')->name('name_ar'),
            Column::make('location')->searchable(false),
            Column::make('is_active')->title('Active')->searchable(false),
            Column::make('is_special')->title('special')->searchable(false),
            Column::make('sort_order')->title('Order'),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(100)
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Schools_' . date('YmdHis');
    }
}
