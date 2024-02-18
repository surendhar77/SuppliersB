@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Manage Company List</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{route('home')}}"> Add</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Supplier Code</th>
            <th>Supplier Group</th>
            <th>Company Name</th>
            <th>Details</th>
            <th>Contact Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($suppliers as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->supplier_code }}</td>
            <td>{{ $user->supplier_group }}</td>
            <td>{{ $user->company_name }}</td>
            <td>
            {{$user['details']['address_1']}}
            </td>
            <td>
            </td>   
            <td>
                <form action="{{ route('delete',$user->id) }}" method="POST">    
                    <a class="btn btn-primary" href="{{ route('edit',$user->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $suppliers->links() !!}
</div>
@endsection