<div class="accordion" id="accordionPanels">
    @foreach($drills as $key => $drill)    
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-heading{{ $drill->id }}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                data-bs-target="#panelsStayOpen-collapse{{ $drill->id }}" 
                aria-expanded="false" aria-controls="panelsStayOpen-collapse{{ $drill->id }}">
                {{ $drill->name }}
            </button>
            </h2>
            <div id="panelsStayOpen-collapse{{ $drill->id }}" 
                class="accordion-collapse collapse" 
                aria-labelledby="panelsStayOpen-heading{{ $drill->id }}">
                <div class="accordion-body">
                    {!! $drill->description !!}
                    {!! $drill->link  !!}
                    <form action="{{ route('drills.replace_list',$drill->session_drill_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">Replace drill</button>
                    </form>
                </div>
            </div>
        </div>                        
    @endforeach
    </div>