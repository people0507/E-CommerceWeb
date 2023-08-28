<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producer;
use Illuminate\Http\Request;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $producers = Producer::paginate(10);
        return view('admins.producers.table',compact('producers'));
    }


    public function search(Request $request){
        $query = $request->input('query');
        
        $producers = Producer::where('id', $query)
                     ->orWhere('producer_name', 'LIKE', "%$query%")
                     ->get();
        return view('admins.producers.table',compact('producers'));
    }
    

    public function create()
    {
        return view('admins.producers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'producer_name'          =>  'required',
        ]);

        try {
            $producer = new Producer;
            $producer->producer_name = $request->producer_name; 
            $producer->save();
            return redirect()->route('producer.index')->with('success', 'Add producer successfully!');
        } catch (\Exception $e) {
            return redirect()->route('producer.create')->with('failed', 'Add producer failed!');
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $producers = Producer::findOrFail($id);
        return view('admins.producers.edit',compact('producers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'producer_name'          =>  'required',
        ]);
        
        $producer = Producer::findOrFail($id);
    try {
        $producer->producer_name = $request->producer_name;
        $producer->save();
        return redirect()->route('producer.index')->with('success', 'Update producer successfully!');
    } catch (\Exception $e) {
        return redirect()->with('failed', 'Update producer failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $producer = Producer::findOrFail($id);
        $producer->delete();

    return redirect()->route('producer.index')->with('success','Delete producer successfully');
    }
}
