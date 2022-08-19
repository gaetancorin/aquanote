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
//  logout_user
let background_logout_user = document.querySelector('.background_logout_user');
let button_arrow_logout_user = document.querySelector('#button_arrow_logout_user');
let button_back_logout_user = document.querySelector('#button_back_logout_user');

button_arrow_logout_user.addEventListener('click', (event)=>{
    background_logout_user.style.display = 'none';
});
button_back_logout_user.addEventListener('click', (event)=>{
    background_logout_user.style.display = 'none';
});

///////////////////////////////////////////////////////////
// BUTTONS DECLENCHEURS DE POP_UP
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
// logout_user
let activator_pop_up_logout_user = document.querySelectorAll('.activator_pop_up_logout_user');

activator_pop_up_logout_user.forEach(item=>
    item.addEventListener('click', (event)=>{
        background_logout_user.style.display = 'flex';
        hamburger_checkbox.checked = false;
    })
);
// bouton logout pour se déconnecter(les autres pop-up fonctionnent en formulaire)
let button_logout_user = document.querySelector('#button_logout_user');

button_logout_user.addEventListener('click', (event)=>{
    window.location = 'index.php?action=logoutUser';
});
