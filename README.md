![alt text](imgs_git/targetlogohero.svg?raw=true)

# TargetWebKitchen

Bonjour l'équipe de TargetWeb ! 
C'est avec plaisir que j'ai répondu à votre invitation pour réaliser ce petit exercice de développement de thème Wordpress. J'espère qu'il vous plaira autant que j'ai pris plaisir à le faire.
Le processus de création et le développement sont disponibles à la suite de ce Readme, que je vous invite à lire.

Je vous souhaite une bonne lecture, une bonne découverte et à bientôt j'espère.

Maxime Eloir


*Too long to read ? Voici un résumé de mon travail*

Mercredi : 
- Définition du client
- Recherche de design
- Maquettage
- Codage de la page recettes

Jeudi : 
- Codage page accueil
- Gestion de la search bar

Vendredi :
- Gestion du responsive
- Création du README
- Ajout de fonctions annexes (Plugins requis, animations du menu)


## Le projet

Le projet est la réalisation d'un site de recettes de cuisine intégrant deux pages :
- Une home-page avec visualisation des dernières recettes créées
- une page pour la recette avec tout ce qu'il faut pour mener à bien cette dite recette : ingrédients, durée, coût, étape, etc.

Afin de définir un client potentiel, je suis simplement parti de mon cas personnel et me suis dit :

*" Je cuisine dorénavant des plats plus légers, je veux partager mes recettes, comment je le fais et pourquoi je le fais ?"***

Bien évidemment, je suis allé sur de nombreux sites Internet de cuisine afin d'identifier les récurrences sur les pages de recette : mise en page des ingrédients, des étapes, des ustensiles demandées...

Je veux : 
- Une navigation simple
- Un design épuré qui va bien avec mes recettes
- Une recherche rapide de mes recettes
- Me faciliter la vie avec les ustensiles, je veux juste les sélectionner sur toutes mes recettes et ne pas avoir à les rentrer à chaque fois sur ma page
- Voir les ingrédients
- Pouvoir surligner ou barrer les étapes au fur et à mesure

Nous sommes sur des envies basiques certes, mais ça m'a déjà permis de savoir ce que je voulais ou non, en visitant les sites de cuisine, très vite nous sommes submergés par des informations de partout, je n'avais pas envie de ça. D'autant plus que je voulais être le plus clair pour vous présenter le projet !


 ** Je parle de plats plus "légers", mais les plats que vous trouverez sur le site proviennent principalement de Marmiton, donc pour le coté "léger", on repassera je pense.

## Le visuel

Vous pouvez visualiser la maquette [ICI](https://www.figma.com/proto/1dYtn5LeK5Vjc79NZZL4lW/TargetKitchen?node-id=104%3A285&scaling=min-zoom&page-id=0%3A1)

J'ai utilisé une grille bootstrap pour la flexibilité que je pourrais avoir avec le responsive lors du développement.
J'ai choisi des tons clairs et sobres, gardant le noir pour contraster avec le doré que j'ai utilisé un peu partout.
J'ai utilisé la MontSerrat pour le texte de labeur et la PermanentMarker pour le titrage du logo.


Très rapidement j'ai voulu un logo amusant : cela permet d'avoir une identité propre et également de pouvoir éviter de tomber dans les clichés des polices à empattement pour faire chic.


Aussi, dans l'optique de lancer un véritable site, j'ai ajouté les menus et les réseaux sociaux. Tous les basiques pour un développement sur le long terme réussi !

## Les étapes de développement

Venons en au fait ! 
Après avoir mangé du pain fait maison, un avocat, un oeuf dur et du saucisson, il était temps de lancer le développement à proprement parler : 

Je suis parti d'un thème vide que j'ai créé pour mes besoins et que j'utilise tout le temps: il comprend de nombreuses optimisations et divisions de fichiers pour une meilleure compréhension. Le fichier functions.php pouvant très vite devenir incompréhensible, il est divisé en 4 morceaux.

Donc : 
- Installation de Wordpress
- Création du Custom Post Type des recettes (*Avec ce [lien](https://generatewp.com/post-type/) très utile) avec une catégorie "ustensiles"
- Installation de ACF, version pro (*J'ai eu l'opportunité de travailler avec la version pro, cela va me permettre dans le projet d'utiliser les repeteurs et surtout la page Options*)
- Création de mes custom fields que j'attribue à ma page d'accueil, à mon CPT recettes, à ma taxonomie catégorie et ustensile, et aussi à la page options qui me permet d'y mettre les informations fréquentes demandés par les clients. *Pour le coup, je l'utilise pour y mettre le logo, mon adresse mail, et mes réseaux sociaux.*
- Je remplis mes champs avec le contenu que j'ai mis dans figma
- Je crée un template pour la carte de recette qui s'affiche sur les deux pages pour éviter de dupliquer mon code.
- Je développe ma front-page assez classiquement en faisant mes appels à ACF, créant mes sections, mes colonnes, etc.
- Je développe ma page recette *avec une difficulté rencontrée : j'ai voulu récupérer les recettes de même catégorie et je me suis emmêlé les pinceaux à créer une fonction beaucoup trop compliqué pour ce que je souhaitais faire. En y revenant plus tard je me suis rendu compte de mon erreur et j'ai plus fortement simplifié le code.*
- Gestion du responsive pour les quelques problèmes qui pourraient être rencontrés (*Notamment avec le menu flottant des ingrédients qu'il fallait remettre en position initial pour les <992px* )

- Et voilà ! 



## Points d'amélioration
Si je devais sortir ce site Internet pour moi, mis à part l'ajout de pages annexes comme une page à propos ou une page de contact, je pense que j'y ajouterais un système de commentaires pour avoir un retour sur les recettes. Egalement, j'ai pensé le site comme étant très personnel, donc avec l'idée où pour chaque recette que je ferais, j'y associerais une vidéo, mais si c'était pour un client externe, je lui laisserais la possibilité de choisir entre une vidéo ou une -galerie- photo.

- Recherche par thématique
- Une page recette avec des filtres ?
- Un système de filtres en fonction de ce qu'on a dans le frigo ( Idée trouvée sur Marmiton ) 



## Installation

Ah ! Nous y sommes ! 
Le moment tant attendu ou je réussis à vous convaincre!
En suivant ce [lien](https://drive.google.com/drive/folders/1_xtfa5X89PtJoHEClwjKhdnSkVVzPTtS?usp=sharing), vous trouverez deux fichiers : 
- installer.php
- un_nom_super_long.zip

Ces deux fichiers ont été créés avec le plugin [duplicator](https://fr.wordpress.org/plugins/duplicator/), permettant de migrer facilement son projet.

#### Création d'un dossier
Si vous travaillez en local, 
Wamp : Créez un dossier dans votre www

Xampp : Créez un dossier dans votre htdocs


#### Copie de mes deux fichiers
Pas besoin de dézipper, mettez simplement les deux fichiers installer et un_nom_super_long.zip dans le dossier que vous avez créé

#### Naviguez vers l'installer
Vous n'avez plus qu'à aller sur votre navigateur et de taper "localhost/NOM_DE_DOSSIER/installer.php".
L'installation va se lancer, et vous demandera de vous connecter à votre BDD, de créer une table ou d'en utiliser une existante, et voilà!.

Vous avez mon wordpress installé, avec les plugins déjà installés, mes textes, mes images et mes vidéos.


Cependant, si cela ne marchait pas,  vous trouverez également ma base de données [ICI](https://drive.google.com/file/d/1CE-Ss2iRpGxxk8wzxB-SgdHeOSs5TbTx/view?usp=sharing).

Voici également les extensions utilisées : 

-Wordpress 5.8.2

-Advanced Custom Fields PRO 5.10.2 (*J'ai mis ce plugin comme étant requis par mon thème pour fonctionner, il ira chercher directement l'archive dans le dossier plugin du theme*)

-Newsletter, SMTP, Email marketing and Subscribe forms by Sendinblue 3.1.24

-Safe SVG 1.9.9

-WebP Converter for Media 

-Convert WebP & Optimize Images 3.2.3


## Conclusion

J'ai vraiment pris plaisir à coder ce site. Cela m'a permis de me forcer à penser, à agir rapidement et à me faire confiance sur les choix pris.

Quand j'étais entrepreneur, ma plus grande crainte était de réussir à créer un visuel convaincant, aussi bien en print que en web. Et ça reste le cas encore maintenant ! J'ai plus confiance en mes compétences et en mes prises de décision, mais il existe toujours ce stress de savoir si le design proposé va plaire ou non.

Je vous remercie de m'avoir donné cette opportunité.
