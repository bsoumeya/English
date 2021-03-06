@extends('layouts.app')

@section('content')
<div class="ui container segments">
  @segment(['class' => ''])
    <a href="#">
      {{ $status->ownerName() }}
    </a> {{ __('posted') }}
  @endsegment
  @segment(['class' => ''])
    {{ $status->body }}
  @endsegment
  @segment(['class' => 'comments'])
    <h3 class="ui dividing header">{{ __('Comments') }}</h3>
    @foreach ($status->comments as $comment)
      @include('statuses.comment')
    @endforeach
  @endsegment
  @segment(['class' => ''])
    @auth
    <form class="ui reply form" method="post" action="{{ route('post_comment', ['status' => $status->id]) }}">
      @csrf
      <div class="field">
        <input type="text" name="body" id="comment" placeholder="{{ __('Write a comment') }}" onsubmit="submit">
      </div>
    </form>
    @else
      <div class="ui center aligned container">
        <div class="ui compact floating message">
          <p>{{ __('Please') }} <a href="{{ route('login') }}">{{ __('Login') }}</a> to comment.</p>
        </div>
      </div>
    @endauth
  @endsegment
</div>
@endsection
