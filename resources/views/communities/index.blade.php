@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('My Communities') }}</div>

        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-info">{{ session('message') }}</div>
                <br/>
            @endif
            <a href="{{ route('communities.create') }}" class="btn btn-primary">New Community</a>
            <br/><br/>
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($communities as $community)
                    <tr class="community-item">
                        <td>
                            <a href="{{ route('communities.show', $community) }}">{{ $community->name }}</a>
                        </td>
                        <td>
                            <a href="{{ route('communities.edit', $community) }}"
                               class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('communities.destroy', $community) }}"
                                  method="POST"
                                  style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
