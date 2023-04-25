@if (isset($url_destroy))
<form action="{{ $url_destroy }}" method="POST">
    @method('DELETE') @csrf
    @endif
    <div class="btn-group" role="group" aria-label="Basic example">
        @if (isset($buttons))
        @foreach ($buttons as $button)
        <a href="{{ $button['url'] }}" class="btn btn-sm btn-outline-{{ $button['color'] }}">
            {{ $button['title' ]}}
        </a>
        @endforeach
        @endif
        @if (isset($url_show))

        <a href="{{ $url_show }}" class="btn btn-sm btn-outline-info">
            Show
        </a>
        @endif
        @if (isset($url_edit))
        <a href="{{ $url_edit }}" class="btn btn-sm btn-outline-secondary">
            Edit
        </a>
        @endif
        @if (isset($url_destroy))
        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-outline-danger">
            Delete
        </button>
        @endif
    </div>
    @if (isset($url_destroy))
</form>
@endif
