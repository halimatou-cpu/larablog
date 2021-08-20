<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="row pb-3">
        <div class="col-10">
            <form class="d-flex">
                <input class="form-control me-sm-2" type="text" placeholder="Search" wire:model="search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
    {{-- @dump($search) --}}
    <div class="row">
        <div class="col-10">
            <div class="articles row justify-content-center">
                @foreach ($articles as $article)
                    <div class="col-md-6">
                        <div class="card my-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <span class="badge rounded-pill bg-dark">{{ $article->category->label }}</span>
                                <p class="card-text">{{ $article->subtitle }}</p>
                                <a href="{{ route('article', [$article->slug]) }}" class="btn btn-primary">
                                    Lire la suite 
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-2 pt-3">
            {{-- Catégories --}}
            @foreach ($categories as $category)
                <div class="form-group p-1">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="{{ $category->id }}" wire:model="activeFilters.{{ $category->id }}">
                        <i class="fas fa-{{ $category->icon }}"></i>
                        <label class="custom-control-label" for="{{ $category->id }}">
                            {{ $category->label }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
