<div class="card_producto_medio">
    <div class="container" >
          <div class="row d-none d-sm-flex">
              <div class="col-md-3 ">
                  <h6 class=" pt-4 fw-light" id="recountMedio">{{$storage->total()}} productos encontrados</h6>
              </div>
              <div class="col-md-9 d-flex justify-content-end">
                      <ul class="pagination custom-pagination " id="pagination">
                        <li class="page-item">
                              <a href="{{$storage->previousPageUrl()}}" class="page-link bg-empresa-tres text-empresa-uno" style="cursor:pointer" aria-label="Previous">
                            <span aria-hidden="true"><i class="bi bi-caret-left-fill"></i></span>
                          </a>
                        </li>
                        @for ($i = 1; $i <= $storage->lastPage(); $i++)
                        <li data-pag="{{$i}}" class="page-item  pag-btn {{$storage->currentPage() == $i ? 'active': ''}} current-page">
                          <a href="{{$storage->url($i)}}" class="page-link bg-empresa-tres text-empresa-uno ">{{$i}}</a>
                        </li>
                        @endfor
                        
                        <li class="page-item">
                          <a href="{{$storage->nextPageUrl()}}" class="page-link bg-empresa-tres text-empresa-uno" style="cursor:pointer" aria-label="Next" >
                            <span aria-hidden="true"><i class="bi bi-caret-right-fill"></i></span>
                          </a>
                        </li>
                      </ul>
              </div>
          </div>
          <div class="page-content" id="products-medio">
            <x-partials.lista-productos :productos="$storage" :colmedio="$colmedio" :empres="$empres"/>
          </div>
    </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Función para cargar productos usando AJAX
      function loadProducts(url) {
        const params = new URLSearchParams({
            colmedio: {{$colmedio}}
        });
        const fullUrl = `${url}&${params.toString()}`;
          fetch(fullUrl)
              .then(response => {
                  if (!response.ok) {
                      throw new Error('Network response was not ok');
                  }
                  return response.json();
              })
              .then(data => {
                  // Reemplazar el contenido del contenedor de productos
                  document.querySelector('.page-content').innerHTML = data.html;
                  console.log("Tipo de datos:", data);
                  // Actualizar los enlaces de paginación
                  updatePagination(data.paginaActual,data.paginaPrevia,data.paginaSiguiente);
              })
              .catch(error => console.error('Error al cargar los productos:', error));
      }

      // Función para actualizar los enlaces de paginación
      function updatePagination(paginaActual,linkPrevio,linkSiguiente) {
          let currentPageLink = document.querySelectorAll('.current-page');

          if(paginaActual){
            currentPageLink.forEach(function(x){
              x.classList.remove('active');
            });
          }
          alert(actualPag);
          
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
</script>