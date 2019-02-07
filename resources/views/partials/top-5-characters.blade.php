<div class="card {{ $background }} mb-3">
    <div class="card-body text-white pl-3 pr-3 pt-3 pb-3">
        <h2 class="h5 mb-0"><i class="{{ $icon }} mr-1"></i> {{ $title }}</h2>
    </div>
</div>

<table class="table borderless">

    <tbody>
    @foreach($characters as $index => $character)
        <tr class="align-center">
            <td class="pl-0 pr-0 align-center">
                <img src="/img/characters/{{ $character->image }}"
                     class="rounded-circle w-100 mr-3"
                     style="max-height: 40px; max-width: 40px;">
                {{ $character->name }}
            </td>
            <td class="align-center">
                {{ round(($character[$statusField] / $predictionCount) * 100, 2) }}% <br>
                <small class="text-muted">of the users think this</small>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>