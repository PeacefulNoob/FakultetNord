<div class="aside-widget">
    <div class="tags-widget">
        <ul>Tags:
            @foreach($tags as $tag)
                <li><a href="/tags/{{ $tag->id }}">{{ $tag->name }}</a></li>

            @endforeach

        </ul>
    </div>
</div>
