<div class="row d-flex justify-content-center">
    @foreach($predictions as $prediction)
        <div class="col-6 col-sm-4 col-md-2 col-lg-2 col-xl-2 mt-3 text-center">
            <div>
                <img src="{{ URL::asset('img/characters/' . $prediction->character->image) }}"
                     class="rounded-circle w-100 mb-2"
                     style="max-height: 100px; max-width: 100px;">
            </div>
            {{ $prediction->character->name }}

            @if($prediction->house_id)
                <span class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="This house prediction does not count for the group or global leaderboards.">
                    House <i class="fas fa-question-circle"></i>
                </span>
            @endif
        </div>
    @endforeach
</div>