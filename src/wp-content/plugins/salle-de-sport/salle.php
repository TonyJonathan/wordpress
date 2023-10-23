<?php
/*
Plugin Name: Salle de sport
Description: Permet de créer des salles de sport à partir d'un formulaire et de les implémenter. 
Version: 1.0
Author: Tony BRUCHON
*/

function afficher_page_ajout_salle_de_sport() {
    ?>
    <div class="wrap">
        <h2>Ajouter une nouvelle salle de sport</h2>
        <?php
        if (function_exists('acf_form')) {
            acf_form(array(
                'post_id' => 'new_post',
                'post_title' => true,
                'post_content' => false,
                'new_post' => array(
                    'post_type' => 'salle_de_sport',
                    'post_status' => 'publish'
                ),
                'submit_value' => 'Ajouter Salle de Sport',
            ));
        } else {
            echo 'Veuillez installer et activer Advanced Custom Fields (ACF) pour utiliser ce formulaire.';
        }
        ?>
    </div>
    <?php
}

function enregistrer_custom_post_type_salle_de_sport() {
    $labels = array(
        'name' => 'Salles de sport',
        'singular_name' => 'Salle de sport',
        'menu_name' => 'Salles de sport',
        'add_new' => 'Ajouter Salle de sport',
        'add_new_item' => 'Ajouter une nouvelle salle de sport',
        'edit_item' => 'Modifier Salle de sport',
        'new_item' => 'Nouvelle Salle de sport',
        'view_item' => 'Voir Salle de sport',
        'search_item' => 'Rechercher dans les Salles de sport',
        'not_found' => 'Aucune Salle de sport trouvée',
        'not_found_in_trash' => 'Aucune Salle de sport trouvée dans la corbeille'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-building',
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'salle-de-sport')
    );

    register_post_type('salle_de_sport', $args);
}

add_action('init', 'enregistrer_custom_post_type_salle_de_sport');