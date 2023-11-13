/*"use strict"

const URL = "api/pelicula/";

let peliculas = [];

let form = document.querySelector('#peliculas-form');
form.addEventListener('submit', insertPelicula);


/**
 * Obtiene todas las tareas de la API REST
 
async function getAll() {
    try {
        let response = await fetch(URL);
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }
        peliculas = await response.json();

        showPeliculas();
    } catch(e) {
        console.log(e);
    }
}

/**
 * Inserta la tarea via API REST
 
async function insertPelicula(e) {
    e.preventDefault();
    
    let data = new FormData(form);
    let pelicula = {
        titulo: data.get('titulo'),
        director: data.get('director'),
        fechaLanzamiento: data.get('fecha'),
        sinopsis:data.get('sinopsis'),
    };

    try {
        let response = await fetch(URL, {
            method: "POST",
            headers: { 'Content-Type': 'application/json'},
            body: JSON.stringify(pelicula)
        });
        if (!response.ok) {
            throw new Error('Error del servidor');
        }

        let nPelicula = await response.json();

        // inserto la tarea nuevo
        peliculas.push(nPelicula);
        showPeliculas();

        form.reset();
    } catch(e) {
        console.log(e);
    }
} 

async function deletePelicula(e) {
    e.preventDefault();
    try {
        let id = e.target.dataset.pelicula;
        let response = await fetch(URL + id, {method: 'DELETE'});
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }

        // eliminar la tarea del arreglo global
        peliculas = peliculas.filter(pelicula => pelicula.id != id);
        showPeliculas();
    } catch(e) {
        console.log(e);
    }
}

function showPeliculas() {
    let ul = document.querySelector("#listaPeliculas");
    ul.innerHTML = "";
    for (const pelicula of peliculas) {

        let html = `
            <li class='
                    list-group-item d-flex justify-content-between align-items-center
                '>
                <span> ${pelicula.titulo} - ${pelicula.director} - ${pelicula.fechaLanzamiento} - ${pelicula.sinopsis}</span>
            <div class="ml-auto">
                <a href='#' data-pelicula="${pelicula.id}" type='button' class='btn btn-danger btn-delete'>Borrar</a>
            </div>
            </li>
           
        `;

        ul.innerHTML += html;
    }

    // asigno event listener para los botones
    const btnsDelete = document.querySelectorAll('a.btn-delete');
    for (const btnDelete of btnsDelete) {
        btnDelete.addEventListener('click', deletePelicula());
    }
}

getAll();*/
