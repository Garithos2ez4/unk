<div class="card_producto_medio">
    <div class="container" style="position: relative">
          @if($storage->total() < 1)
          <div class="row">
            <div class="col-6 col-md-3 ">
                <h6 class=" pt-4 fw-light" id="recountMedio">{{$storage->total()}} productos encontrados</h6>
            </div>
          </div>
          <div class="row" style="height:20vh">
          </div>
          <x-aviso_no_encontrado :nameProduct="''" />
          <div class="row" style="height:20vh">
          </div>
          @else
          <div class="row h-100 w-100 justify-content-center" id="loader-list-products" style="background-color:rgba(255, 255, 255, 0.699);position: absolute;z-index:800;margin-left:-1.5rem;display:none">
            <div class="spinner-border" style="width: 3rem; height: 3rem;margin-top:25vh;margin-bottom:25vh;position: sticky; top: 50%;" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
          <div class="row">
              <div class="col-6 col-md-3 ">
                  <h6 class=" pt-4 fw-light" id="recountMedio">{{$storage->total()}} productos encontrados</h6>
              </div>
              <div class="col-md-9 d-flex justify-content-center justify-content-md-end align-items-center pt-2 {{$storage->lastPage() < 2 ? 'd-none' : ''}}">
                      <ul class="pagination custom-pagination mt-2" id="pagination">
                        <li class="page-item">
                              <a id="page-item-previus" href="{{$storage->previousPageUrl() == null ? 'javascript:void(0)' : $storage->previousPageUrl()}}" class="page-link bg-empresa-tres text-empresa-uno" style="cursor:pointer" aria-label="Previous">
                            <span aria-hidden="true"><i class="bi bi-caret-left-fill"></i></span>
                          </a>
                        </li>
                        @for ($i = 1; $i <= $storage->lastPage(); $i++)
                        <li data-pag="{{$i}}" class="page-item  pag-btn {{$storage->currentPage() == $i ? 'active': ''}} current-page">
                          <a href="{{$storage->url($i)}}" class="page-link bg-empresa-tres text-empresa-uno ">{{$i}}</a>
                        </li>
                        @endfor
                        
                        <li class="page-item">
                          <a id="page-item-next" href="{{$storage->nextPageUrl() == null ? 'javascript:void(0)' : $storage->nextPageUrl()}}" class="page-link bg-empresa-tres text-empresa-uno" style="cursor:pointer" aria-label="Next" >
                            <span aria-hidden="true"><i class="bi bi-caret-right-fill"></i></span>
                          </a>
                        </li>
                      </ul>
              </div>
          </div>
          <div class="page-content" id="products-medio" >
            <x-partials.lista-productos :productos="$storage" :colmedio="$colmedio" :empres="$empres" :colsmall="$colsmall"/>
          </div>
          @endif
    </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    
    
      // Función para cargar productos usando AJAX
      function loadProducts(url) {
        let loader = document.getElementById('loader-list-products');
        const params = new URLSearchParams({
            colmedio: {{$colmedio}},
            colsmall: {{$colsmall}}
        });
        const fullUrl = `${url}&${params.toString()}`;
        loader.style.display = 'flex';
          fetch(fullUrl)
              .then(response => {
                  if (!response.ok) {
                      throw new Error('Network response was not ok');
                  }
                  return response.json();
              })
              .then(data => {
                  document.querySelector('.page-content').innerHTML = data.html;
                  updatePagination(data.paginaActual,data.paginaPrevia,data.paginaSiguiente);
                  loader.style.display = 'none';
              })
              .catch(error => console.error('Error al cargar los productos:', error));
      }

      function updatePagination(paginaActual,linkPrevio,linkSiguiente) {
          let currentPageLink = document.querySelectorAll('.current-page');
          let previusPageLink = document.getElementById('page-item-previus');
          let nextPageLink = document.getElementById('page-item-next');
          if(paginaActual){
            currentPageLink.forEach(function(x){
              if(x.dataset.pag == paginaActual){
                x.classList.add('active');
              }else{
                x.classList.remove('active');
              }
            });

            if(linkPrevio != null){
              previusPageLink.href = linkPrevio;
            }else{
              previusPageLink.href = "javascript:void(0)";
            }

            if(linkSiguiente != null){
              nextPageLink.href = linkSiguiente;
            }else{
              nextPageLink.href = "javascript:void(0)";
            }
          }
          
      }

      document.querySelectorAll('#pagination a.page-link').forEach(link => {
          link.addEventListener('click', function(event) {
              event.preventDefault();
              
              const url = this.getAttribute('href');
              if(url != 'javascript:void(0)'){
                loadProducts(url);
              }
              
          });
      });

      // Cargar la paginación inicialmente
      updatePagination();
  });
</script>