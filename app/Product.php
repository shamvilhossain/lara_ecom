<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SearchableTrait;
    protected $table = 'tbl_product';

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'tbl_product.product_name' => 10,
            'tbl_product.product_short_description' => 7,
            'tbl_product.product_long_description' => 2
        ],
    ];
}
