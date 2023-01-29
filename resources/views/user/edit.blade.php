@extends('layouts.app')

@section('title', __('title.user_edit', ['name' => $user->name]))

@section('content')
<a class="btn btn-secondary d-block my-3" href="{{ route('users.index') }}">@lang('form.back')</a>
<form method="POST" action="{{ route('users.update', $user->id) }}">
  @csrf
  @method('PUT')
  <x-input label="{{ __('form.name') }}" name="name" type="text" value="{{ $user->name }}" />
  <x-input label="{{ __('form.email') }}" name="email" type="email" value="{{ $user->email }}" required="false" disabled />
  <x-input label="{{ __('form.password') }}" name="password" type="password" required="false" />
  <button class="btn btn-primary" type="submit">@lang('form.update')</button>
</form>
@endsection
