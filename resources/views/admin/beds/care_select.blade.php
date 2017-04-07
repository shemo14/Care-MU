<option>--- اختر العناية ---</option>
@if(!empty($cares))
    @foreach($cares as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
@endif