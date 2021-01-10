@extends("layouts.main")

@section("page_title", Auth::user()->name)

@section("content")

	<div>
      <div class="user__wrapper">
        <div class="user__profile_def_cover">
          <h2>
            {{Auth::user()->name}}
          </h2>
          <img
            class="user__profile_image"
            src="https://cf.quizizz.com/join/img/avatars/tablet_sm/monster<?=rand(1, 20);?>.png"
            alt="img"
          />
        </div>

        <div class="user__profile_stats_counter">
          <div>12 Like</div>
          <div>7 Post</div>
          <div>12K Song</div>
        </div>

        <div class="row mt-5">
          <div class="col-md-4">
            md-3
            {{ $errors }}
          </div>
          <div class="col-md-8">
            <div class="list_item__to_add_song">
              <form action="/user/song/upload" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <div>
                    <input type="file" name="song_thumbnail" class="file-input">
                  </div>
                  <div>
                    <input type="file" name="song_file" class="file-input">
                  </div>
                  <div>
                    <button name="submit">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>

@endsection
