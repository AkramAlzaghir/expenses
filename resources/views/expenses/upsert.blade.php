@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{route('expenses.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Amount</label>
                    <input type="number" class="form-control" id="inputEmail4" placeholder="Amount" name="amount" value="{{old('amount', $model->amount)}}">
                    @error('amount')
                    <div class="invalid-feedback" style="display: block;">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Notes</label>
                    <input type="textarea" class="form-control" id="inputPassword4" placeholder="Notes" name="notes" value="{{old('notes', $model->notes)}}">
                    @error('notes')
                    <div class="invalid-feedback" style="display: block;">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-12">
                    <label for="inputPassword4">Type</label>
                    <select name="type_id" class="form-control">
                        <option value="">Select type</option>
                        @foreach($types as $type)
                        <option value="{{$type->id}}" {{$type->id == old('type_id', $model->type_id) ? 'selected' : ''}}>{{$type->name}}</option>
                        @endforeach
                    </select>
                    @error('type')
                    <div class="invalid-feedback" style="display: block;">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-12">
                    <label for="inputPassword4">Departments</label>
                    <select name="departments[]" class="form-control" multiple>
                        <option value="">Select departments</option>
                        @foreach($departments as $dep)
                        <option value="{{$dep->id}}" {{$model->departments->contains($dep->id) ? 'selected' : ''}}>{{$dep->name}}</option>
                        @endforeach
                    </select>
                    @error('departments')
                    <div class="invalid-feedback" style="display: block;">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-12">
                    <div class="custom-file">
                        <input type="file" id="expense_file" name="expense_file">
                        <label class="custom-file-label" for="expense_file">Choose file</label>
                        @error('expense_file')
                        <div class="invalid-feedback" style="display: block;">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

            </div>
            @if($model->exists)
            <input type="hidden" name="id" value="{{$model->id}}">
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection