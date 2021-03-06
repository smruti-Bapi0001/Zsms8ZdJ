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
  <div class="alert alert-danger" role="alert" id="flashShowError"  style = "display:none; text-align:center"> Please fill the required fields</div>
    <div class="container">
        <!-- <div class="row"> -->
        
            <!-- <form name="frm" method="POST" action="{{url('/storeServiceRequest')}}" id="submitFrm"> -->
            <form name="frm"  id="submitFrm">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control"  placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" required placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" required placeholder="Enter phone" name="phone">
            </div>
            <div class="form-group">
            <label for="sel1">Select vehicle make:</label>
            <select class="form-control" name="vehicle" id="vehicleMake">
            <option value="">Select vehicle make</option>
                @foreach($vehicles AS $vehicle)
                    <option value="{{$vehicle->id}}">{{$vehicle->title}}</option>
                @endforeach                
            </select>
            </div>

            <div class="form-group">
            <label for="sel1">Select vehicle model:</label>
            <select class="form-control" name="vehicleModel" id="vehicleModel" required="required">                
                <option value=""></option>                               
            </select>
            </div>
            
            <div class="form-group">
                <label for="name">Description:</label>
                <textarea class="form-control" rows="5" placeholder="Enter name" name="description"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-success submitButton" name="submitBtn">Submit</button>
            </div>
            
            </form>
        <!-- </div> -->
    </div>
    
  </section>
 
  @endsection

  