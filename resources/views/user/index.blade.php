@extends('layouts.app')

@section('title', __('title.users'))

@section('content')
<a class="btn btn-primary d-block my-3" href="{{ route('users.create') }}">@lang('pagination.create')</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>@lang('pagination.column.no')</th>
            <th>@lang('pagination.column.name')</th>
            <th>@lang('pagination.column.email')</th>
            <th>@lang('pagination.column.verified')</th>
            <th>@lang('pagination.column.action')</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $idx => $user)
        <tr>
            <td>{{ $idx + 1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->email_verified_at ?: '-' }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">@lang('pagination.detail')</a>
                <a class="btn btn-success" href="{{ route('users.edit', $user->id) }}">@lang('pagination.edit')</a>
                <button
                    class="btn btn-danger"
                    data-bs-toggle="modal"
                    data-bs-target="#user-delete-confirm"
                    data-bs-json='@json($user)'
                    type="button"
                >@lang('pagination.delete')</button>
                @if(!$user->email_verified_at)
                <form class="d-inline" method="POST" action="{{ route('users.verify', $user->id) }}">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-warning">@lang('pagination.verify')</button>
                </form>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">@lang('pagination.error.not_found')</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $users->links() }}
@endsection

@section('modal')
<div id="user-delete-confirm" class="modal fade" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">@lang('modal.confirmation')</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<p>@lang('modal.email_desc')</p>
</div>
<form class="modal-footer" method="POST" action="/">
@csrf
@method('DELETE')
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('modal.no')</button>
<button type="submit" class="btn btn-danger">@lang('modal.yes')</button>
</form>
</div>
</div>
</div>
@endsection

@section('script')
<div
id="users-parser"
data-bs-msg="@lang('modal.email_desc')"
data-bs-url="{{ route('users.destroy', ':id') }}"
></div>
@vite('resources/js/user/index.js')
@endsection
