<form method="post" action="{{ url('create-videos')}}" class="py-4">
    @csrf

    <div class="row px-4">
        @php 
            $baseUrl = env('API_BASE_URL');
            $token = session('user')['token'];

            # Get Playlists
            $response = json_decode(Http::withToken($token)->acceptJson()
            ->get($baseUrl.'playlists'),true);
            // dump($response); 
            
         @endphp

        <div class="col-md-6 col-sm-12">
            <label for="title" class="form-text">Name</label>
            <input type="text" id="name" name="name" class="form-control mb-3" placeholder="Name" required>
        </div>

        
        <div class="col-md-6 col-sm-12">
            <label for="type" class="form-text">Playlist</label>
            <select id="playlist-id" name="playlist_id" class="form-select mb-3">
                @foreach($response['data'] as $playlist){
                    <option value="{{$playlist['id']}}">{{ $playlist['attributes']['name']}}</option>
                }
                @endforeach
            </select>
        </div>

       

        <div class="col-md-6 col-sm-12">
            <label for="video-url"  class="form-text">Link</label>
            <input type="text" id="video-url" name="video_url" class="form-control mb-3" placeholder="Link" required>
        </div>


        <div class="col-md-4 col-sm-12">
            <label for="type" class="form-text">Publish ?</label>
            <select id="is_published" name="is_published" class="form-select mb-3">
               <option value="true">Yes : Publish</option>
               <option value="0">No : Do not Publish</option>
            </select>
        </div>

        <button class="btn btn-primary mt-4">Submit</button>
    </div>
</form>