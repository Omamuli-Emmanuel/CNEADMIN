<x-head/>
<x-header/>
<div class="p-4 container mx-auto shadow-sm rounded-3" style="max-width:960px">
  

  {{-- <h1 class="pb-3 fs-5">Dashboard</h1> --}}
 
  <span class="fs-5 fw-bold">Welcome {{ session('user')['firstName'] }}</span>
  <details class=" my-4  border rounded-3 shadow">
      <summary class="p-4 fs-4 fw-bold">Create In App & Daily Airdrop Ads </summary>
      <div class="bg-light p-3">
        @include('dashboard.forms.in-app-ads-form')
      </div>
  </details>
  <details class=" my-4  border rounded-3 shadow">
    <summary class="p-4 fs-4 fw-bold">Create Live Ads </summary>
    <div class="bg-light p-3">
      @include('dashboard.forms.create-live-ads-form')
    </div>
</details>
  <details class=" my-4  border rounded-3 shadow">
    <summary class="p-4 fs-4 fw-bold">Create Videos </summary>
    <div class="bg-light p-3">
      @include('dashboard.forms.add-videos-tabbed')
    </div>
</details>

<details class=" my-4  border rounded-3 shadow">
  <summary class="p-4 fs-4 fw-bold">Update Wallets </summary>
  <div class="bg-light p-3">
    @include('dashboard.forms.wallet-update-form')
  </div>
</details>
</div>

<x-post-footer/>