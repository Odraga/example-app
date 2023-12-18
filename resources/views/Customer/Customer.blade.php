@extends('layouts.app')

@section('content')



        <div class="d-block m-3">
            <h1 class="h2">Customer List</h2>
                <hr>
                <div class="d-flex flex-row mt-2">
                    <a class="btn btn-sm btn-link openModal" name="create" href="#">Create</a>
                </div>

        </div>

        <div class="row mt-2">
            <div class="col-12 table-responsive">
                <table id="myTable" class="table table-striped shadow">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Identification</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($customers)
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer['ID'] }}</td>
                                    <td>{{ $customer['FIRSTNAME'] }}</td>
                                    <td>{{ $customer['LASTNAME'] }}</td>
                                    <td>{{ $customer['INDENTIFICATION'] }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-link openModal" data-id="{{ $customer['ID'] }}"
                                            name="edit" href="#">Edit</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-link openModal" data-id="{{ $customer['ID'] }}"
                                            name="delete" href="#">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    

@endsection

@section('javascript')
                   
                
    <script>
        let table = new DataTable('#myTable',{
            search:false
        });

        $(".openModal").click(function(e) {
            e.preventDefault();
            let name = $(this).attr('name');
            let customerId = $(this).data('id')
            console.log(customerId)
            if (name === "create") {
                $.get('/customer/create', function(data) {
                    $('.modal-body').html(data);
                    $("#myModal").modal('show');
                });
            } else if (name === "edit") {
                $.get('/customer/edit/' + customerId, function(data) {
                    $('.modal-body').html(data);
                    $("#myModal").modal('show');
                });
            } else if (name === "delete") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'customer/destroy' + customerId,
                    type: 'POST',
                    data: {  _method: 'DELETE' },
                    success: function(result) {
                        alert("Se elimino exitosamente!");
                        location.reload();
                    }
                });
            }
        });
    </script>
@endsection
