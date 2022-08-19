async function getCities(){
    let country_id = document.getElementById('country_id').value;
    let response = await fetch(`/cites-by-country/${country_id}`);
    let responseJSON = await response.json();

    let options = '';
    responseJSON.forEach((city) => {
        options += `<option value="${city.id}">${city.name}</option>`;
    });
    document.getElementById('city_id').innerHTML = options;
}
