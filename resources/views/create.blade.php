@extends('layouts.app')

@section('title')
Create
@endsection

@section('content')
<form action="{{ route('store') }}" method="POST">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" class="form-control" placeholder="Post Title" name="title" value="{{ old('title') }}">
  </div>
  <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea class="form-control" placeholder="Description" rows="3" name="description">{{ old('description') }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Post Creator</label>
        <select name="posted_by" class="form-control" value="{{ old('posted_by') }}">
            <option value="0">Select Creator</option>
            @foreach ($users as $user )
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
      </div>

      <div>
        <div class="d-grid gap-2">
            <button class="btn btn-success" type="submit">Create</button>
          </div>
      </div>
</form>
@endsection
