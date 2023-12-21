<ul class="nav nav-tabs mt-3 ms-4" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="live-tab" data-bs-toggle="tab" data-bs-target="#live-tab-pane" type="button" role="tab" aria-controls="live-tab-pane" aria-selected="true">Create Live Video</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="video-tab" data-bs-toggle="tab" data-bs-target="#video-tab-pane" type="button" role="tab" aria-controls="video-tab-pane" aria-selected="false">Create Video</button>
    </li>
    
  
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="live-tab-pane" role="tabpanel" aria-labelledby="live-tab" tabindex="0">@include('dashboard.forms.create-admin-live-video-form')</div>
    <div class="tab-pane fade" id="video-tab-pane" role="tabpanel" aria-labelledby="video-tab" tabindex="0">@include('dashboard.forms.create-admin-video-form')</div>
  </div>