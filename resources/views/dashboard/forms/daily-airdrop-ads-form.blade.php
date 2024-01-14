<form method="post" action="{{ url('create-ads')}}" enctype="multipart/form-data">
    @csrf

    <div class="row px-4">
        <input type="hidden" nam="type" value="airDrop">
        <div class="col-md-6 col-sm-12">
            <label for="title" class="form-text">Title</label>
            <input type="text" id="title" name="title" class="form-control mb-3" placeholder="Title" required>
        </div>

        <div class="col-md-6 col-sm-12">
            <label for="ad-image" class="form-text">Ad Image</label>
            <input type="file" id="ad-image" name="ad_image" class="form-control mb-3" placeholder="AD image" required>
        </div>

        <div class="col-md-6 col-sm-12">
            <label for="priority" class="form-text">Priority</label>
            <input type="number" id="priority" name="priority" class="form-control mb-3" placeholder="Priority" value="0" accordion required>
        </div>

        <div class="col-md-6 col-sm-12">
            <label for="timer" class="form-text">Timer</label>
            <input type="text" id="timer" name="timer" class="form-control mb-3" placeholder="Timer" >
        </div>

        <div class="col-md-6 col-sm-12">
            <label for="link"  class="form-text">Link</label>
            <input type="text" id="link" name="link" class="form-control mb-3" placeholder="Link" required>
        </div>

        <button class="btn btn-primary mt-4">Submit</button>
</form>