<a href="{{ url('/') }}" title="Kezdőlap"><i class="fa fa-home"></i></a>
<h1>Városok</h1>

<label for="county">Szűrés megye szerint:</label>
<select id="county" name="county">
    <option value="">Megye kiválasztása</option>
    @foreach ($counties as $county)
        <option value="{{ $county->id }}">{{ $county->name }}</option>
    @endforeach
</select>

<ul id="cityList">
    
</ul>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#county').change(function () {
            var countyId = $(this).val();
            $.ajax({
                type: 'GET',
                url: '/cities/filter',
                data: { county_id: countyId },
                success: function (response) {
                    var cityList = $('#cityList');
                    cityList.empty();
                    $.each(response.cities, function (index, city) {
                        cityList.append('<li>' + city.name + '</li>');
                    });
                }
            });
        });
    });
</script>