<?php

namespace App\DataTables;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AllNewsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['is_urgent'])
            ->addIndexColumn()
            ->editColumn('is_urgent', function (News $model) {
                $class = $model->is_urgent ? 'badge-light-success' : 'badge-light-danger';
                return sprintf('<div class="badge ' . $class . ' fw-bold">%s</div>', $model->is_urgent ? 'Yes' : 'NO');

            })
            ->addColumn('action', function (News $model) {
                return view('pages/apps.default._actions', compact('model'));
            });
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(News $model): QueryBuilder
    {
        return $model->whereNull('school_id')->latest()->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->addIndex()
            ->setTableId('news-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12'tr>><'d-flex justify-content-between'<'col-sm-12 col-md-5'i><'d-flex justify-content-between'p>>")
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->responsive()
            ->pageLength(30);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->name('id')->title('#')->addClass('text-center'),
            Column::make('title_ar')->addClass('text-capitalize text-center'),
            Column::make('is_urgent')->title('Urgent')->searchable(false),
            Column::make('expiration_date'),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(60)
        ];
    }


}
