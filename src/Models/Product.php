<?php
/**
 * file Product.php.
 * created: 24.07.15
 * @author: Aleksey Proskurnov
 * @copyright Copyright (c) 2015, Aleksey Proskurnov
 */

namespace AProskurnov\Product\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'products';
    protected $fillable = ['art', 'name'];

}