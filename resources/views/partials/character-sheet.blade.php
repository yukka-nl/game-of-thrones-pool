<div class="row d-flex justify-content-center">
    @foreach($predictions as $prediction)
        <div class="col-6 col-sm-4 col-md-2 col-lg-2 col-xl-2 mt-3 text-center">
            <div class="position-relative">
                @if($prediction->house_id)
                    <span class="badge badge-primary position-absolute" style="bottom: 0px; right: 50px;"
                          data-toggle="tooltip" data-placement="top"
                          title="This house prediction does not count for the group or global leaderboards.">
                        House <i class="fas fa-question-circle"></i>
                    </span>
                @endif
                <img src="{{ URL::asset('img/characters/' . $prediction->character->image) }}"
                     class="rounded-circle w-100 mb-2"
                     style="max-height: 100px; max-width: 100px;">


            </div>
            <div class="mb-2">
                {{ $prediction->character->name }}
            </div>

            @if($prediction->is_correct)
                <div class="alert alert-success">
                    <i class="fas fa-check"></i> Correct
                </div>
            @endif

            @if($prediction->is_correct === 0)
                <div class="alert alert-danger">
                    <i class="fas fa-times"></i>  Incorrect
                </div>
            @endif

            @if($prediction->is_correct === null)
                <div class="alert alert-secondary">
                    Unknown
                </div>
            @endif

        </div>
    @endforeach
</div>