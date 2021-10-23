@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Country</th>
                    <th scope="col">City</th>
                    <th scope="col">Profile Pic</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->mobile_number }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->country }}</td>
                            <td>{{ $user->city }}</td>
                            <td>
                                <img src="{{ asset('user_images').'/'.$user->profile_pic }}" style="height:50px;width:50px">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
