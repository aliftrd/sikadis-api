<?php

namespace App\DataTables;

use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AcademicYearDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['action'])
            ->addColumn('action', function (AcademicYear $academicYear) {
                return view('pages.academic-year.column.actions', compact('academicYear'));
            })
            ->editColumn('ppdb', function (AcademicYear $academicYear) {
                return view('components.column.status', [
                    'status' => $academicYear->ppdb,
                ]);
            })
            ->editColumn('status', function (AcademicYear $academicYear) {
                return view('components.column.status', [
                    'status' => $academicYear->status,
                ]);
            })
            ->editColumn('updated_at', fn($data) => $data->updated_at->diffForHumans())
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(AcademicYear $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->parameters([
                'language' => ['url' => asset('vendor/datatables/plugins/Indonesian.json')]
            ])
            ->setTableId('academic-year-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title('#'),
            Column::make('year')->title('Tahun Ajaran'),
            Column::make('ppdb')->title('PPDB'),
            Column::make('status'),
            Column::make('updated_at')->title('Terakhir diubah'),
            Column::computed('action')
                ->title('Aksi')
                ->exportable(false)
                ->printable(false)
                ->width(150),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'AcademicYear_' . date('YmdHis');
    }
}
