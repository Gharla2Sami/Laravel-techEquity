@extends('layouts.admin')
@section('name', 'Events')
@section('nav')
   Edit Events
@endsection
@section('content')
<div class="col-12 text-center">
        <h3 class="title">{{ 'Edit '. $event->title }}</h3>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        @endif
    </div>
<form action="{{ route('event.update',$event->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group bmd-form-group">
                <label for="title" class="bmd-label-floating">Title</label>
                <input type="text" class="form-control" value="{{ $event->title }}" name="title" required id="title">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="topic" class="bmd-label-floating">Topic</label>
                <input type="text" class="form-control" value="{{$event->topic}}" name="topic" id="topic" required>
            </div>
            <div class="form-group">
                <label for="host" class="bmd-label-floating">host</label>
                <input type="text" class="form-control" value="{{$event->host}}" name="host" id="host" required>
            </div>
            <div class="form-group">
                <label for="venue" class="bmd-label-foating">Venue</label>
                <input type="text" class="form-control" value="{{$event->venue}}" name="venue" id="venue" required>
            </div>
            <div class="form-group">
                <label for="startdate" class="bmd-label-foating">Start Date</label>
                <input type="date" class="form-control" value="{{$event->startdate}}" name="startdate" id="startdate" required>
            </div>
            <div class="form-group">
                <label for="enddate" class="bmd-label-foating">end Date</label>
                <input type="date" class="form-control" value="{{$event->enddate}}" name="enddate" id="startdate" required>
            </div>
            <div class="form-group">
                <label for="time" class="bmd-label-foating">Time</label>
                <input type="time" class="form-control" name="time" id="time" value="{{$event->time}}" required>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <h4>Regular Image</h4>
            <div class="fileinput text-center fileinput-new" data-provides="fileinput">
              <div class="fileinput-new thumbnail img-raised">
                    @if (empty($event->image))
                        <img src="{{ asset('assets/img/image_placeholder.jpg') }}" alt="...">
                    @else
                        <img src="{{ asset('storage/'.$event->image) }}" alt="...">                            
                    @endif 
                </div>
              <div class="fileinput-preview fileinput-exists thumbnail img-raised" style=""></div>
              <div>
                <span class="btn btn-raised btn-round btn-default btn-file">
                  <span class="fileinput-new">Select image</span>
                  <span class="fileinput-exists">Change</span>
                  <input type="hidden" value="">
                  <input type="file" name="image">
                <div class="ripple-container"></div></span>
                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 99.7813px; top: 17.3281px; background-color: rgb(255, 255, 255); transform: scale(14.418);"></div></div></a>
              </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" cols="30" rows="7" class="form-control" id="editor" required placeholder='Enter description'>{{$event->description}}</textarea>
            </div>
        </div>
        <div class="col-12 text-center">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>
</form>
@endsection