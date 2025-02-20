<?php

namespace App\DataTables;

use App\Models\Post;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PostDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'dashboard.posts.datatables_actions')
            ->editColumn('image', function ($record) {
                return $record->image ?
                    '<img src="' . asset('storage/' . $record->image) . '" alt="Image" style="max-width:70px; max-height:70px">'
                    : 'لا توجد صورة';
            })
            ->editColumn('body', function ($record) {
                return html_entity_decode(strip_tags($record->body));
            })
            ->rawColumns(['action', 'image']);
    }

    /**
     * Get query source of dataTable.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Post $model)
    {
        return $model->select(['id', 'title', 'body', 'image']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('posts-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => 'الخيارات'])
            ->parameters([
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'create', 'className' => 'btn btn-success btn-sm no-corner', 'text' => '<i class="fa fa-plus"></i> ' . __('إضافة جديد')],
                    ['extend' => 'print', 'className' => 'btn btn-primary btn-sm no-corner', 'text' => '<i class="fa fa-print"></i> ' . __('طباعة')],
                    ['extend' => 'reset', 'className' => 'btn btn-warning btn-sm no-corner', 'text' => '<i class="fa fa-undo"></i> ' . __('إعادة تحميل')],
                ],
                'language' => [
                    'url' => '//cdn.datatables.net/plug-ins/1.10.12/i18n/Arabic.json',
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => new Column(['title' => 'الرقم', 'data' => 'id']),
            'title' => new Column(['title' => 'العنوان', 'data' => 'title']),
            'body' => new Column(['title' => 'المحتوى', 'data' => 'body']),
            'image' => new Column(['title' => 'الصورة', 'data' => 'image']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'posts_' . date('YmdHis');
    }
}
