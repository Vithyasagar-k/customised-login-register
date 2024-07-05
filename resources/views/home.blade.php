<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Home
          </div>
          <div class="card-body">
            <h1>Hi {{$data->name}}</h1>
            <h3>Welcome to the home page</h3>
            <a href="/" type="button" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
