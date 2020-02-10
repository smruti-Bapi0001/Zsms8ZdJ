<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ServiceRequests, VehicleModels, VehicleMakes};
use App\Http\Requests\StoreServiceRequest;
class ServiceRequestsController extends Controller {

  /**
   * [Display a paginated list of Service Requests in the system]
   * @return view
   */

  public function store(StoreServiceRequest $request){     
      $validator = \Validator::make($request->all(), $request->rules());
          
      if ($validator->fails()) {
          return response()->json(['errors' => $validator->errors()->all()]);
      }
      $service = new ServiceRequests;
      $service->client_name = $request->name;
      $service->client_email = $request->email;
      $service->client_phone = $request->phone;
      $service->vehicle_model_id = $request->vehicleModel;    
      $service->description = $request->description;   
      $service->save();    
      return response()->json(['success' => $service]);  
  }

  public function create(){
    $vehicleMakes = VehicleMakes::orderBy('updated_at','desc')->get();
    return view('createServiceTicket', ['vehicles' => $vehicleMakes]);
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
  public function editService(ServiceRequests $serviceRequest){
    // dd($serviceRequest->client_name);
    $vehicleMakes = VehicleMakes::orderBy('updated_at','desc')->get();
    $vehicleModels = VehicleModels::where('vehicle_make_id', $serviceRequest->vehicleModel->vehicleMake->id)->get();
    return view('editService', ['serviceRequest' => $serviceRequest, 'vehicles' => $vehicleMakes, 'vehicleModels' => $vehicleModels]);
  }

  public function edit(ServiceRequests $serviceRequest, Request $request){
      $serviceRequest->client_name = $request->name;
      $serviceRequest->client_email = $request->email;
      $serviceRequest->client_phone = $request->phone;
      $serviceRequest->vehicle_model_id = $request->vehicleModel;    
      $serviceRequest->description = $request->description;   
      $serviceRequest->save();
      return response()->json(['success' => $serviceRequest]); 
  }

  public function vehicleModel(VehicleMakes $vehicleMake){
    
    $vehicleModels = $vehicleMake->vehicleModels->pluck('id', 'title')->toArray();
    return response()->json(['data' => $vehicleModels]);
  }

  public function delete(ServiceRequests $id){
    $id->delete();
    dd($id->delete());
    return response()->json(['data' => "deleted successfully"]); 
  }
}
