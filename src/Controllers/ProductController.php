<?php
/**
 * file ProductController.php.
 * created: 24.07.15
 * @author: Aleksey Proskurnov
 * @copyright Copyright (c) 2015, Aleksey Proskurnov
 */
namespace AProskurnov\Product\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Config;

use AProskurnov\Product\Models\Product;


class ProductController extends Controller {

    public function index( )
    {

        return view('product::list', [
            'items'=>Product::orderBy('created_at')->paginate(10),
        ]);
    }

    public function create( )
    {
        return view('product::create');
    }
    public function store(Request $request)
    {

        $validateParam = [
            'name'                  =>  'required|min:10',
        ];

        if(Config::get('app.current_user_type') == 'admin'){
            $validateParam['art'] = 'required|regex:/^[a-zA-Z0-9]+$/|unique:products,art';
            $params = $request->all();
        }else{
            $params = $request->except('art');
        }
        $v = Validator::make($params, $validateParam);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        Product::create($request->all());
        return redirect('admin/product');
    }

    public function edit( $id )
    {

        return view('product::edit', [
            'item'=>Product::find($id),
        ]);
    }
    public function update( Request $request, $id )
    {

        $validateParam = [
            'name'                  =>  'required|min:10',
        ];

        if(Config::get('app.current_user_type') == 'admin'){
            $validateParam['art'] = 'required|regex:/^[a-zA-Z0-9]+$/|unique:products,art' . $id;
            $params = $request->all();
        }else{
            $params = $request->except('art');
        }
        $v = Validator::make($params, $validateParam);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $item = Product::find($id);
        $item->update($request->all());

        return redirect('admin/product');
    }
    public function destroy( $id )
    {
        Product::destroy( $id );
        return redirect('admin/product');
    }

}