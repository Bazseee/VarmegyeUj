<!-- resources/views/counties/index.blade.php -->
<a href="{{ url('/') }}" title="Kezdőlap"><i class="fa fa-home"></i></a>
<h1>Vármegyék</h1>

<a href="{{ route('counties.create') }}">Vármegye hozzáadás</a>

<form action="{{ route('counties.filter') }}" method="GET">
    <input type="text" name="filter" placeholder="Szűrés név szerint">
    <button type="submit">Szűrő</button>
</form>

<ul>
    @foreach ($counties as $county)
        <li>
            {{ $county->name }}
            <a href="{{ route('counties.edit', $county) }}">Szerkesztés</a>
            <form action="{{ route('counties.destroy', $county) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Törlés</button>
            </form>
        </li>
    @endforeach
</ul>
