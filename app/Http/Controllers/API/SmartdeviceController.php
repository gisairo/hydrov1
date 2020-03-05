<?php 

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Product;
use Validator;
use App\Smartdevice;


class SmartdeviceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sds = Smartdevice::all();


        return $this->sendResponse($sds->toArray(), 'Smartdevices retrieved successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'serial' => 'required',
            'description' => 'required',
            'manufacturer_id' =>'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $sd = Smartdevice::create($input);


        return $this->sendResponse($sd->toArray(), 'Smartdevice created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sd = Smartdevice::find($id);


        if (is_null($sd)) {
            return $this->sendError('Smartdevice not found.');
        }
        $name=$sd->manufacturer()[0]->name;


        return $this->sendResponse($sd->toArray(), $name.'Smartdevice retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Smartdevice $sd)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $sd->name = $input['name'];
        $sd->detail = $input['detail'];
        $sd->save();


        return $this->sendResponse($sd->toArray(), 'Smartdevice updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sd = Smartdevice::find($id);
        $sd->delete();


        return $this->sendResponse($sd->toArray(), 'Smartdevice deleted successfully.');
    }
}