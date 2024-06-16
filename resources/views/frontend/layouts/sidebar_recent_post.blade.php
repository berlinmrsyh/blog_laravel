<section id="recent-posts" class="recent-posts mb-4">
    <h4>Posting Terbaru</h4>
    <ul class="list-unstyled">
        @foreach ($sidebar_recent_posts as $post)
        <li class="post-item mb-3">
            <div class="card" style="border: none;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <a href="{{ route('posts.show', ['slug' => $post->slug]) }}">
                            <img src="{{ $post->image ? Storage::url('images/posts/' . $post->image) : asset('storage/images/general/noimage.jpg') }}" alt="{{ $post->title }}" class="img-fluid" style="border-radius: 8px;">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-2">
                            <h5 class="card-title" style="font-size: 0.9em; margin-bottom: 0.5em;">
                                <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="text-decoration-none">
                                    {{ Str::limit($post->title, 30) }}
                                </a>
                            </h5>
                            <p class="card-text">
                                <small class="text-muted" style="font-size: 0.8em;">
                                    {{ \Carbon\Carbon::parse($post->created_at)->format('d F Y') }}
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</section>