@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">
               <div class="row">
               <div class="col-md-2">
                  <h5>Users</h5>
               </div>
               <div class="col-md-9">
                  <a href='{{route('user.create')}}' class='btn btn-primary'>Add User</a>
               </div>
               </div>
            </div>

            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif

               <table class="table table-borered" id="user">
                 <thead>
                  <tr>
                     <th>Name</th>
                     <th>Email</th>
                     <th>City</th>
                     <th>Gender</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if($users->count() > 1)
                  @foreach($users as $t)
                  <tr>
                     <td>{{$t->FullName}}</td>
                     <td>{{$t->email}}</td>
                     <td>{{$t->city->name}}</td>
                     <td>{{$t->gender}}</td>
                     <td>{{$t->status}}</td>
                     <td>
                      <a href="{{route('user.edit',$t->id)}}" class="btn btn-outline-success btn-sm" title="Edit User" data-toggle="tooltip">Edit</a>

                      <form method="POST" action="{{route('user.destroy',$t->id)}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" onclick="return confirm('Do you really want to Delete User? You cannot undone this.');" class="btn btn-outline-danger btn-sm mt-2"  name="submit" title="Delete User" data-toggle="tooltip">Delete</button>
                      </form>

                      <a class="btn btn-outline-success btn-sm mt-2 userstatus" title="Edit User" data-toggle="tooltip" data-id="{{$t->id}}">
                        @if($t->status == 'Approved')
                        Unapprove
                        @else
                        Approve
                        @endif
                      </a>
                     </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                     <td colspan="5" align="center">No Users Found.</td>
                  </tr>
                  @endif
                </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
<script>
$(function(){

    $('.userstatus').on('click',function(e){		
        e.preventDefault();
        var id = $(this).data('id');
        $.get('{{route("user.status")}}',{id:id},function(data){
          $('.userstatus').html(data.text);
        });
    });

    $('#user').DataTable({
        "paging": true,
              "lengthChange": true,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": true,
            language: {
              paginate: {
                next: '&#8594;', // or '→'
                previous: '&#8592;' // or '←'
              }
            }
      });
});
</script>
@endsection