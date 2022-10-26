@extends('layouts.layout-user')

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/formulario-mascota.css?v=').time() }}">
@endsection

    @section('content')

    <section>
        <div class="publication-section">
            <div class="section-title mb-4 mt-2">
                <h2 class="text-center">Publicita tu servicio</h2>
                <div class="hline"></div>
            </div>
            <form action="{{ route('formulario-servicio.create') }}" method="POST" id="form">
                @csrf
                <div class="row">

                    <div class="col-lg-6 col-md-12 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Nombre</label>
                        <input type="text" id="petname" class="form-control" placeholder="Nombre" name="name"/>
                        <small class="error-text">Ingrese un nombre correcto (mínimo 3 carácteres / solo letras)</small>
                        @error('name')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>
                    
                    <div class="col-lg-6 col-md-12 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Dirección</label>
                        <input type="text" id="address" class="form-control" placeholder="Dirección" name="address"/>
                        <small class="error-text">Ingrese al menos 5 carácteres</small>
                        @error('address')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Número de Teléfono</label>
                        <input type="text" id="phone" class="form-control" placeholder="EJ: +56912345678" name="phone"/>
                        <small class="error-text">Ingrese un número válido</small>
                        @error('phone')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Email</label>
                        <input type="text" id="email" class="form-control" placeholder="EJ: ejemplo@gmail.com" name="email"/>
                        <small class="error-text">Ingrese un email válido</small>
                        @error('email')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>                    

                    <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-textarea">
                        <label class="form-label" for="form3Example1q">Descripción</label>
                        <textarea type="textarea" id="description" 
                        class="form-control descripcion" placeholder="Ingrese aquí los detalles de su publicación" 
                        name="description" rows="5"></textarea>
                        <small class="error-text">Ingrese al menos 10 carácteres</small>
                        @error('description')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Atención</label>
                        <input type="text" id="schedule" class="form-control" placeholder="Horarios de atención" name="schedule"/>
                        <small class="error-text">Ingrese al menos 5 carácteres</small>
                        @error('schedule')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>  

                    <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-select">
                        <label class="form-label" for="form3Example1q">Tipo</label>
                        <select class="form-select" name="type" id="type">
                            <option value="" disabled selected>Seleccione un tipo</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                        <small class="error-text">Seleccione una opción válida</small>
                        @error('type')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>                    

                </div>
                <button type="submit" class="publication-btn" id="submit-btn">Publicar</button>
            </form>
            
            
        </div>
    </section>

    @endsection

@section('JS')
<script src="{{ asset('js/validate-service.js') }}"></script>
@endsection