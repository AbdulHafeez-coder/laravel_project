<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Contact</title>
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

<div class="container mt-4">
<form class="row g-2 mb-3" method="post" action="{{ route('students.update', $student->id) }}">  
  @csrf
  @method('PUT')
  <div class="card shadow-sm bg-light">
    <div class="card-body">

      <div class="mb-3">
        <label for="name" class="form-label">*Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $student->name }}" required>
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">*Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" value="{{ $student->phone }}" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="abc@gmail.com" value="{{ $student->email }}">
      </div>

      <br>
      <button type="submit" class="btn btn-success">Update</button>
      <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>

    </div>
  </div>
</form>

</div>

</body>
</html>
