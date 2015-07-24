<?php
/**
 * file routes.php.
 * created: 24.07.15
 * @author: Aleksey Proskurnov
 * @copyright Copyright (c) 2015, Aleksey Proskurnov
 */

Route::resource('admin/product', 'AProskurnov\Product\Controllers\ProductController',
    ['except' => ['show']]);