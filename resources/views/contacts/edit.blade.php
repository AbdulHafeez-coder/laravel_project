@extends('layouts.app')
@section('content')

<section>

    <div class="p-3 mb-2 bg-transparent text-body">


        <form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="bg-transparent">

            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{ old('name',$contact->name) }}">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ old('email',$contact->email) }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone Number 1</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="03001234567">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone Number 2</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="03001234567">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="H # 123 , St # 1 , Al Noor Town Woltan Road, Lahore">
            </div>
            <a href="{{ route('contacts.update', $contact->id) }}" class="btn btn-secondary">Update</a>

            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</section>

@endsection