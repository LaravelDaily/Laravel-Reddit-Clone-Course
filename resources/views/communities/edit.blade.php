@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Edit Community') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('communities.update', $community) }}">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}*</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ $community->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}
                        *</label>

                    <div class="col-md-6">
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                  required>{{ $community->description }}</textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="topics" class="col-md-4 col-form-label text-md-right">{{ __('Topics') }}</label>

                    <div class="col-md-6">
                        <select name="topics[]" multiple class="form-control select2">
                            @foreach ($topics as $topic)
                                <option value="{{ $topic->id }}"
                                        @if ($community->topics->contains($topic->id)) selected @endif>{{ $topic->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Community') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
