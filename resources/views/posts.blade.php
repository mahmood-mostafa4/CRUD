<?php
use App\Models\User;
use App\Models\Post;
?>
@extends('layouts.app')

@section('title')
Blog
@endsection

@section('content')

<a type="button" href="{{ route('create') }}"  class="btn btn-success" >Create Post</a>
</div>
<table class="table text-center mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>

                    <td>{{ $post->title }}</td>
                        <td>{{ User::find($post['user_id']) ? User::find($post['user_id'])->name : 'Not Found' }}</td>

                    <td>{{ $post->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a type="button" href="{{ route('show' , $post->id)}}" class="btn btn-info">View</a>
                        <a type="button" href="{{ route('edit' , $post->id)  }}" class="btn btn-primary">Edit</a>
                        <form style="display : inline;" action="{{ route('destroy' , $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit"  class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endsection

