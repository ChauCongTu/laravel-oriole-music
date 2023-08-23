@if ($posted_at == null)
    <span>{{ date('H:i d/m/Y', strtotime($created_at)) }}</span>
@else
    <span>{{ date('H:i d/m/Y', $posted_at) }}</span>
@endif
