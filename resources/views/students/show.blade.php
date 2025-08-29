<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Contact Details</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">

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

<div class="container">
  <div class="card shadow-sm bg-light border-warning-subtle">
    <div class="card-body">
      <h2 class="card-title">Contact Details</h2>
      <p class="text-muted">Viewing details for: {{ $student->name }}</p>
      
      <div class="row">
        <div class="col-md-6">
          <table class="table table-borderless">
            <tr>
              <th width="30%">ID:</th>
              <td>{{ $student->id }}</td>
            </tr>
            <tr>
              <th>Name:</th>
              <td>{{ $student->name }}</td>
            </tr>
            <tr>
              <th>Email:</th>
              <td>{{ $student->email ?: 'Not provided' }}</td>
            </tr>
            <tr>
              <th>Phone:</th>
              <td>{{ $student->phone }}</td>
            </tr>
            <tr>
              <th>Created:</th>
              <td>{{ optional($student->created_at)->format('M d, Y H:i') }}</td>
            </tr>
            <tr>
              <th>Updated:</th>
              <td>{{ optional($student->updated_at)->format('M d, Y H:i') }}</td>
            </tr>
          </table>
        </div>
      </div>
      
      <div class="mt-3">
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit Contact</a>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?');">Delete Contact</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
