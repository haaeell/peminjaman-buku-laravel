@extends('layouts.landingpage')

@section('content')
    <section style="height: 100vh" class="row d-flex justify-content-center align-items-center">

        @if (session('success'))
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Hai {{ Auth::user()->name }}</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
        <div class="text-center">

            <h1>LANDING PAGE</h1>
        </div>
    </section>
@endsection
