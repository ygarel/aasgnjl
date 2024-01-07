<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apoteker App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>

    </style>
  </head>
  <body class="bg-light">
    <div class="d-flex justify-content-center flex-column" style="margin-top: 10%">
        <h4 style="color: rgb(0, 0, 0)" class="text-center">404</h4>
        <p style="color: rgb(0, 0, 0);" class="text-center">THE PAGE YOUR LOOKING FOR DOESN'T EXIST.</p>
        <img src="https://cdn0.iconfinder.com/data/icons/business-management-109/64/customer-consumer-Business-question-512.png" class="d-block m-auto" width="300">
        <div class="d-block m-auto">
            @if (Auth::user()->role == 'admin')
                <a href="{{ route('home.page') }}" class="btn btn-info mt-3">Kembali</a>
            @else 
                <a href="{{ route('home.page') }}" class="btn btn-info mt-3">Kembali</a>
            @endif
            

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>