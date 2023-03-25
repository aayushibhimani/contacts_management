@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Contact</div>
                <div class="card-body">
                    
                    <form action="{{ route('contacts.update',$contact->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                       
                       <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text"
                                        value="{{old('first_name',$contact->first_name)}}"
                                        class="form-control @error('first_name') is-invalid @enderror"
                                        name="first_name" id="first_name">
                                @error('first_name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                           </div>
    
                           <div class="col-md-4">
                                <div class="form-group">
                                    <label for="middle_name">Middle Name</label>
                                    <input type="text"
                                            value="{{old('middle_name',$contact->middle_name)}}"
                                            class="form-control @error('middle_name') is-invalid @enderror"
                                            name="middle_name" id="middle_name">
                                    @error('middle_name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                           </div>

                           <div class="col-md-4">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text"
                                        value="{{old('last_name',$contact->last_name)}}"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        name="last_name" id="last_name">
                                @error('last_name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                           </div>
                   
                       </div>


                        <div class="form-group">
                            <label for="mobile">Mobile Number</label>
                            <input type="number"
                                    value="{{old('mobile',$contact->mobile)}}"
                                    class="form-control @error('mobile') is-invalid @enderror"
                                    name="mobile" id="mobile">
                            @error('mobile')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                  
                       <div class="form-group">
                            <label for="landline">Landline</label>
                            <input type="number"
                                    value="{{old('landline',$contact->landline)}}"
                                    class="form-control @error('landline') is-invalid @enderror"
                                    name="landline" id="landline">
                            @error('landline')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text"
                                    value="{{old('email',$contact->email)}}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email">
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                                      
                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <input id="notes" type="hidden" name="notes">
                                    <textarea class="form-control @error('notes') is-invalid @enderror"
                                    name="notes" id="notes" rows="4" value="{{old('notes',$contact->notes)}}">{{old('notes',$contact->notes)}}</textarea>
                            @error('notes')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file"
                                    value="{{old('image')}}"    
                                    class="form-control @error('image') is-invalid @enderror"
                                    name="image" id="image">
                            @error('image')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group pt-3">
                            <button class="btn btn-success" type="submit">Edit Contact</button>
                        </div>
                    </form>


                        
                </div>
            </div>
        </div>
    </div>
</div>

@endsection