@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>some content</h1>
            @if(false)
                <p>This only displays if it is true</p>
            @else
                <p>This only displays if it is false</p>
            @endif
            <hr>
            @for($i = 0; $i < 5; $i++)
                <p>{{ $i + 1}}. Iteration</p>
            @endfor
        </div>
    </div>
@endsection