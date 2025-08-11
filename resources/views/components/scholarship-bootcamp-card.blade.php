<div class="col">
    <div class="card h-100">
        <div class="card-body d-flex flex-column">
            <div class="rounded overflow-hidden mb-2" style="height: 220px;">
                <img src="{{ $image }}" class="w-100 object-fit-cover" alt="image">
            </div>
            <h4 class="card-title text-primary">{{ $name }}</h4>
            <p class="card-text text-black-50">{{ $desc }}</p>
            <div class="d-flex justify-content-end mt-auto">
                <a href="{{ $link ?? '#' }}" class="btn btn-custom-gradient px-4 py-2 rounded-pill" target="_blank">See More</a>
            </div>
        </div>
    </div>
</div>
