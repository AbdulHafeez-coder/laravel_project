@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

<section>

    <div class="p-3 mb-2 bg-light text-body">


        <form action="{{ route('contacts.store') }}" method="POST" class="bg-light">
            @csrf


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">*Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{ old('name') }}">
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="abc@gmail.com">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Phone Number 1</label>
                    <input type="text" class="form-control" name="phone_1" id="exampleInputPassword1" placeholder="03001234567">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Phone Number 2</label>
                    <input type="text" class="form-control" name="phone_2" id="exampleInputPassword1" placeholder="03001234567">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="exampleInputPassword1" placeholder="H # 123 , St # 1 , Al Noor Town Woltan Road, Lahore">
                </div>
                <br><br>

                <button type="submit" class="btn btn-primary">Save</button>

                <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>

        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" ></script>

</section>

@endsection