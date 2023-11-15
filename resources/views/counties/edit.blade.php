<!-- resources/views/counties/edit.blade.php -->

<h1>Vármegye szerkesztés</h1>

<form action="{{ route('counties.update', $county) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Név:</label>
    <input type="text" name="name" value="{{ $county->name }}" required>
    <button type="submit">Mentés</button>
</form>

<a href="{{ route('counties.index') }}">Visszavonás</a>
