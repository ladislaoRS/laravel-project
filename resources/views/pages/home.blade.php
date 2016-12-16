@extends('layouts.main')

@section('content')
    <div class="pages">
        <ol class="breadcrumb">
          <li class="active">HOME</li>
        </ol>
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>Dashboard</h1>

            <p>
                This is a template showcasing the optional theme stylesheet included in Bootstrap. Use it as a starting point to create something more unique by building on or modifying it.
            </p>

            @if ($guest)
                <a href="/register" class="btn btn-primary">Sign Up</a>
            @else
                <a href="/flyers" class="btn btn-default">List of Flyers</a>
                <a href="/flyers/create" class="btn btn-primary">Create a Flyer</a>
            @endif
        </div>

    </div>
@endsection
