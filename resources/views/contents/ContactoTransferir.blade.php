@extends('layouts.app')
@section('css')
  <style>
    .curvaBoton{border-radius: 20px;}
  </style>
@endsection
@section('main')
  <span class="card-title grey-text"><h3>Transferir</h3></span>
  
  
  
  @include('promoter.modals.CatalogViewModal')
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/1.2.2/bluebird.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="{{ asset('js/jquery.mlens-1.7.min.js') }}"></script>













@endsection