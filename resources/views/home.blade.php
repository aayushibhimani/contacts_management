@extends('layouts.app')

@section('content')


<div class="container">

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('contacts.create') }}"  class="btn btn-primary">Add Contact</a>
    </div>
    
            <div class="card">
                <div class="card-header">Contacts</div>
                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Created At</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td>
                                    @if($contact->image!=null)
                                    <img src="{{asset('storage/'.$contact->image)}}" alt="" height="70px" width="70px" class="rounded-circle"> 
                                    @else
                                    <img src="{{asset('storage/contacts/user.png')}}" alt="" height="78px" width="78px" class="rounded-circle"> 
                                    @endif

                                </td>
                                <td><a href="{{ route('contacts.show',$contact->id)}}" style="text-decoration: none; color:black;
                                ">{{$contact->first_name}} {{$contact->Middle_name}}  {{$contact->last_name}}</a></td>
                                <td>{{$contact->mobile}}</td>
                                <td>{{$contact->created_at->format('d/m/Y')}}</td>
                                <td>
                                    <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-outline-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-outline-danger btn-sm"
                                    onclick="displayModalForm({{ $contact }})"
                                       data-toggle="modal"
                                       data-target="#deleteModal">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
</div>


<!--DELETE MODAL-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <form action="{{ route('contacts.destroy',$contact)}}" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>Are you sure want to delete this Contact??</p>
                    {{-- <p>Name:{{$contact->first_name}}</p> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete Contact</button>
                    {{-- <a href="{{ route('contacts.destroy',$contact)}}" class="btn btn-outline-danger btn-sm">Delete</a> --}}
                </div>
            </form>
        </div>
    </div>
</div>
<!--END DELETE MODAL-->


@endsection

@section('page-level-scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );

function displayModalForm($contact) {
            $('#deleteModal').modal('show');
        }
</script>
@endsection

@section('page-level-styles')
<link href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

@endsection
