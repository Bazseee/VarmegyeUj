<!-- resources/views/counties/create.blade.php -->
<a href="{{ url('/') }}" title="Kezdőlap"><i class="fa fa-home"></i></a>
<h1>Vármegye hozzáadás</h1>

<form action="{{ route('counties.store') }}" method="POST">
    @csrf
    <label for="name">Név:</label>
    <input type="text" name="name" required>
    <button type="submit">Mentés</button>
</form>

<a href="{{ route('counties.index') }}">Visszavonás</a>
