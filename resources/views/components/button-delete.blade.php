<a href="#" onclick="deleteData({{ $id }})" {{ $attributes->merge(['class' => '']) }}>
    <i class="fas fa-eraser"></i>
    {{ $title }}
</a>
<form id="delete-form-{{ $id }}" action="{{ $url }}" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>
