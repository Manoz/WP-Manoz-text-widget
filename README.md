WP-Manoz-text-widget
====================

English
-------

*French see below*

I didn't liked the Wordpress base text widget. I decided to make my own.
I realized the thing with a client who insisted on a *ThemeForest* theme.

We bought the theme and personalized 3/4 elements. The only problem was the widgets text in which we put the html content. Customization class was boring and uninteresting. That's why I decided to create this widget.

### Here's how it works

**Installation :** Install it like a conventional plugin. You put in your `wp-content \ plugins` and then you turn in `Appearance \ Widgets` your admin pannel.

It works like a regular wordpress widget. We care by giving it a name (among others) with the `load_manoz_txt_widget function ()`.
The rest of the content is the content of a classic WP Widget. I invite you to visit their wiki for more information.

Note that the main css id (the container actually) the widget is added to the line 36: `echo '<div id="mnz-txt-container">'`. You can change it by replacing it with that of your theme, simply.
Then we have a class within the class which is the default WordPress widgets if my memory is correct: `<div class="textwidget"> <php echo empty ($ instance ['filter'])? wpautop ($ text): $ text;> </ div> `?.

And that's all folks! Use it as you wish :)

French
------

Le widget de texte de base de Wordpress ne me plaisait pas. J'en ai donc fabriqué un.
Je me suis rendu compte de la chose avec un client qui voulait absolument un thème chez *themeforest*.

Nous avons donc acheté le thème en question et personnalisé les 3/4 des éléments. Le seul problème venait des widgets de texte dans lequel on mettait du contenu html. La personnalisation des classes était chiante et peu intéressante. C'est pour ça que j'ai décidé de créer ce widget.

### Voici comment il fonctionne

**Installation :** il s'installe comme un plugin classique. Vous le mettez dans votre dossier `wp-content\plugins` et vous l'activez ensuite dans `Apparence\Widgets` de votre admin pannel.

Il fonctionne comme un widget classique de wordpress. On le charge en lui donnant un nom (entre autre) avec la `function load_manoz_txt_widget()`.
Le reste du contenu est le contenu classique d'un widget de Wordpress. Je vous invite à vous rendre sur leur Wiki pour en savoir plus.

À noter que l'id css principal (le container en fait) du widget est ajoutée à la ligne 36 : `echo '<div id="mnz-txt-container">';`. Vous pouvez la changer en la remplaçant par celle de votre thème, tout simplement.
Nous avons ensuite une classe à l'intérieur qui est la classe par défaut des widgets de Wordpress si ma mémoire est bonne : `<div class="textwidget"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>`.

Et c'est tout. À vous de l'utiliser comme bon vous semble :)
