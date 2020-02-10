<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ServiceRequests, VehicleModels};
use App\Http\Requests\StoreServiceRequest;
class ServiceRequestsController extends Controller {

  /**
   * [Display a paginated list of Service Requests in the system]
   * @return view
   */

  public function store(StoreServiceRequest $request){
    $validator = $request->validated();
    if ($validator->fails()) {
      \Session::flash('error', $validator->messages()->first());
      return redirect()->back()->withInput();
    }
    
        
  }

  public function create(){
    $vehicleModels = VehicleModels::orderBy('updated_at','desc')->get();
    return view('createServiceTicket', ['vehicles' => $vehicleModels]);
  }
  public function index(){
    $requests = ServiceRequests::orderBy('updated_at','desc')->paginate(20);
    return view('index',compact('requests'));
  }
  /**
   * [This is the method you should use to show the edit screen]
   * @param  ServiceRequests $serviceRequest [get the object you are planning on editing]
   * @return ...
   */
  public function edit(ServiceRequests $serviceRequest){

  }
}
