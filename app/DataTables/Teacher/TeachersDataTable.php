<?php

namespace App\DataTables\Teacher;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TeachersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['action', 'is_active', 'contact_information', 'full_name_en'])
            ->editColumn('contact_information', function (Teacher $model) {
                $html = '<div class="fw-bold">' . $model->phone . '</div>';
                if ($model->email) {
                    $html .= '<div class="fw-bold">' . $model->email . '</div>';
                }
                return $html;
            })
            ->editColumn('full_name_en', function (Teacher $model) {
                $html = '<div class="fw-bold">' . $model->full_name_en . '</div>';
                $html .= '<div class="fw-bold">' . $model->full_name_ar . '</div>';
                return $html;
            })
            ->editColumn('is_active', function (Teacher $model) {
                $class = $model->is_active ? 'badge-light-success' : 'badge-light-danger';
                $html = '<div class="fw-bold">' . $model->subscription_date . ' - ' . $model->subscription_end_date . '</div>';
                $html .= sprintf('<div class="badge ' . $class . ' fw-bold">%s</div>', $model->is_active ? 'Active' : 'Inactive');
                return $html;
            })
            ->addColumn('action', function (Teacher $model) {
                return view('pages.apps.teachers.columns._actions', compact('model'));
            })
            ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(Teacher $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('teachers-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12'tr>><'d-flex justify-content-between'<'col-sm-12 col-md-5'i><'d-flex justify-content-between'p>>")
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(1, false)
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
            Column::make('subscription_number')->addClass('text-center')->title('Subscription ID')->width(150),
            Column::make('full_name_en')->addClass('text-center')->title('Name')->width(300),
            Column::make('contact_information')->searchable(false),
            Column::make('is_active')->addClass('text-center')->title('Active')->searchable(false),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(100),
            Column::make('full_name_ar')->hidden(),
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
