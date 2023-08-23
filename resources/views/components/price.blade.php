@if ($to > time())
    <div class="price">
        <span class="font-weight-bold text-danger mr-1">{{ number_format($price - $discount) }}đ</span><br/>
        <span><del><i>{{ number_format($price) }}đ</i></del></span>
    </div>
@else
    <div class="price">
        <span class="font-weight-bold text-danger mr-3">{{ number_format($price) }}đ</span>
    </div>
@endif
