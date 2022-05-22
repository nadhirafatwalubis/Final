<footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url({{ config('settings.bg_footer_url') }});">
    <div class="container">
        <div class="row">
            <div class="col-md pt-2">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2 mb-3">Recent Post</h2>
                    <ul class="list-unstyled">
                        @foreach ($postsFooter as $post)
                        <li>
                            <a href="{{ route('blog.show', $post->slug) }}" class="py-1 border-bottom d-block">{{
                                $post->titleLimit() }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tagcloud">
                        @foreach ($tags as $tag)
                        <a href="{{ route('tag', $tag->slug) }}" class="tag-cloud-link">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md pt-2 border-left">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2 mb-3">Destination</h2>
                    <ul class="list-unstyled">
                        @foreach ($destinationBookings->take(5) as $slug => $name)
                        <li>
                            <a href="{{ route('destination.show', $slug) }}" class="py-1 border-bottom d-block">{{ $name
                                }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('destination') }}" class="btn btn-sm btn-light">Check All
                        Destination</a>
                </div>
            </div>
            <div class="col-md pt-2 border-left">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2 mb-3">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li>
                                <a href="{{ $about->link_address }}" target="_blank">
                                    <span class="  icon fa fa-map-marker"></span>
                                    <span class="text">{{ $about->address }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="tel:{{ $about->phone }}" target="_blank">
                                    <span class="  icon fa fa-phone"></span>
                                    <span class="text">{{ $about->phone }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $about->wa_link }}" target="_blank">
                                    <span class="icon fab fa-whatsapp"></span>
                                    <span class="text">{{ $about->wa }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:{{ $about->email }}" target="_blank">
                                    <span class="icon fa fa-paper-plane"></span>
                                    <span class="text">{{ $about->email }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                        @if ($about->tw)
                        <li class="ftco-animate">
                            <a href="{{ $about->tw }}">
                                <span class="fab fa-twitter"></span>
                            </a>
                        </li>
                        @endif
                        @if ($about->fb)
                        <li class="ftco-animate">
                            <a href="{{ $about->fb }}">
                                <span class="fab fa-facebook"></span>
                            </a>
                        </li>
                        @endif
                        @if ($about->ig)
                        <li class="ftco-animate">
                            <a href="{{ $about->ig }}">
                                <span class="fab fa-instagram"></span>
                            </a>
                        </li>
                        @endif
                        @if ($about->yt)
                        <li class="ftco-animate">
                            <a href="{{ $about->yt }}">
                                <span class="fab fa-youtube"></span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-12 text-center">

            </div>
        </div> --}}
    </div>
</footer>