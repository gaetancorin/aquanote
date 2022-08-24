// Rfraichis l'url a chaque changement de date dans l'input url
let input_date = document.getElementById('date');

input_date.addEventListener('change', (event)=>{
    let newDate  = input_date.value;
    window.location = 'index.php?action=insertInputs&date='+newDate;
});

// change les couleurs des inputs en fonction de si ils ont changé ou non
inputs = document.querySelectorAll('input[readchangement]');
inputs.forEach( input => {
    input.style.color = 'rgb(24 41 207)';

    input.addEventListener('input', (event)=>{
        // console.log(event);
        if (input.defaultValue !== input.value){
            input.style.color = 'black';
        }
        if (input.defaultValue === input.value){
            input.style.color = 'rgb(24 41 207)';
        }
        if (event.data === '.'){
            input.style.color = 'black';
        }
    });
});
