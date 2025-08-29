<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PhoneBook</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(90deg, #0d6efd, #0a58ca);">
  <div class="container-fluid">
    <a class="navbar-brand fw-semibold" href="{{ route('students.index') }}">PhoneBook</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('students.index') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('students.create') }}">Create New Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<br>

<!-- Success Messages -->
@if(session('success'))
    <div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

<!-- Contacts Section -->
<section>
  <div class="card shadow-sm">
    <div class="card-body">
      
      <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="m-0">Contacts</h2>
        <div>
          <a href="{{ url('export') }}" class="btn btn-outline-primary">Export CSV</a>
          <a href="{{ route('students.create') }}" class="btn btn-primary">+ New Contact</a>
        </div>
      </div>

      <!-- Search Form -->
      <form class="row g-2 mb-3" method="get" action="{{ route('students.index') }}">
        <div class="col-sm-9 col-md-10">
          <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search by name...">
        </div>
        <div class="col-sm-3 col-md-2 d-grid">
          <button class="btn btn-secondary" type="submit">Search</button>
        </div>
      </form>

      <!-- Contacts Table -->
      @if($students->count() > 0)
          <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($students as $student)
                      <tr>
                          <td>{{ $student->id }}</td>
                          <td>{{ $student->name }}</td>
                          <td>{{ $student->email ?: '-' }}</td>
                          <td>{{ $student->phone }}</td>
                          <td>
                              <a href="{{ route('students.show', $student->id) }}" class="btn btn-success btn-sm">View</a>
                              <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                              <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      @else
          <p class="text-muted">No contacts found.</p>
      @endif

    </div>
  </div>
</section>

</body>
</html>
