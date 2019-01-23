

$(document).ready(function()
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if (modalDefaultAdminCode != 0) {
        changeCity(countryCode, modalDefaultAdminCode);
    }
    $('#modalAdminField').change(function() {
        changeCity(countryCode, $(this).val());
    });
    $('.city_by_division').change(function() {
        changeCityHome(countryCode, $(this).val());
    });
    $('.city_from_division').change(function() {
        changeCityAreaHome(countryCode, $(this).val());
    });
});

function changeCity(countryCode, modalDefaultAdminCode)
{
	/* Check Bugs */
    if (typeof languageCode == 'undefined' || typeof countryCode == 'undefined' || typeof modalDefaultAdminCode == 'undefined') {
        return false;
    }

	/* Make ajax call */
    $.ajax({
        method: 'POST',
        url: siteUrl + '/ajax/countries/' + countryCode + '/admin1/cities',
        data: {
            'languageCode': languageCode,
            'adminCode': modalDefaultAdminCode,
            'currSearch': $('#currSearch').val(),
            '_token': $('input[name=_token]').val()
        }
    }).done(function(data)
	{
        if (typeof data.adminCities == "undefined") {
            return false;
        }
        $('#selectedAdmin strong').html(data.selectedAdmin);
        $('#adminCities').html(data.adminCities);
        $('#modalAdminField').val(modalDefaultAdminCode).prop('selected');
    });
}

function changeCityHome(countryCode, modalDefaultAdminCode)
{
    /* Check Bugs */
    if (typeof languageCode == 'undefined' || typeof countryCode == 'undefined' || typeof modalDefaultAdminCode == 'undefined') {
        return false;
    }

    /* Make ajax call */
    $.ajax({
        method: 'POST',
        url: siteUrl + '/ajax/countries/' + countryCode + '/admin1/cities',
        data: {
            'languageCode': languageCode,
            'adminCode': modalDefaultAdminCode,
            'homepage_city': true,
            'currSearch': $('#currSearch').val(),
            '_token': $('input[name=_token]').val()
        }
    }).done(function(data)
    {
        $('.city_from_division').html(data);
        $('.city_by_division').val(modalDefaultAdminCode).prop('selected');
    });
}

function changeCityAreaHome(countryCode, modalDefaultAdminCode)
{
    /* Check Bugs */
    if (typeof languageCode == 'undefined' || typeof countryCode == 'undefined' || typeof modalDefaultAdminCode == 'undefined') {
        return false;
    }

    /* Make ajax call */
    $.ajax({
        method: 'POST',
        url: siteUrl + '/ajax/countries/' + countryCode + '/admin1/cities',
        data: {
            'languageCode': languageCode,
            'adminCode': modalDefaultAdminCode,
            'homepage_area': true,
            'currSearch': $('#currSearch').val(),
            '_token': $('input[name=_token]').val()
        }
    }).done(function(data)
    {
        $('.area_from_city').html(data);
        $('.city_from_division').val(modalDefaultAdminCode).prop('selected');
    });
}
