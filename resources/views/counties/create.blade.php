<!-- resources/views/counties/create.blade.php -->
<link rel="stylesheet" href="css/index.css">

<h1>Vármegye hozzáadás</h1>

<div class="container">
    <form action="{{ route('counties.store') }}" method="POST">
        @csrf
        <label for="name">Név:</label>
        <input type="text" name="name" required>
        <button type="submit">Mentés</button>
    </form>

    <a href="{{ route('counties.index') }}">Visszavonás</a>
</div>