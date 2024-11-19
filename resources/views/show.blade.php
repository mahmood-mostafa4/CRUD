<?php
use App\Models\User;
?>
@extends('layouts.app')


@section('title')


        {{ $post->title }}
    @endsection

    @section('content')

        <div class="card">

            <h5 class="card-header">Title : {{ $post->title }}</h5>
            <p class="card-text">Description : {{ $post->description }}</p>
        </div>


        <div class="card">
            <h5 class="card-header">Post Creator Info</h5>
            <div class="card-body">
                <h5 class="card-title">Name : {{ User::find($post['user_id']) ? User::find($post['user_id'])->name : 'Not Found' }} </h5>
                <p class="card-text">Email : {{ User::find($post['user_id']) ? User::find($post['user_id'])->email : 'Not Found' }}</p>
                <p class="card-text">Created At : {{ $post->created_at->format('Y-m-d') }}</p>
            </div>
        </div>

    </div>
@endsection
