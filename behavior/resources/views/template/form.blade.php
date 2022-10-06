@extends('template.master.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @php
                var_dump($errors->all())
                @endphp

                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center" role="alert">
                        {{$error}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach

                <form action="{{route('course.store')}}" method="post">

                    @csrf

                    <div class="form-group mt-4">
                        <label for="name">Curso:</label>
                        <input type="text" name="name" id="name" class="form-control {{($errors->has('name') ? 'is-invalid' : '')}}" placeholder="Insira o nome do curso" value="{{old('name')}}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group mt-2">
                        <label for="tutor">Tutor:</label>
                        <input type="text" name="tutor" id="tutor" class="form-control {{($errors->has('tutor') ? 'is-invalid' : '')}}" placeholder="Insira o nome do tutor do curso" value="{{old('tutor')}}">
                        @if($errors->has('tutor'))
                            <div class="invalid-feedback">
                                {{$errors->first('tutor')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group mt-2">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email" class="form-control {{($errors->has('email') ? 'is-invalid' : '')}}" placeholder="Insira o nome do curso" value="{{old('email')}}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{$errors->first('email')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
