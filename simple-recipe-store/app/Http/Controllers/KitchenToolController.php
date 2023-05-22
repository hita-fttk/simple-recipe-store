<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\KitchenToolService;

class KitchenToolController extends Controller
{
    private $kitchentoolService;

    public function __construct(KitchenToolService $kitchentoolService)
    {
        $this->kitchentoolService = $kitchentoolService;
    }

    public function list()
    {
        $kitchentools = $this->kitchentoolService->fetchKitchenToolList();

        return view('kitchentool_list',compact('kitchentools'));
    }

    public function store_view()
    {
        return view('/kitchentool_resister');
    }
    
    public function store(Request $request)
    {
        $kitchentools = $this->kitchentoolService->createKitchenTool($request->name);
        dd($kitchentools);
        return view('kitchentool_list',compact('kitchentools'));

    }
}
