let pagSelect = 1;
        
function changeNumber(numPag){
    pagSelect = numPag;
    showPage(pagSelect);
}

function plusPage(){
    if(pagSelect == lengthPagBtn()){
        showPage(lengthPagBtn());
    }else{
        pagSelect = pagSelect + 1;
        showPage(pagSelect);
    }
    
}

function minusPage(){
    if(pagSelect == 1){
        showPage(1);
    }else{
        pagSelect = pagSelect - 1;
        showPage(pagSelect);
    }
}

function showPage(numSelect) {
    try{
      document.querySelectorAll('.page-content').forEach(function(page) {
        page.style.display = 'none';
      });
    
      document.getElementById('page-' + numSelect).style.display = 'block';
      var pageItems = document.querySelectorAll('.page-item');
      for (var i = 0; i < pageItems.length; i++) {
        pageItems[i].classList.remove('active');
      }
    
      var currentPage = document.getElementById('btnPag-' + numSelect);
      currentPage.classList.add('active');
    }catch(error){
        console.error('Se produjo un error:', error.message);
    }
}

function lengthPagBtn(){
    let cant = document.querySelectorAll('.pag-btn');
    return cant.length;
}

document.addEventListener('DOMContentLoaded', function() {
    showPage(1);
});
