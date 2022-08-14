// pop_up delete_aquarium
let background_delete_aqua = document.querySelector('.background_delete_aqua');
console.log(background_delete_aqua);

let button_back_delete_aqua = document.querySelector('.button_back_delete_aqua');
console.log(button_back_delete_aqua);

button_back_delete_aqua.addEventListener('click', (event)=>{
    background_delete_aqua.style.display = 'none';
});
// popup create_aquarium
let background_create_aqua = document.querySelector('.background_create_aqua');
console.log(background_create_aqua);

let button_back_create_aqua = document.querySelector('.button_back_create_aqua');
console.log(button_back_create_aqua);

button_back_create_aqua.addEventListener('click', (event)=>{
    background_create_aqua.style.display = 'none';
});
// popup change_name_aquarium
let background_change_name_aqua = document.querySelector('.background_change_name_aqua');
console.log(background_change_name_aqua);

let button_back_change_name_aqua = document.querySelector('.button_back_change_name_aqua');
console.log(button_back_change_name_aqua);

button_back_change_name_aqua.addEventListener('click', (event)=>{
    background_change_name_aqua.style.display = 'none';
});
// popup deconnect_aquarium
let background_deconnect_aqua = document.querySelector('.background_deconnect_aqua');
console.log(background_deconnect_aqua);

let button_back_deconnect_aqua = document.querySelector('.button_back_deconnect_aqua');
console.log(button_back_deconnect_aqua);

button_back_deconnect_aqua.addEventListener('click', (event)=>{
    background_deconnect_aqua.style.display = 'none';
});