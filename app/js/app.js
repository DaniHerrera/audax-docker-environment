const searchForm = document.getElementById('search-form');
const searchInput = document.getElementById('search-input');
const resultsContainer = document.getElementById('results-container');
const errorMessage = document.getElementById('error-message');

function searchWikipedia(searchTerm) {
    const url = `https://en.wikipedia.org/w/api.php?action=query&format=json&list=search&srsearch=${searchTerm}&callback=handleResponse`;
    const script = document.createElement('script');
    script.src = url;
    document.body.appendChild(script);
}

function handleResponse(response) {
    const results = response.query.search;

    if (results.length > 0) {
        results.forEach(result => {
            const resultElement = document.createElement('div');
            resultElement.classList.add('result');

            const titleElement = document.createElement('h2');
            titleElement.textContent = result.title;

            const snippetElement = document.createElement('p');
            snippetElement.innerHTML = result.snippet;

            resultElement.appendChild(titleElement);
            resultElement.appendChild(snippetElement);

            resultsContainer.appendChild(resultElement);
        });
    } else {
        errorMessage.textContent = 'No se encontraron resultados.';
    }
}

searchForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const searchTerm = searchInput.value.trim();

    if (searchTerm !== '') {

        resultsContainer.innerHTML = '';
        errorMessage.textContent = '';

        searchWikipedia(searchTerm);

        const parameters = {
            searchInput: searchTerm,
        };
        /*
        console.log('parameters');
        console.log(parameters);
        */
        fetch('/php/insertarBusqueda.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams(parameters)
        })
            .then(response => {
                if (response.ok) {
                    console.log('Datos enviados correctamente al archivo PHP.');
                } else {
                    console.error('Error al enviar los datos al archivo PHP.');
                }
            })
            .catch(error => {
                console.error('Error en la solicitud:', error);
            });

    }
});
