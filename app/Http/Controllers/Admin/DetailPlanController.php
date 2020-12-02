<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailPlanRequest;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index($url)
    {
        try {
            $plan = Plan::where('url',$url)->firstOrFail();
            $details = $plan->details()->paginate(5);
            return view('admin.pages.plans.details.index',[
                'details' => $details,
                'plan' => $plan
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($url)
    {
        $plan = Plan::where('url',$url)->firstOrFail();
        return view('admin.pages.plans.details.create',[            
            'plan' => $plan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetailPlanRequest $request, $url)
    {        
        $plan = Plan::where('url',$url)->firstOrFail();
        $plan->details()->create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url, $id)
    {
       return redirect()->route('details.edit',[
           'url'=>$url,
           'detail'=>$id,
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($url, $id)
    {       
        $plan = Plan::where('url',$url)->firstOrFail();
        $detail = $plan->details()->where('id',$id)->firstOrFail();
        return view('admin.pages.plans.details.edit',[
            'plan' => $plan,
            'detail' => $detail,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DetailPlanRequest $request,$url, $id)
    {        
        $plan = Plan::where('url',$url)->firstOrFail();
        $plan->details()->where('id',$id)->update($request->except('_token','_method'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($url, $id)
    {
        //dd($url, $id);
        Plan::where('url',$url)->firstOrFail()->details()->where('id',$id)->delete();
        return redirect()->back();
    }
}
