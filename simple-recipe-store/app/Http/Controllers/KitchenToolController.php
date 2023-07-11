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
        return redirect()->route('kitchentool.list');
    }
    public function delete($id)
    {
        $this->kitchentoolService->deleteKitchenTool($id);
        return redirect()->route('kitchentool.list');
    }
}
