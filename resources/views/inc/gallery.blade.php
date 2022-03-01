<section class="gallery-container">
  <div class="gallery are-images-unloaded">
    <div class="gallery-sizer"></div>
    @foreach ($photos as $photo)
      <a href="/storage/img/{{ $photo->img }}" class="gallery-item" data-sub-html=".caption" data-responsive="storage/img/sm-{{ $photo->img }} 450, storage/img/md-{{ $photo->img }} 850">
        <img src="/storage/img/gallery-{{ $photo->img }}" alt="">

        <div class="caption" style="display: none;">
          <h4>{{ $photo->caption }}</h4>
          @if ($photo->location)<p>Location: <b>{{ $photo->location }}</b></p>@endif
        </div>
      </a>
    @endforeach
  </div>
</section>