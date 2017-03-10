@foreach($pages as $page)
    <div class="list-group">
        <a href="{{ URL::route('page', [opStarts\Profession::slug($page->profession_id), opStarts\Cities::slug($page->city), $page->slug, $page->id]) }}" class="list-group-item">
            <h4 class="list-group-item-heading">{{ $page->company_name }} - {{ opStarts\Profession::name($page->profession_id) }}</h4>
            <p class="list-group-item-text">
                <img src="{{ url($page->logo) }}" alt="{{ $page->company_name }}" width="100%">
                {{ substr($page->description, 0, 120) }}
            </p>
        </a>
    </div>
@endforeach