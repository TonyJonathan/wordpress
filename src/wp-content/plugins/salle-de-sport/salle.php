<?php 
/*
Plugin Name: Salle de sport
Description: Permet de créer des salles de sport à partir d'un formulaire et de les implémenter.
Version: 1.0
Author: Tony BRUCHON
*/

class SalleDeSport_Widget extends WP_Widget {  // classe déclarée 
    public function __construct() {
        parent::__construct(
            'salle_de_sport_widget', // identifiant du widget
            'Widget Salle de Sport', // nom du widget qui apparaît dans l'interface
            array('description' => 'Un widget pour afficher les salles de sport.')
        );
    }

    public function widget($args, $instance) { // args est un tableau d'arguments qui contient des infos sur la zone de widget comme les balises HTML à utiliser pour l'encadrer, $instance est un tableau des paramètres d'instance du widget, qui peut être configuré dans l'interface d'administration
        echo $args['before_widget']; // ouverture de la zone html du widget

        // Ajoutez ici le code pour afficher le contenu de votre widget.
        
        echo '<div class="salle-de-sport">';
        $nom = esc_html(get_post_meta(get_the_ID(), 'nom', true)); // get_post_meta récupère les informations de la salle de sport dans la base de données 
        $capacite = esc_html(get_post_meta(get_the_ID(), 'capacite', true));
        $adresse = esc_html(get_post_meta(get_the_ID(), 'adresse', true));
        $prix = esc_html(get_post_meta(get_the_ID(), 'prix', true));
        
        echo '<h2>' . $nom . '</h2>';
        echo '<p>Capacité : ' . $capacite . '</p>';
        echo '<p>Adresse : ' . $adresse . '</p>';
        echo '<p>Prix : ' . $prix . ' €</p>';
        echo '</div>';

        echo $args['after_widget']; // fermeture de la zone html du widget 
    }


}

function enregistrer_custom_post_type_salle_de_sport() {
    $labels = array(
        'name' => 'Salles de sport', // nom au pluriel
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

// enregistrement du widget

function enregistrer_salle_de_sport_widget() {
    register_widget('SalleDeSport_Widget');
}

add_action('widgets_init', 'enregistrer_salle_de_sport_widget');

function afficher_tableau_salles_de_sport() {
    $args = array(
        'post_type' => 'salle_de_sport', // Le type de publication personnalisé enregistré
        'posts_per_page' => -1, // Pour afficher toutes les salles
    );

    $salles = new WP_Query($args);

    if ($salles->have_posts()) { // vérifie si des salles de sports on été trouvées
        $output = '<table>'; // indique le début d'un tableau
        $output .= '<tr><th>Nom</th><th>Capacité</th><th>Adresse</th><th>Prix</th></tr>'; // ajoute la structure du tableau

        while ($salles->have_posts()) { //  Cette ligne commence une boucle qui s'exécute tant qu'il y a des salles de sport à traiter
            $salles->the_post(); // Cette ligne fait avancer la boucle en passant à l'article de salle de sport suivant dans la liste.
            $nom = get_post_meta(get_the_ID(), 'nom', true); // extraction des données
            $capacite = get_post_meta(get_the_ID(), 'capacite', true);
            $adresse = get_post_meta(get_the_ID(), 'adresse', true);
            $prix = get_post_meta(get_the_ID(), 'prix', true);

            $output .= '<tr>';
            $output .= '<td>' . esc_html($nom) . '</td>';
            $output .= '<td>' . esc_html($capacite) . '</td>';
            $output .= '<td>' . esc_html($adresse) . '</td>';
            $output .= '<td>' . esc_html($prix) . ' €</td>';
            $output .= '</tr>';
        }

        $output .= '</table>'; // indique la fin du tableau
    } else {
        $output = 'Aucune salle de sport trouvée.';
    }

    wp_reset_postdata(); // Cette ligne assure que la boucle principale de WordPress n'est pas perturbée par la boucle personnalisée que vous avez créée pour extraire les données des salles de sport

    return $output;
}

add_shortcode('tableau_salles_de_sport', 'afficher_tableau_salles_de_sport'); // Cette ligne enregistre un shortcode personnalisé appelé tableau_salles_de_sport. Lorsque ce shortcode est utilisé dans un article ou une page WordPress, il sera remplacé par le contenu généré par la fonction afficher_tableau_salles_de_sport. Par exemple, si vous ajoutez [tableau_salles_de_sport] dans le contenu d'une page, il affichera le tableau des salles de sport que vous avez généré avec la fonction afficher_tableau_salles_de_sport.