@extends('layouts.app')

@section('title')
Edit
@endsection

@section('content')

<form method="POST" action="{{ route('update' , $post->id)  }}">
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
    @method('PUT')
    <div class="mb-3">

    <label class="form-label">Title</label>
    <input type="text" class="form-control" value="{{ $post->title }}" name="title">
</div>
<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea class="form-control" rows="3" name="description">{{ $post->description }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Post Creator</label>
    <select name="posted_by" class="form-control">
        @foreach ($users as $user )
        <option @if ($user->id == $post->user_id) selected
        @endif value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
        </select>
    </div>

    <div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </div>
</form>
@endsection
