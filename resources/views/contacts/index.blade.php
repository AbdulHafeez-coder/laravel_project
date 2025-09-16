@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
<section>
    <section class="card shadow-sm">
        <div class="card-body">

            <div class="d-flex align-items-center justify-content-between mb-3">
                <h2 class="m-0">Contacts</h2>
                <div>
                    <a href="{{ url('export') }}" class="btn btn-outline-primary">Export CSV</a>
                    <a href="{{ route('contacts.create') }}" class="btn btn-primary">+ New Contact</a>
                </div>
            </div>

            <!-- Search Form -->
            <form class="row g-2 mb-3" method="get" action="{{ route('contacts.index') }}">
                <div class="col-sm-9 col-md-10">
                    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search by name...">
                </div>
                <div class="col-sm-3 col-md-2 d-grid">
                    <button class="btn btn-secondary" type="submit">Search</button>
                </div>
            </form>
            <!-- Contacts Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>
                            @if ($contact->picture)
                                <img src="{{ asset('storage/' . $contact->picture) }}" alt="{{ $contact->name }}" class="img-thumbnail" style="width: 100px;">
                            @endif
                        </td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone_1 }}</td>
                        <td>
                            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                @foreach ($contacts as $contact)
                <p>{{ $contact->name }} - {{ $contact->email }}</p>
                @endforeach

                {{ $contacts->links() }}


            </div>
        </div>
        <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    </section>



    @endsection