<?php

namespace App\Http\Controllers;

use App\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkOrderController extends Controller
{
    /**
     * WorkOrderController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show create work order form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('work-order.create');
    }

    /**
     * Store new Work Order data to DB
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // validating request
        $request->validate([
            'order_date' => 'required',
            'customer_name' => 'required',
            'customer_address' => 'required',
            'phone_number' => 'required',
            'sto' => 'required',
            'source' => 'required',
            'ref_id' => 'required'
        ]);

        try {
            // storing to db
            DB::beginTransaction();
            $workOrder = new WorkOrder();
            $workOrder->fill($request->except('_token'));
            $workOrder->order_date = now();
            $workOrder->status = 'PT1';
            $workOrder->save();

            // committing db transaction and redirect to home if success
            DB::commit();
            return redirect(route('home'))->with([
                'status' => 'Work Order successfully created.'
            ]);
        } catch (\Exception $e) {
            // rollback db transaction and redirect back with error message
            DB::rollBack();
            return redirect()->back()->with([
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show edit form with
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('work-order.edit')->with([
            'workOrder' => WorkOrder::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        // validating request
        $request->validate([
            'order_date' => 'required',
            'customer_name' => 'required',
            'customer_address' => 'required',
            'phone_number' => 'required',
            'status' => 'required',
            'ref_id' => 'required',
            'description' => 'required',
            'surveyor' => 'required'
        ]);

        try {
            // start db transaction and updating work order data
            DB::beginTransaction();
            $workOrder = WorkOrder::findOrFail($id);
            $workOrder->fill($request->except(['_token', '_method']));
            $workOrder->save();

            // committing db transaction and redirect to home
            DB::commit();
            return redirect(route('home'))->with([
                'status' => 'Work Order successfully updated.'
            ]);
        } catch (\Exception $e) {
            // rolling back db transaction and redirect back with error message
            DB::rollBack();
            return redirect()->back()->with([
                'error' => $e->getMessage()
            ]);
        }
    }
}
