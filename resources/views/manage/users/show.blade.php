@extends('layouts.manage')
@section('content')
<div class="flex-container">
<div class="columns m-t-10">
<div class="column">
<h1 class="title"> View User
</h1>
</div>
    <div class="column">
    <a href="{{route('users.edit', $user->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i>
     Edit user </a> </div>
    </div> 
    <hr class="m-t-0">
    <div class="columns">
<div class="column">
    <div class="field">
<label for="name" class="label">Name</label>
<pre>{{$user->name}}</pre>
</div> 
<div class="field">
        <div class="field">
        <label for="email" class="label">Email</label>
        <pre>{{$user->email}}</pre>
        </div>
        </div> 
        <div class="field">
            <div class="field">
            <label for="roles" class="label">Roles</label>
            {{$user->roles->count() == 0 ? 'This user has no roles': '' }}
        @foreach($user->roles as $role)
        <ul>
        <li>{{$role->display_name}} ({{$role->description}})</li>
        </ul>
        @endforeach
            </div>
            </div> 
        </div> 

</div>





</div>
@endsection