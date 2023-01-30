@extends('layouts.app')

@section('title', __('title.user_create'))

@section('content')
<a class="btn btn-secondary d-block my-3" href="{{ route('users.index') }}">@lang('form.back')</a>
<form method="POST" action="{{ route('users.store') }}">
    @csrf
    <x-input label="{{ __('form.name') }}" name="name" type="text" />
    <x-input label="{{ __('form.email') }}" name="email" type="email" />
    <x-input label="{{ __('form.password') }}" name="password" type="password" />
    <button class="btn btn-primary" type="submit">@lang('form.create')</button>
</form>
@endsection
