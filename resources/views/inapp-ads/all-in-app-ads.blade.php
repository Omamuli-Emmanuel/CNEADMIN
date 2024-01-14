<?php use Carbon\Carbon; ?>
<x-head/>
<x-header/>
<div class="p-4">
    <h1 class="fs-4 text-center text-uppercase">In App Ads</h1>

    <details class=" my-4 mb-5  border rounded-3 shadow">
        <summary class="p-4 fs-4 fw-bold">Create In App Ads </summary>
        <div class="bg-light p-3">
          @include('dashboard.forms.in-app-ads-form')
        </div>
    </details>

    <div class="mt-4 border py-5 px-4">
    @foreach($data as $ad)
        <div class="card d-inline-block m-2" style="width: 18rem;">
            <a href="{{$ad['link']}}">
                <img src="{{ $ad['image'] }}" class="card-img-top" alt="{{$ad['title']}}">
            </a>
            <div class="card-body">
              <h5 class="card-title">{{ $ad['title'] }}</h5>
              <p class="card-text small text-muted">
                <b>Timer:</b> {{$ad['timer']}}<br>
                <b>Priority:</b> {{$ad['priority']}}<br>
                <b>Link:</b> {{$ad['link']}}<br>
                <b>Created:</b> {{Carbon::parse($ad['created_at'])->ago()}}<br>
              </p>
              <a href="/delete-inapp-ad/{{$ad['_id']}}" class="btn btn-danger btn-sm">Delete</a>
            </div>
          </div>
    @endforeach
    </div>
</div>
<x-post-footer/>