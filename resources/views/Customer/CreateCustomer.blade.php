<div class="d-block m-3">
    <h1 class="h2">Create Customer</h2>
    <hr>
</div>
    
<div class="container">

    <form method="post" action="{{route('customer.store')}}">
        @csrf
        <div class="form-group mb-3 ">
            <input type="text" class="form-control rounded" name="FIRSTNAME" placeholder="Write your Firstname!">
        </div>
        <div class="form-group mb-3">
            <input type="text" class="form-control rounded" name="LASTNAME" placeholder="Write your Lastname!">
        </div>
        <div class="form-group mb-3">
            <input type="text" class="form-control rounded" name="INDENTIFICATION" placeholder="Write your Identification!">
        </div>
        <hr>
        <div class="mt-3 text-right">
            <button type="submit" class="btn btn-sm btn-primary text-primary">Submit</button>

        </div>
    </form>
</div>

