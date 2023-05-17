@extends('layouts.adm')

@section('title', 'User list')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Users list</h4>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Active</th>
                                        <th>Details</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for($i=0; $i<count($users); $i++)
                                        <tr>
                                            <th scope="row">{{$i+1}}</th>
                                            <td>{{$users[$i]->name}}</td>
                                            <td>{{$users[$i]->email}}</td>
                                            <td>{{$users[$i]->role->name}}</td>
                                            <td>
                                                <form action="
                                                @if($users[$i]->is_active)
                                                   {{route('adm.users.ban', $users[$i]->id)}}
                                                @else
                                                    {{route('adm.users.unban', $users[$i]->id)}}
                                                @endif
                                                    " method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn {{$users[$i]->is_active  ? 'btn-outline-danger' : 'btn-outline-success'}}" type="submit">
                                                        @if($users[$i]->is_active)
                                                            Ban
                                                        @else
                                                            Unban
                                                        @endif
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
{{--                                                <a href="{{route('adm.users.edit', $users[$i]->id)}}" class="btn btn-outline-success">{{__('messages.button_edit')}}</a>--}}
                                            </td>
                                        </tr>
                                      @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
