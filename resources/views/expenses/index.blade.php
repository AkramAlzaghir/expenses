@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-12">
        <?php /*
        <a href="{{url('expenses/create')}}" class="btn btn-success">Add new</a>
        <hr />
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Image</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Type</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Date</th>
                    <th scope="col">Deps</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($models as $model)
                <?php
                $image = $model->getMedia('Main')->first();
                ?>
                <tr>
                    <th scope="row">{{$model->id}}</th>
                    <td><img src="{{$image ? $image->getUrl() : 'https://dummyimage.com/100x100/dee2e6'}}" height="100" width="100" /></td>
                    <td>{{$model->amount}}</td>
                    <td>{{$model->amount}}</td>
                    <td>{{$model->type->name}}</td>
                    <td>{{$model->notes}}</td>
                    <td>{{$model->created_at}}</td>
                    <td>{{count($model->departments)}}</td>
                    <td>@include('btn.edit', ['id'=>$model->id]) | @include('btn.delete', ['id'=>$model->id])
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $models->links() }}
        
        */ ?>
        {{$dataTable->table()}}
    </div>
</div>
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush