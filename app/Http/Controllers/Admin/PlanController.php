<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlansRequest;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('admin.pages.plans.index',[
            'plans' => Plan::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlansRequest $request)
    {        
        Plan::create($request->all());
        return redirect()->route('plans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {            
            return view('admin.pages.plans.show', [
                'plan' => Plan::where('url',$id)->firstOrFail()
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {            
            return view('admin.pages.plans.create', [
                'plan' => Plan::where('url',$id)->firstOrFail()
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {            
            Plan::where('url',$id)->update($request->except('_token','_method'));
            return redirect()->back();
            //return redirect()->route('plans.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {            
            $plan = Plan::where('url',$id)
            ->with('details')
            ->first();
            
            if(!$plan || $plan->details->count() > 0)
                return redirect()->back()->with('message','Plano não pode ser excluido, verifique se o plano possui detalhes!');  
            

            $plan->delete();
            return redirect()->route('plans.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function search(Request $request)
    {   
        $plan = new Plan();
        $plans = $plan->search($request->search);
        return view('admin.pages.plans.index',[
            'plans' => $plans,
            'search' => $request->search
        ]);
        
    }
}
