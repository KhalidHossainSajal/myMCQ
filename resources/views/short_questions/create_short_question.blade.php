@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row  vh-100">

    
    <div class="col-md-3 vh-100 bg-dark">

    
        <sidebar-component></sidebar-component>
    </div>

    <div class="col-md-9">

   
    <div id="myContent" class="row justify-content-center">
        <createshortquestion-component></createshortquestion-component>
    </div>
</div>
</div>
</div>



@endsection
@section('page-js')

<script>


</script>

@endsection