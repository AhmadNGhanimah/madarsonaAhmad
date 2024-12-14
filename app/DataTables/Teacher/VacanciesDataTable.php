<?php

namespace App\DataTables\Teacher;

use App\Models\Teacher;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class VacanciesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['action', 'status'])
            ->editColumn('status', function (Vacancy $model) {
                $class = $model->status ? 'badge-light-success' : 'badge-light-danger';
                $html = '<div class="fw-bold">' . $model->start_date . ' - ' . $model->end_date . '</div>';
                $html .= sprintf('<div class="badge ' . $class . ' fw-bold">%s</div>', $model->status ? 'Active' : 'Inactive');
                return $html;
            })
            ->addColumn('action', function (Vacancy $model) {
                return view('pages.apps.default._actions', compact('model'));
            })
            ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(Vacancy $model): QueryBuilder
    {
        return $model->select('vacancies.*', 'schools.name_ar as school_name',
            'job_titles.name_ar as job_title_name', 'sexes.name_ar as sexes_name',)
            ->leftJoin('schools', 'schools.id', '=', 'vacancies.school_id')
            ->leftJoin('job_titles', 'job_titles.id', '=', 'vacancies.job_title_id')
            ->leftJoin('sexes', 'sexes.id', '=', 'vacancies.sex_id');

    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('vacancies-table')
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
            Column::make('school_name')->title('school')->name('schools.name_ar'),
            Column::make('job_title_name')->title('job')->name('job_titles.name_ar'),
            Column::make('sexes_name')->title('sex')->name('sexes.name_ar'),
            Column::make('status')->addClass('text-center')->title('Active')->searchable(false),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(100),
        ];
    }
}
