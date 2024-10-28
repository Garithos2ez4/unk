<div class="slider_medio">
    <script src="{{ route('js.carrusel-marcas-scripts',[$titulo,$slideSmall,$slideMedio]) }}"></script>
    <div class="row">
        <div class="col-6">
            <h2>{{$titulo}}</h2>
        </div>
        <div class="col-6 text-end">
            <button id="prev-{{ Str::slug($titulo, '-') }}" class="btn text-empresa-uno letters"><i class="bi bi-arrow-left-circle-fill" style="font-size:2rem"></i></button>
            <button id="next-{{ Str::slug($titulo, '-') }}" class="btn text-empresa-uno letters"><i class="bi bi-arrow-right-circle-fill" style="font-size:2rem"></i></button>
        </div>
    </div>
    <div class="row">
        <div class="col-12" style="overflow: hidden;">
            <div class="row w-100 slides-{{ Str::slug($titulo, '-') }}" style="display: inline-block;
            transition: transform 1s ease;
            white-space: nowrap;">
                @foreach($producto as $pro)
                 <div class="slide-{{ Str::slug($titulo, '-') }}" style="white-space: normal;display: inline-block;
            width: 20%;">
                     <x-card_producto_individual :producto="$pro" :empres="$empre" :dolar="$cambio"/>
                 </div>
                @endforeach
                <div class="slide-{{ Str::slug($titulo, '-') }}" style="display: inline-block;
            width: 20%;">
                    <div class="card bg-empresa-tres border-empresa-dos w-100 mb-2" style="height: 18rem">
                        <div class="card-body ">
                            <a href="{{$link}}" class="text-decoration-none">
                            <div class="row text-empresa-dos text-center align-items-center " style="margin-top:3rem;font-size:1rem">
                                <p>Ver más</p>
                                <p class="text-wrap">{{$titulo}}</p>
                                <p><i class="bi bi-plus-circle"></i></p>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const slides = document.querySelector('.slides-{{ Str::slug($titulo, '-') }}');
            const slideElements = document.querySelectorAll('.slide-{{ Str::slug($titulo, '-') }}');
            
            let currentIndex = 0;

            document.getElementById('next-{{ Str::slug($titulo, '-') }}').addEventListener('click', function () {
                if (currentIndex < calculateSize()) {
                    currentIndex++;
                    updateSlider();
                }
            });

            document.getElementById('prev-{{ Str::slug($titulo, '-') }}').addEventListener('click', function () {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateSlider();
                }
            });
            
            slides.addEventListener('touchstart', function (e) {
                startX = e.touches[0].clientX;
            });

            slides.addEventListener('touchend', function (e) {
                endX = e.changedTouches[0].clientX;
                handleSwipe();
            });

            function handleSwipe() {
                if (startX - endX > 50) {
                    // Swipe hacia la izquierda
                    if (currentIndex < calculateSize()) {
                        currentIndex++;
                        updateSlider();
                    }
                } else if (endX - startX > 50) {
                    // Swipe hacia la derecha
                    if (currentIndex > 0) {
                        currentIndex--;
                        updateSlider();
                    }
                }
            }
            
            function calculateSize() {
                const windowWidth = window.innerWidth;
                if (windowWidth < 576) {
                    return {{$slideSmall}}; 
                } else {
                    return {{$slideMedio}}; 
                } 
            }
            
            function calculatePorcent(){
                const windowWidth = window.innerWidth;
                if (windowWidth < 576) {
                    return 102; 
                } else {
                    return 53; 
                } 
            }

            function updateSlider() {
                const translateValue = -currentIndex * calculatePorcent();
                
                slides.style.transform = `translateX(${translateValue}%)`;
            }
            
            function restartSlider() {
                const translateValue = 0;
                currentIndex = 0;
                
                slides.style.transform = `translateX(${translateValue}%)`;
            }
            
            function transformCard(){
                const windowWidth = window.innerWidth;
                
                if (windowWidth < 576) {
                    slideElements.forEach(function(x) {
                        x.style.width = '50%';
                    });
                } else {
                    slideElements.forEach(function(x) {
                        x.style.width = '20%';
                    });
                } 
            }
            
            transformCard();
            window.addEventListener('resize', transformCard); 
            window.addEventListener('resize', restartSlider); 
        });
    </script>
</div>