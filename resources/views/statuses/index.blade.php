@extends('layouts.app')

@section('content')
<div class="ui container segments">
  @segment(['class' => ''])
    <p>{{ __('Statuses') }}</p>
  @endsegment
  @segment(['class' => ''])
    @foreach ($statuses as $status)
      <a href="{{ $status->path() }}">{{ __('Read more') }}</a>
      <p>{{ $status->body }}</p>
      <hr>
    @endforeach
  @endsegment
</div>
@endsection
