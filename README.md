WP-Manoz-text-widget
====================

Le widget de texte de base de Wordpress ne me plaisait pas. J'en ai donc fabriqué un.
Je me suis rendu compte de la chose avec un client qui voulait absolument un thème chez *themeforest*.

Nous avons donc acheté le thème en question et personnalisé les 3/4 des éléments. Le seul problème venait des widgets de texte dans lequel on mettait du contenu html. La personnalisation des classes était chiante et peu intéressante. C'est pour ça que j'ai décidé de créer ce widget.

Voici comment il fonctionne
---------------------------

**Installation :** il s'installe comme un plugin classique. Vous le mettez dans votre dossier `wp-content\plugins` et vous l'activez ensuite dans `Apparence\Widgets` de votre admin pannel.

Il fonctionne comme un widget classique de wordpress. On le charge en lui donnant un nom (entre autre) avec la `function load_manoz_txt_widget()`.
Le reste du contenu est le contenu classique d'un widget de Wordpress. Je vous invite à vous rendre sur leur Wiki pour en savoir plus.

À noter que l'id css principal (le container en fait) du widget est ajoutée à la ligne 36 : `echo '<div id="mnz-txt-container">';`. Vous pouvez la changer en la remplaçant par celle de votre thème, tout simplement.
Nous avons ensuite une classe à l'intérieur qui est la classe par défaut des widgets de Wordpress si ma mémoire est bonne : `<div class="textwidget"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>`.

Et c'est tout. À vous de l'utiliser comme bon vous semble :)