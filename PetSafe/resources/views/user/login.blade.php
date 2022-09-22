<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Style sheets -->
    <link href="{{ asset('css/styles.css?v=').time() }}" rel="stylesheet" >
    <!-- Bootstrap CDN (CSS only) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>

    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
          <form action="{{ route('login.create') }}" method="POST" id="form">
            @csrf
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3" style="background-color: #f0f0f0;">
                  <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Iniciar Sesión</h3>
        
                      <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example1q">Mail</label>
                        <input type="text" id="mail" class="form-control" placeholder="EJ: ejemplo@gmail.com" name="email"/>
                        @error('email')
                          <strong>{{ $message }}</strong>
                        @enderror
                      </div>
    
                      <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example1q">Contraseña</label>
                        <input type="password" id="password" class="form-control" placeholder="Contraseña" name="password"/>
                        @error('password')
                          <strong>{{ $message }}</strong>
                        @enderror
                      </div>
    
                      <button type="submit" class="btn btn-primary" id="submit-btn">Iniciar Sesión</button>
                      <p class="warnings" id="warnings"></p>
                     
                      <p>¿No tiene una cuenta? <a href="{{ route('register') }}">Registrarse</a></p>
        
                    <div class="salida"></div>
        
                  </div>
                </div>
              </div>
            </div>
          </form>
          @error('mensaje')
            <strong>{{ $message }}</strong>
          @enderror
        </div>
      </section>

</body>
</html>