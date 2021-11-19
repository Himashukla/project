@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">
                  <h5>Create User</h5>
            </div>

            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
               
               <form action="{{route('user.store')}}" method="POST">
                  @csrf
                  
                <table class="table table-borered">
                      <tr>
                        <th>First Name</th>
                        <td><input type="text" name="firstname" class="form-control"></td>
                      </tr> 
                      <tr>
                        <th>Last Name</th>
                        <td><input type="text" name="lastname" class="form-control"></td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td><input type="email" name="email" class="form-control"></td>
                      </tr>
                      <tr>
                        <th>Password</th>
                        <td><input type="password" name="password" class="form-control"></td>
                      </tr> 
                      <tr>
                        <th>City</th>
                        <td>
                          <div class="row">
                            @foreach ($city as $c)
                            <div class="col-md-3">
                              <input type="radio" name="city_id" value="{{$c->id}}"> {{$c->name}}
                            </div>
                            @endforeach
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th>Hobby</th>
                        <td>
                          <div class="row">
                            @foreach ($hobby as $h)
                            <div class="col-md-3">
                              <input type="checkbox" name="hobbies[]" value="{{$h->id}}"> {{$h->name}}
                            </div>
                            @endforeach
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th>Gender</th>
                        <td>
                          <input type="radio" name="gender" value="Male"> Male
                          <input type="radio" name="gender" value="Female"> Female
                          <input type="radio" name="gender" value="Other"> Other
                        </td>
                      </tr>
                      <tr>
                        <th>Status</th>
                        <td>
                          <input type="radio" name="status" value="Approved"> Approved
                          <input type="radio" name="status" value="Unapproved"> Unapproved
                        </td>
                      </tr>                  
                </table>
               <div class="text-center"><input type="submit" name="submit" class="btn btn-primary"></div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection