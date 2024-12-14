<?php

namespace App\DataTables;

use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SubscriptionsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['is_read'])
            ->addIndexColumn()
            ->editColumn('institution_name', function (Subscription $model) {
                return Str::limit($model->institution_name, 50);
            })
            ->editColumn('is_read', function (Subscription $model) {
                $class = $model->is_read ? 'badge-light-success' : 'badge-light-danger';
                return sprintf('<div class="badge ' . $class . ' fw-bold">%s</div>', $model->is_read ? 'Yes' : 'NO');
            })
            ->editColumn('created_at', function (Subscription $model) {
                return Carbon::parse($model->created_at)->format('d M Y h:i a');
            })
            ->addColumn('action', function (Subscription $model) {
                return view('pages/apps.default._actions', compact('model'));
            });
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(Subscription $model): QueryBuilder
    {
        return $model->latest()->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->addIndex()
            ->setTableId('subscriptions-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12'tr>><'d-flex justify-content-between'<'col-sm-12 col-md-5'i><'d-flex justify-content-between'p>>")
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->responsive()
            ->pageLength(60);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->name('id')->title('#')->addClass('text-center'),
            Column::make('institution_name')->addClass('text-capitalize')->title('Name')->addClass('text-center'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('type'),
            Column::make('is_read')->title('Read'),
            Column::make('created_at')->title('Subscription At'),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(60)
        ];
    }


}
