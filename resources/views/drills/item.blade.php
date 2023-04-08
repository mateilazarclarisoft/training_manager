<a data-bs-toggle="collapse" href="#collapse{{ $drill->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
    {{ $drill->name }}
  </a>
<div class="collapse" id="collapse{{ $drill->id }}">
  <div class="card card-body">
    {!! $drill->description !!}
    {!! $drill->link !!}
  </div>
</div>