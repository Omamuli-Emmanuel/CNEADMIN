<?php use Carbon\Carbon; ?>
<x-head/>
<x-header/>
<div class="p-4">
    <h1 class="fs-4 text-center text-uppercase">In App Ads</h1>

    <details class=" my-4 mb-5  border rounded-3 shadow">
        <summary class="p-4 fs-4 fw-bold">Create Live Ads </summary>
        <div class="bg-light p-3">
          @include('dashboard.forms.create-live-video-ads-form')
        </div>
    </details>

    <div class="mt-4 border py-5 px-4">
    @foreach($data as $ad)
        <div class="card d-inline-block m-2" style="width: 18rem;">
            <a href="">
              //  <img src="{{ $ad['side_image']}}" class="card-img-top" alt="{{ $ad['title']}}">
            </a>
            <div class="card-body">
              <h5 class="card-title">{{ $ad['title'] }}</h5>
              <p class="card-text small text-muted">
                <b>Priority:</b> {{$ad['priority']}}<br>
                <b>Created:</b> {{Carbon::parse($ad['created_at'])->ago()}}<br>
              </p>
              <a href="/delete-live-ad/{{$ad['_id']}}" class="btn btn-danger btn-sm">Delete</a>
            </div>
          </div>
    @endforeach
    </div>
</div>
<x-post-footer/>