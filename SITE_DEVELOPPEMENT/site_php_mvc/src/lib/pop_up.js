////// FLECHE RETOUR SUR POP_UP///////
//  create_aquarium
let background_create_aqua = document.querySelector('.background_create_aqua');
let button_arrow_create_aqua = document.querySelector('#button_arrow_create_aqua');

button_arrow_create_aqua.addEventListener('click', (event)=>{
    background_create_aqua.style.display = 'none';
});
//  change_name_aquarium
let background_change_name_aqua = document.querySelector('.background_change_name_aqua');
let button_arrow_change_name_aqua = document.querySelector('#button_arrow_change_name_aqua');

button_arrow_change_name_aqua.addEventListener('click', (event)=>{
    background_change_name_aqua.style.display = 'none';
});
//  delete_aquarium
let background_delete_aqua = document.querySelector('.background_delete_aqua');
let button_arrow_delete_aqua = document.querySelector('#button_arrow_delete_aqua');

button_arrow_delete_aqua.addEventListener('click', (event)=>{
    background_delete_aqua.style.display = 'none';
});
//  deconnect_aquarium
let background_deconnect_aqua = document.querySelector('.background_deconnect_aqua');
let button_arrow_deconnect_aqua = document.querySelector('#button_arrow_deconnect_aqua');
let button_retour_deconnect = document.querySelector('#button_retour_deconnect');

button_arrow_deconnect_aqua.addEventListener('click', (event)=>{
    background_deconnect_aqua.style.display = 'none';
});
button_retour_deconnect.addEventListener('click', (event)=>{
    background_deconnect_aqua.style.display = 'none';
});

///////////////////////////////////////////////////////////
// BUTTONS DECLENCHEURS pop_up
//burger checkbox
let hamburger_checkbox = document.querySelector('#hamburger_checkbox');

// create_aquarium
let activator_pop_up_create_aquarium = document.querySelectorAll('.activator_pop_up_create_aquarium');

activator_pop_up_create_aquarium.forEach(item=>
    item.addEventListener('click', (event)=>{
        background_create_aqua.style.display = 'flex';
        hamburger_checkbox.checked = false;
    })
);
// change_name_aquarium
let activator_pop_up_change_name_aquarium = document.querySelectorAll('.activator_pop_up_change_name_aquarium');

activator_pop_up_change_name_aquarium.forEach(item=>
    item.addEventListener('click', (event)=>{
        background_change_name_aqua.style.display = 'flex';
        hamburger_checkbox.checked = false;
    })
);
// delete_aquarium
let activator_pop_up_delete_aquarium = document.querySelectorAll('.activator_pop_up_delete_aquarium');

activator_pop_up_delete_aquarium.forEach(item=>
    item.addEventListener('click', (event)=>{
        background_delete_aqua.style.display = 'flex';
        hamburger_checkbox.checked = false;
    })
);
// deconnect_aquarium
let activator_pop_up_deconnect_aquarium = document.querySelectorAll('.activator_pop_up_deconnect_aquarium');

activator_pop_up_deconnect_aquarium.forEach(item=>
    item.addEventListener('click', (event)=>{
        background_deconnect_aqua.style.display = 'flex';
        hamburger_checkbox.checked = false;
    })
);
