<?php

namespace App\DataTables;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductVariantDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $variantItems = "<a href='".route('admin.product-variant-item.index', ['productId' => request()->product, 'variantId' => $query->id])."' class='btn btn-primary mr-2'><i class='fas fa-info'></i>Variant Items</a>";
                $editBtn = "<a href='".route('admin.products-variant.edit', $query->id)."' class='btn btn-primary'><i class='fas fa-edit'></i>Edit</a>";
                $deleteBtn = "<a href='".route('admin.products-variant.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='fas fa-trash'></i>Delete</a>";
               
                return $variantItems.$editBtn.$deleteBtn;
            })
            ->addColumn('status', function($query){
                if($query->status == 1){
                    $button = '<label class="custom-switch mt-2">
                <input type="checkbox" checked class="custom-switch-input change-status" data-id="'.$query->id.'" name="custom-switch-checkbox" />
                <span class="custom-switch-indicator"></span>
                </label>';
                }else{
                    $button = '<label class="custom-switch mt-2">
                <input type="checkbox" class="custom-switch-input change-status" data-id="'.$query->id.'" name="custom-switch-checkbox" />
                <span class="custom-switch-indicator"></span>
                </label>';
                }
                return $button;
            })
            ->rawColumns(['status','action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductVariant $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('productvariant-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
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
            Column::make('id')->width(80),
            Column::make('name')->width(300),
            Column::make('status')->width(200),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProductVariant_' . date('YmdHis');
    }
}
