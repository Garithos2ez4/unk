document.getElementById('form-new-reclamo').addEventListener('submit', function(event) {
            var response = grecaptcha.getResponse();
            if(response.length == 0) {
                alert('Por favor, completa el captcha.');
                event.preventDefault(); // Evita que el formulario se envíe
            }
        });
    function validateEdad(){
        let checkEdad = document.getElementById('check-edad');
        let inputApoderado = document.getElementById('form-apoderado');
        
        if(checkEdad.checked){
            inputApoderado.style.display = 'block';
        }else{
            inputApoderado.style.display = 'none';
        }
    }
    
    function toggleCheckboxes() {
        let checkReclamo = document.getElementById('check-reclamo');
        let checkQueja = document.getElementById('check-queja');
        
        // Si se marca Reclamo, desmarcamos Queja, y viceversa
        if (this.id === 'check-reclamo') {
            checkQueja.checked = !checkReclamo.checked;
        } else {
            checkReclamo.checked = !checkQueja.checked;
        }
    }
    
    function validateData(){
        let inputsData = document.querySelectorAll('.form-reclamo');
        let checksPolitica = document.querySelectorAll('.check-politicas');
        let disabledButton = false;
        
        inputsData.forEach(function(x){
            if(x.value == ''){
                disabledButton = true;
            }
        });
        
        checksPolitica.forEach(function(x){
            if(!x.checked){
                disabledButton = true;
            }
        });
        
        return disabledButton;
    }
    
    function toggleButton(){
        let btnReclamo = document.getElementById('btn-reclamo');
        btnReclamo.disabled = validateData();
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        toggleButton();
        validateEdad();
        toggleCheckboxes();
        
        let inputsData = document.querySelectorAll('.form-reclamo');
        inputsData.forEach(function(input) {
            input.addEventListener('input', function() {
                toggleButton(); // Revisar el estado de los campos cada vez que cambien
            });
        });
        
        document.querySelectorAll('.check-politicas').forEach(function(input) {
            input.addEventListener('input', function() {
                toggleButton(); // Revisar el estado de los campos cada vez que cambien
            });
        });
        
        document.getElementById('check-edad').addEventListener('change',validateEdad);
        document.getElementById('check-reclamo').addEventListener('change', toggleCheckboxes);
        document.getElementById('check-queja').addEventListener('change', toggleCheckboxes);

    });