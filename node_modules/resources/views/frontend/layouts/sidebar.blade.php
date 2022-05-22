<div class="col-lg-4 sidebar ftco-animate bg-light py-md-5 mt-md-5">
    <div class="sidebar-box pt-md-5">
        <form action="{{ isset($searchAll) ? route('blog') . '?s=' : '?s=' }}" method="get"
            class="search-form">
            <div class="form-group">
                <span class="icon fa fa-search"></span>
                <input type="text" class="form-control" placeholder="Search..." name="s"
                    value="{{ request('s') }}">
            </div>
        </form>
    </div>
    <div class="sidebar-box ftco-animate">
        <div class="categories">
            <h3>Categories</h3>
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('category', $category->slug) }}">
                        {{ $category->title }}
                        <span>({{ $category->posts->count() }})</span>
                    </a>
                </li>
            @endforeach
        </div>
    </div>

    <div class="sidebar-box ftco-animate">
        <h3>Popular Post</h3>
        @foreach ($popularPost as $post)
            <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4"
                    style="background-image: url({{ $post->image_thumb_url }});"></a>
                <div class="text">
                    <h3 class="heading">
                        <a href="{{ route('blog.show', $post->slug) }}">
                            {{ $post->titleLimit(40) }}</a>
                    </h3>
                    <div class="meta">
                        <div>
                            <a href="{{ route('blog.show', $post->slug) }}">
                                <span class="fa fa-calendar"></span>
                                {{ $post->date }}
                            </a>
                        </div>
                        <div>
                            <a href="#"><span class="fa fa-user"></span>
                                {{ $post->author->name }}</a>
                        </div>
                        <div>
                            <a href="{{ route('blog.show', $post->slug) }}#disqus_thread">
                                <span class="fa fa-comment"></span>
                                0 Comment
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <div class="sidebar-box ftco-animate">
        <h3>Tag Cloud</h3>
        <div class="tagcloud">
            @foreach ($tags as $tag)
                <a href="{{ route('tag', $tag->slug) }}"
                    class="tag-cloud-link">{{ $tag->name }}</a>
            @endforeach
        </div>
    </div>

    <div class="sidebar-box ftco-animate">
        <div class="categories">
            <h3>Archives</h3>
            @foreach ($archives as $archive)
                <li>
                    <a
                        href="{{ route('blog', ['m' => $archive->month, 'y' => $archive->year]) }}">
                        {{ $archive->month . ' ' . $archive->year }}
                        <span>({{ $archive->post_count }})</span>
                    </a>
                </li>
            @endforeach
        </div>
    </div>
</div>
