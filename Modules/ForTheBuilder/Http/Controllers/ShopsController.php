<?php

namespace Modules\ForTheBuilder\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ForTheBuilder\Http\Requests\ShopsRequest;
use Modules\ForTheBuilder\Entities\Shops;
use Modules\ForTheBuilder\Entities\Objects;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        $model = Shops::get();

        return view('forthebuilder::shops.index',[
            'model' => $model,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        $objects = Objects::all();
        return view('forthebuilder::shops.create',[
            'objects' => $objects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function add(ShopsRequest $request)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        $model = new Shops();
        $model->name = htmlspecialchars($_POST['name']);
        $model->brend = htmlspecialchars($_POST['brend']);
        $model->torg = htmlspecialchars($_POST['torg']);
        $model->object_id = (int)$_POST['object_id'];
        if ($model->save()) {
            return redirect()->route('forthebuilder.shops.index');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }

        $shop = Shops::find($id);
        $model = DB::select('SELECT sum(sum) AS total, add_time FROM members_purchases 
        WHERE shop_id = '.$id.' GROUP BY add_time ORDER BY add_time ASC');

        return view('forthebuilder::shops.show',[
            'model' => $model,
            'shop' => $shop,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function update($id)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        $model = Shops::find((int)$id);
        $objects = Objects::all();
        
        return view('forthebuilder::shops.update',[
            'model' => $model,
            'objects' => $objects
        ]);
        
    }

    public function save(ShopsRequest $request)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        $model = Shops::find($_POST['id']);
        if (isset($model)) {
            $model->name = htmlspecialchars($_POST['name']);
            $model->brend = htmlspecialchars($_POST['brend']);
            $model->torg = htmlspecialchars($_POST['torg']);
            $model->object_id = (int)$_POST['object_id'];
            if ($model->save()) {
                return redirect()->route('forthebuilder.shops.index');
            }
        }
    }
}
