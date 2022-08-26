async function getCities(city_id = false){
    let country_id = document.getElementById('country_id').value;
    let response = await fetch(`/cites-by-country/${country_id}`);
    let responseJSON = await response.json();

    let options = '';
    responseJSON.forEach((city) => {
        let selected = '';
        if(city_id && city_id == city.id) selected = "selected";

        options += `<option value="${city.id}" ${selected}>${city.name}</option>`;
    });
    document.getElementById('city_id').innerHTML = options;
}
