<?php



namespace App\DataTables;



use App\Models\Blog;

use Yajra\DataTables\EloquentDataTable;

use Yajra\DataTables\Html\Column;

use Yajra\DataTables\Services\DataTable;



class BlogDataTable extends DataTable

{

    /**

     * Build DataTable class.

     *

     * @param mixed $query Results from query() method.

     * @return \Yajra\DataTables\DataTableAbstract

     */

    public function dataTable($query)

    {

        $dataTable = new EloquentDataTable($query);



        return $dataTable->addColumn('action', 'dashboard.blogs.datatables_actions')->editColumn('image', function ($q) {

            $url = $q->image;

            $url_components = parse_url($url);

            return '<img src="' . asset('storage').'/'. $q->image . '" alt="Image" style="max-width:70px; max-height:70px">';


            // if (isset($url_components['query'])) {



            //     parse_str($url_components['query'], $params);

            //     $key = $params['v'];

            //     return '<iframe width="400" height="200" src="https://www.youtube.com/embed/' . $key . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

            // } else {

            //     return '---';

            // }

        })->editColumn('url', function ($q) {

            return $q->url ? '<a href="' . $q->url . '" target="_blank"><i class="fa fa-link"></i></a>' : '----';

        })
        ->editColumn('desc_ar', function ($q) {
            return html_entity_decode(strip_tags($q->desc_ar));
           })
        ->editColumn('desc_en', function ($q) {
            return html_entity_decode(strip_tags($q->desc_en));
            })


        ->rawColumns([

            'image',

            'url',

            'action',

        ]);

    }



    /**

     * Get query source of dataTable.

     *


     * @return \Illuminate\Database\Eloquent\Builder

     */


        public function query(Blog $model)
        {
            return $model->select(['id','title_ar', 'title_en', 'desc_ar', 'desc_en', 'image']);
        }




    /**

     * Optional method if you want to use html builder.

     *

     * @return \Yajra\DataTables\Html\Builder

     */

    public function html()

    {

        return $this->builder()

            ->columns($this->getColumns())

            ->minifiedAjax()

            ->addAction(['width' => '120px', 'printable' => false, 'title' => 'الخيارات'])

            ->parameters([

                'dom' => 'Bfrtip',

                'stateSave' => true,

                'order' => [[0, 'desc']],

                'buttons' => [

                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner', 'text' => '<i class="fa fa-print"></i> ' . __('auth.app.print') . ''],

                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner', 'text' => '<i class="fa fa-undo"></i> ' . __('auth.app.reset') . ''],

                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner', 'text' => '<i class="fa fa-retweet"></i> ' . __('auth.app.reload') . ''],

                ],

                'language' => [

                    'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/Arabic.json'),

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
            'title_ar' => new Column(['title' => 'العنوان بالعربي', 'data' => 'title_ar', 'searchable' => true]),
            'title_en' => new Column(['title' => 'العنوان بالانجليزي', 'data' => 'title_en', 'searchable' => true]),
            'desc_ar' => new Column([
                'title' => 'التفاصيل بالعربي',
                'data' => 'desc_ar', // Assuming 'desc_ar' is a string column in the database
                'searchable' => true,
            ]),
            'desc_en' => new Column([
                'title' => 'التفاصيل بالانجليزي',
                'data' => 'desc_en', // Assuming 'desc_en' is a string column in the database
                'searchable' => true,
            ]),
            'image' => new Column(['title' => 'الصورة', 'data' => 'image', 'searchable' => false]),
        ];
    }





    /**

     * Get filename for export.

     *

     * @return string

     */

    protected function filename()

    {

        return 'blogs_datatable_' . time();

    }

}

