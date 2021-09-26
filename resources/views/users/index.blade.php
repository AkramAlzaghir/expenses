@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-12">
        {{$dataTable->table()}}
    </div>
</div>
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush