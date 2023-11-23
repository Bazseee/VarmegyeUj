<a href="{{ url('/') }}" title="Kezdőlap"><i class="fa fa-home"></i></a>
<h1>Város szerkesztése</h1>

<form action="{{ route('cities.update', $city) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Név:</label>
    <input type="text" name="name" value="{{ $city->name }}" required>
    <label for="county">Megye:</label>
    <select id="county" name="county_id" required>
        @foreach ($counties as $county)
            <option value="{{ $county->id }}" {{ $city->county_id == $county->id ? 'selected' : '' }}>
                {{ $county->name }}
            </option>
        @endforeach
    </select>
    <button type="submit">Mentés</button>
</form>

<a href="{{ route('cities.index') }}">Visszavonás</a>