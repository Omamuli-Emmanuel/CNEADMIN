 <nav class="navbar navbar-expand-lg border-bottom shadow-sm bg-body-tertiary py-2 px-4 w-100 mb-4">
  <a class="navbar-brand ps-0 fw-bold  fs-5 pe-5  ">Admin DashBoard</a>
  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    @if(session('logged_in'))
    <li class="nav-item">
      <a class="nav-link " aria-current="page" href="/inapp-ads">InApp Ads</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " aria-current="page" href="/airdrop-ads">AirDrop Ads</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " aria-current="page" href="/live-ads">Live Ads</a>
    </li>
    <li class="nav-item px-2">
      <a class="nav-link text-white rounded-3  border bg-danger" aria-current="page" href="/logout">logout</a>
    </li>
    @endif
  </ul>
</nav>
{{-- <x-notifications.flash-message> --}}
@include('components.notifications.flash-message')
