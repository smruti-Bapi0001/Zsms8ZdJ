@extends('layouts.main')
@section('content')
  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Let's get your vehicle back on the trail!</h1>
        </div>
      </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
  </header>
   <!-- List Tickets -->
  <section class="bg-light">
  <div class="alert alert-success" role="alert" id="flashShow"  style = "display:none; text-align:center"> Successfully submited</div>
    <div class="container">
        <!-- <div class="row"> -->
        
            <!-- <form name="frm" method="POST" action="{{url('/storeServiceRequest')}}" id="submitFrm"> -->
            <form name="frm"  id="submitFrm">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" value="{{ $serviceRequest->id}}" name="id" id="serviceId">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control"  placeholder="Enter name" name="name" value="{{ $serviceRequest->client_name }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" required placeholder="Enter email" name="email" value="{{ $serviceRequest->client_email }}">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" required placeholder="Enter phone" name="phone" value="{{ $serviceRequest->client_phone }}">
            </div>
            <div class="form-group">
            <label for="sel1">Select vehicle make:</label>
            <select class="form-control" name="vehicle" id="vehicleMake">
                @foreach($vehicles AS $vehicle)
                    @if($vehicle->id == $serviceRequest->vehicleModel->vehicleMake->id)
                        <option value="{{$vehicle->id}}" selected="selected">{{$vehicle->title}}</option>
                    @else
                        <option value="{{$vehicle->id}}">{{$vehicle->title}}</option>
                    @endif
                @endforeach                
            </select>
            </div>

            <div class="form-group">
            <label for="sel1">Select vehicle model:</label>
            <select class="form-control" name="vehicleModel" id="vehicleModel">                
                <option value="{{$serviceRequest->vehicleModel}}"> {{$serviceRequest->vehicleModel->title}}</option> 
                @foreach($vehicleModels AS $vehicleModel)
                    @if($vehicleModel->id == $serviceRequest->vehicleModel->id)
                        <option value="{{$vehicleModel->id}}" selected="selected">{{$vehicleModel->title}}</option>
                    @else
                        <option value="{{$vehicleModel->id}}">{{$vehicleModel->title}}</option>
                    @endif
                @endforeach                               
            </select>
            </div>
            
            <div class="form-group">
                <label for="name">Description:</label>
                <textarea class="form-control" rows="5" placeholder="Enter name" name="description">{{$serviceRequest->description}}</textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-success editButton" name="submitBtn">Submit</button>
            </div>
            
            </form>
        <!-- </div> -->
    </div>
    
  </section>
 
  @endsection

  