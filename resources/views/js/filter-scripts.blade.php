function habiliteChecks(input,clase){
    let checksDispo = document.querySelectorAll('.check-' + clase);
    
    if(input.checked){
        checksDispo.forEach(function(x){
            x.checked = true;
        });
    }else{
        checksDispo.forEach(function(x){
            x.checked = false;
        });
    }
}

function checkInputOfAll(){
    let checkAllDispo = document.querySelectorAll('.check-todos-dispo');
    let checkAllMarca = document.querySelectorAll('.check-todos-marca');
    let checkAllGrupo = document.querySelectorAll('.check-todos-grupo');
    
    let checkDispo = document.querySelectorAll('.check-dispo');
    let checkMarcas = document.querySelectorAll('.check-marca');
    let checkGrupos = document.querySelectorAll('.check-grupo');
    
    checkAllDispo.forEach(function(c){
        c.checked = true;
    });
    checkAllMarca.forEach(function(c){
        c.checked = true;
    });
    checkAllGrupo.forEach(function(c){
        c.checked = true;
    });
    
    checkDispo.forEach(function(x){
        if(!x.checked){
            checkAllDispo.forEach(function(c){
                c.checked = false;
            });
        }
    });
    
    checkMarcas.forEach(function(x){
        if(!x.checked){
            checkAllMarca.forEach(function(c){
                c.checked = false;
            });
        }
    });
    
    checkGrupos.forEach(function(x){
        if(!x.checked){
            checkAllGrupo.forEach(function(c){
                c.checked = false;
            });
        }
    });
    
}

function validateCheck(){
    let divProducts = document.querySelectorAll('.filter');
    
    //marcas 
    let checkMarcas = document.querySelectorAll('.check-marca');
    checkMarcas.forEach(function(x){
        divProducts.forEach(function(d){
            if(x.value == d.getAttribute('data-marca')){
                x.checked = true;
            }
        });
    });
    
    //disponibilidad
    let checkDispo = document.querySelectorAll('.check-dispo');
    checkDispo.forEach(function(x){
        divProducts.forEach(function(d){
            if(x.value == d.getAttribute('data-dispo')){
                x.checked = true;
            }
        });
    });
    
    //grupos
    let checkGrupos = document.querySelectorAll('.check-grupo');
    checkGrupos.forEach(function(x){
        divProducts.forEach(function(d){
            if(x.value == d.getAttribute('data-grupo')){
                x.checked = true;
            }
        });
    });
    
}

document.addEventListener('DOMContentLoaded', function() {
    // Tu código o función aquí
    validateCheck();
    checkInputOfAll();
    
    let checkDispo = document.querySelectorAll('.check-dispo');
    checkDispo.forEach(function(x){
        x.addEventListener('change', checkInputOfAll);
    });
    
    let checkMarcas = document.querySelectorAll('.check-marca');
    checkMarcas.forEach(function(x){
        x.addEventListener('change', checkInputOfAll);
    });
    
    let checkGrupos = document.querySelectorAll('.check-grupo');
    checkGrupos.forEach(function(x){
        x.addEventListener('change', checkInputOfAll);
    });
});
