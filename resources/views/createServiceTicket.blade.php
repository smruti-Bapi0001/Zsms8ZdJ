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
  </header>
  <meta name="csrf-token" content="{{ csrf_token() }}"> 
  <!-- List Tickets -->
  <section class="bg-light">
    <div class="container">
        <div class="row">
            <form name="frm" method="POST" action="{{url('/createServiceRequest')}}" >
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
            <label for="sel1">Select list:</label>
            <select class="form-control" id="sel1">
                @foreach($vehicles AS $vehicle)
                    <option value="{{$vehicle->id}}">{{$vehicle->title}}</option>
                @endforeach                
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
        </div>
    </div>
  </section>

@endsection