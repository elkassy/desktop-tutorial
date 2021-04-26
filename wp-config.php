<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'FWCV+`Yf#)ebFD|2W9;>2DUN=I77}9.@F?Hs?<Ek*^tK[GO:+LF+>&n8DmP3vQ4l' );
define( 'SECURE_AUTH_KEY',  ':f0InqEuFLz>,9hEl2ahw,c(&^-Q#mW*-?q?:OBLo$5Rq*v.rP1<~[8aU]F5SBlZ' );
define( 'LOGGED_IN_KEY',    'V9;4r,p&Sgv#u8QINwkBao3.RB_y-|nRj~u8+]z<LeuFb4Xz8xBu/nMx+tmpXLb1' );
define( 'NONCE_KEY',        'd$nZ|Berj!X`76.z3f[echVZJ}jDr5K,b%Nv15Ba?]r;^{P,YgTJgb%;`]Ehy-CS' );
define( 'AUTH_SALT',        '$sv>% ~nm-Ag7f^o.nf:XCA+cf}55G|uga<f%8%(N1n6=tC6I7/g.%6?XF9`/v5^' );
define( 'SECURE_AUTH_SALT', 'EbBT0,u6=)d]$IRpO43cYZ6@^&og75u|&I]G?&G%DeK0O2ISnhQQQZZ[j69v4BcJ' );
define( 'LOGGED_IN_SALT',   'AH2 ]1I{k[T$:0DtZtR.ISFhU4!>[qL!K]22 T{AS.tP{f;;3-UBu%sp6. (RI %' );
define( 'NONCE_SALT',       'QPGfue]VU{z6cg~Qui*i5jw+$hfh2Pn8tfWQa;OHr#N:(vx%D>FMkgY,xU(|*;C<' );
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
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
