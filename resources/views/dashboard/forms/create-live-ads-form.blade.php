<form method="post" action="{{ url('create-live-ads')}}" enctype="multipart/form-data">
    @csrf

    <div class="row px-4">
       
        <div class="col-md-6 col-sm-12">
            <label for="title" class="form-text">Title</label>
            <input type="text" id="title" name="title" class="form-control mb-3" placeholder="Title" required>
        </div>

        <div class="col-md-6 col-sm-12">
            <label for="ad-image" class="form-text">Ad Side Image</label>
            <input type="file" id="ad-image" name="ad_side_image" class="form-control mb-3" placeholder="AD image" required>
        </div>

        <div class="col-md-6 col-sm-12">
            <label for="ad-image" class="form-text">Ad Bottom Image</label>
            <input type="file" id="ad-image" name="ad_bottom_image" class="form-control mb-3" placeholder="AD image" required>
        </div>

        <div class="col-md-6 col-sm-12">
            <label for="priority" class="form-text">Priority</label>
            <input type="number" id="priority" name="priority" class="form-control mb-3" placeholder="Priority" value="0" accordion required>
        </div>

        <button class="btn btn-primary mt-4">Submit</button>
</form>