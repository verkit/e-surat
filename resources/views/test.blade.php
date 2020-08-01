<form action="/test" method="POST" autocomplete="off">
    @csrf
    <input type="text" name="surat_id" hidden value="{{$surat->id}}">
    @foreach ($surat->forms as $item)
    @if ($item->is_displayed == 0)
    <input type="text" name="form_name[]" required>
    <input type="text" name="form_id[]" value="{{$item->id}}" readonly hidden>
    <small>{{$item->form_name}}</small>
    @else
    <input type="text" name="form_name[]" value="" readonly hidden>
    <input type="text" name="form_id[]" value="{{$item->id}}" readonly hidden>
    @endif
    @endforeach
    <button type="submit">simpan</button>
</form>
