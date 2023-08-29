<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'w4school' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ' C3_3c=/2-3~4vOd4mR!fY< O~z9,.j^`M>D2S>*<:8P]eGcRtjw~`F:L ^c}4M;' );
define( 'SECURE_AUTH_KEY',  'e=,%SZO|V){!5T%4gfc~-GEsw-~fgu%/w<e,iUOvVEU=H}q$Mv[BAtP`DI-,b]]}' );
define( 'LOGGED_IN_KEY',    ' LT=90WI0<*VEHv#3V?e?Dt~Q-)`QQ8GFgAI8NqNA3Q-aIw`NQ:4?Skm3n &E/hZ' );
define( 'NONCE_KEY',        '^eQmIM=7zGB%,bJOax-z5-^rKY4bxUJFhdPIx))iC;O[s!X5^_LG~[)_I2S[}fDl' );
define( 'AUTH_SALT',        'j.|]NeU%Kg|-WI0eK<u$vysIO64Y@#5[NMJWe274Mg.W~l7O&( Lu7Qe{7 ^VqE#' );
define( 'SECURE_AUTH_SALT', 'TnZIZz_9m{}j%>A~s:^l-pP?#.?^`R0A/IVw$C%m1ict#(9A9*[IG3kO*{nyjOSX' );
define( 'LOGGED_IN_SALT',   'aD|?={5FqNn|5rF4g*>)*Y/FLug60A>pJ(u7x,BHBv;Z *@=Ms77bc=KPU+nv~{5' );
define( 'NONCE_SALT',       '6r^U/oH@g+kyi$-:NLGjO!*}!CO5vr3q0$~ M[^uC`4U=K)A>bN~WhaA~+W[x8`+' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
