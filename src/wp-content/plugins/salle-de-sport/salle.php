<?php
/*
Plugin Name: Sport
Description: Un widget personnalisé pour le tableau de bord.
Version: 1.0
Author: Votre nom
*/

function ajouter_menu_salle_de_sport() {
    add_menu_page(
        'Titre de votre page',    // Le titre de votre page
        'Salle de Sport',    // Le texte dans le menu
        'manage_options',         // Droits d'accès nécessaires
        'menu-salle-de-sport',    // Slug de la page
        'afficher_contenu_salle_de_sport', // Fonction d'affichage du contenu
        'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iOTQ2IiBoZWlnaHQ9IjU1NCIgdmlld0JveD0iMCAwIDk0NiA1NTQiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHg9IjIwMi41IiB5PSIyMzAuNSIgd2lkdGg9IjUzNiIgaGVpZ2h0PSI2OCIgZmlsbD0iI0Y4RjhGOCIgc3Ryb2tlPSJibGFjayIgc3Ryb2tlLXdpZHRoPSIxNSIvPgo8cmVjdCB4PSIxNzAuNjAyIiB5PSI1NDMuNTUyIiB3aWR0aD0iNTM2IiBoZWlnaHQ9IjgzLjYyMTciIHJ4PSI0MS44MTA5IiB0cmFuc2Zvcm09InJvdGF0ZSgtODkuMjEyMSAxNzAuNjAyIDU0My41NTIpIiBmaWxsPSIjRjhGOEY4IiBzdHJva2U9ImJsYWNrIiBzdHJva2Utd2lkdGg9IjE1Ii8+CjxyZWN0IHg9IjY4Mi42MDIiIHk9IjU0NC41NTIiIHdpZHRoPSI1MzYiIGhlaWdodD0iODMuNjIxNyIgcng9IjQxLjgxMDkiIHRyYW5zZm9ybT0icm90YXRlKC04OS4yMTIxIDY4Mi42MDIgNTQ0LjU1MikiIGZpbGw9IiNGOEY4RjgiIHN0cm9rZT0iYmxhY2siIHN0cm9rZS13aWR0aD0iMTUiLz4KPHJlY3QgeD0iNzY3LjYwMiIgeT0iNDYzLjY2MSIgd2lkdGg9IjM3NS4wOTQiIGhlaWdodD0iODMuNjIxNyIgcng9IjQxLjgxMDkiIHRyYW5zZm9ybT0icm90YXRlKC04OS4yMTIxIDc2Ny42MDIgNDYzLjY2MSkiIGZpbGw9IiNGOEY4RjgiIHN0cm9rZT0iYmxhY2siIHN0cm9rZS13aWR0aD0iMTUiLz4KPHJlY3QgeD0iODUxLjYwMiIgeT0iMzgyLjY2IiB3aWR0aD0iMjE1LjA3NyIgaGVpZ2h0PSI4My42MjE3IiByeD0iNDEuODEwOSIgdHJhbnNmb3JtPSJyb3RhdGUoLTg5LjIxMjEgODUxLjYwMiAzODIuNjYpIiBmaWxsPSIjRjhGOEY4IiBzdHJva2U9ImJsYWNrIiBzdHJva2Utd2lkdGg9IjE1Ii8+CjxyZWN0IHg9Ijg5LjYwMjQiIHk9IjQ2NC42NjEiIHdpZHRoPSIzNzUuMDk0IiBoZWlnaHQ9IjgzLjYyMTciIHJ4PSI0MS44MTA5IiB0cmFuc2Zvcm09InJvdGF0ZSgtODkuMjEyMSA4OS42MDI0IDQ2NC42NjEpIiBmaWxsPSIjRjhGOEY4IiBzdHJva2U9ImJsYWNrIiBzdHJva2Utd2lkdGg9IjE1Ii8+CjxyZWN0IHg9IjcuNjAyNDIiIHk9IjM4NC42NiIgd2lkdGg9IjIxNS4wNzciIGhlaWdodD0iODMuNjIxNyIgcng9IjQxLjgxMDkiIHRyYW5zZm9ybT0icm90YXRlKC04OS4yMTIxIDcuNjAyNDIgMzg0LjY2KSIgZmlsbD0iI0Y4RjhGOCIgc3Ryb2tlPSJibGFjayIgc3Ryb2tlLXdpZHRoPSIxNSIvPgo8L3N2Zz4K    ',
        30 // Position dans le menu (30 est un exemple)
    );
}

add_action('admin_menu', 'ajouter_menu_salle_de_sport');

function afficher_contenu_salle_de_sport() {
    // Code pour afficher le contenu de votre page ici
    echo '<div>Contenu de votre page Salle de Sport</div>';
}