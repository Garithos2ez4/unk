document.addEventListener('DOMContentLoaded', function () {
    // Función para cargar productos usando AJAX
    function loadProducts(url) {
      alert(url);
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                // Reemplazar el contenido del contenedor de productos
                document.querySelector('.page-content').innerHTML = data;
                
                // Actualizar los enlaces de paginación
                updatePagination();
            })
            .catch(error => console.error('Error al cargar los productos:', error));
    }

    // Función para actualizar los enlaces de paginación
    function updatePagination() {
        const currentPageLink = document.querySelector('#current-page');
        const currentPage = parseInt(currentPageLink.innerText) || 1;
        currentPageLink.innerText = currentPage;

        // Actualiza la URL de la página anterior
        const prevPageLink = document.querySelector('#prev-page');
        prevPageLink.setAttribute('href', '{{ $storage->previousPageUrl() }}');

        // Actualiza la URL de la página siguiente
        const nextPageLink = document.querySelector('#next-page');
        nextPageLink.setAttribute('href', '{{ $storage->nextPageUrl() }}');
    }

    // Agregar evento para los enlaces de paginación
    document.querySelectorAll('#pagination a.page-link').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Evitar que el enlace recargue la página

            // Obtener la URL de la página a cargar
            const url = this.getAttribute('href');

            // Cargar productos usando AJAX
            loadProducts(url);
        });
    });

    // Cargar la paginación inicialmente
    updatePagination();
});