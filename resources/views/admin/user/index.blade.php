@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                               
                            </tr>
                        </tfoot> --}}
                        <tbody>

                            @foreach ($users as $user)
                            <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{implode(',',$user->roles()->get()->pluck('name')->toArray())}}</td>
                            <td> 
                                @can('edit-users')
                                <a class="btn btn-primary float-left btn-sm" href="{{route('admin.user.edit',$user->id)}}">Edit</a>
                                @endcan
                          
                           @can('delete-users')
                           <form action="{{route('admin.user.destroy',$user->id)}}" method="POST" class="float-left">
                            @csrf
                            @method('DELETE')
                        <button class="btn btn-warning btn-sm" type="submit">Delete</button>
                      </form>
                           @endcan
                          
                            </td>
                       
                              
                            </tr>
                          
                        @endforeach
                        
                         
                           
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
