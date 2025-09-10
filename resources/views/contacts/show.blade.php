@extends('layouts.app')
@section('content')

<section>
    <div class="card shadow-sm">
        <h1>Contact Details</h1>

        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <td>
                            <h5>ID</h5>
                        </td>
                        <td>
                            <h5>{{ $contact->id }}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Name</h5>
                        </td>
                        <td>
                            <h5>{{ $contact->name }}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Email</h5>
                        </td>
                        <td>
                            <h5>{{ $contact->email }}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Contact 1</h5>
                        </td>
                        <td>
                            <h5>{{ $contact->phone_1 }}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Contact 2</h5>
                        </td>
                        <td>
                            <h5>{{ $contact->phone_2 }}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Address</h5>
                        </td>
                        <td>
                            <h5>{{ $contact->address }}</h5>
                        </td>
                    </tr>

                </thead>



            </table>

        </div>
        <button type="submit" class="btn btn-primary">update</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</section>

@endsection