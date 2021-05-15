<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Cupon;
use Illuminate\Http\Request;
use App\Http\Requests\CuponRequest;
use App\Http\Controllers\Controller;


class CuponController extends Controller
{


    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:cupons_read'])->only('index');
        $this->middleware(['permission:cupons_create'])->only('create');
        $this->middleware(['permission:cupons_update'])->only('edit');
        $this->middleware(['permission:cupons_delete'])->only('destroy');

    }//end of constructor

    public function index(Request $request)
    {
        $cupons = Cupon::when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('end', 'like', '%' . $request->search . '%')
                ->orWhere('value', 'like', '%' . $request->search . '%');
                // ->orWhere('address', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.cupons.index', compact('cupons'));
    }//end of index


    public function create()
    {
        return view('dashboard.cupons.create');
    }//end of create


    public function store(CuponRequest $request)
    {
        
        try {

            Cupon::create($request->all());

            notify()->success(__('home.added_successfully'));
            return redirect()->route('dashboard.cupons.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }//end try

    }//end of store


    public function edit(cupon $cupon)
    {
        return view('dashboard.cupons.edit',compact('cupon'));
    }//end of edit


    public function update(CuponRequest $request, cupon $cupon)
    {
        try {

            $cupon->update($request->all());

            notify()->success(__('home.updated_successfully'));
            return redirect()->route('dashboard.cupons.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }//end try
    }//end of update

    public function destroy(cupon $cupon)
    {
        $cupon->delete();
        notify()->success(__('home.deleted_successfully'));
        return redirect()->route('dashboard.cupons.index');
    }//end of destroy

}//end of controller
