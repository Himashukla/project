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
               
               <form action="{{route('user.update',$user->id)}}" method="POST">
                  @csrf
                <input type="hidden" name="_method" value="PUT">
                <table class="table table-borered">
                      <tr>
                        <th>First Name</th>
                        <td><input type="text" name="firstname" class="form-control" value="{{$user->firstname}}"></td>
                      </tr> 
                      <tr>
                        <th>Last Name</th>
                        <td><input type="text" name="lastname" class="form-control" value="{{$user->lastname}}"></td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td><input type="email" name="email" class="form-control" value="{{$user->email}}"></td>
                      </tr>
                      <tr>
                        <th>City</th>
                        <td>
                          <div class="row">
                            @foreach ($city as $c)
                            <div class="col-md-3">
                              <input type="radio" name="city_id" value="{{$c->id}}" @if($user->city_id == $c->id) checked @endif> {{$c->name}}
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
                              <input type="checkbox" name="hobbies[]" value="{{$h->id}}" @if(in_array($h->id,$user->hobbies->pluck('id')->toArray())) checked @endif> {{$h->name}}
                            </div>
                            @endforeach
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th>Gender</th>
                        <td>
                          <input type="radio" name="gender" value="Male" @if('Male' == $user->gender) checked @endif> Male
                          <input type="radio" name="gender" value="Female" @if('Female' == $user->gender) checked @endif> Female
                          <input type="radio" name="gender" value="Other" @if('Other' == $user->gender) checked @endif> Other
                        </td>
                      </tr>
                      <tr>
                        <th>Status</th>
                        <td>
                          <input type="radio" name="status" value="Approved" @if('Approved' == $user->status) checked @endif> Approved
                          <input type="radio" name="status" value="Unapproved" @if('Unapproved' == $user->status) checked @endif> Unapproved
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