<?php
/* $Id: select_lang.lib.php,v 1.92.2.1 2003/09/01 14:51:52 nijel Exp $ */
// vim: expandtab sw=4 ts=4 sts=4:


/**
 * phpMyAdmin Language Loading File
 */



if (!defined('PMA_SELECT_LANG_LIB_INCLUDED')) {
    define('PMA_SELECT_LANG_LIB_INCLUDED', 1);

    /**
     * Define the path to the translations directory and get some variables
     * from system arrays if 'register_globals' is set to 'off'
     */
    $lang_path = 'lang/';


    /**
     * All the supported languages have to be listed in the array below.
     * 1. The key must be the "official" ISO 639 language code and, if required,
     *    the dialect code. It can also contain some informations about the
     *    charset (see the Russian case).
     * 2. The first of the values associated to the key is used in a regular
     *    expression to find some keywords corresponding to the language inside two
     *    environment variables.
     *    These values contains:
     *    - the "official" ISO language code and, if required, the dialect code
     *      also ('bu' for Bulgarian, 'fr([-_][[:alpha:]]{2})?' for all French
     *      dialects, 'zh[-_]tw' for Chinese traditional...);
     *    - the '|' character (it means 'OR');
     *    - the full language name.
     * 3. The second values associated to the key is the name of the file to load
     *    without the 'inc.php' extension.
     * 4. The last values associated to the key is the language code as defined by
     *    the RFC1766.
     *
     * Beware that the sorting order (first values associated to keys by
     * alphabetical reverse order in the array) is important: 'zh-tw' (chinese
     * traditional) must be detected before 'zh' (chinese simplified) for
     * example.
     *
     * When there are more than one charset for a language, we put the -utf-8
     * first.
     *
     * For Russian, we put 1251 first, because MSIE does not accept 866
     * and users would not see anything.
     */
    $available_languages = array(
        'en-iso-8859-1'=> array('en([-_][[:alpha:]]{2})?|english',  'english-iso-8859-1', 'en'),
        'pt-br-iso-8859-1' => array('pt[-_]br|brazilian portuguese', 'brazilian_portuguese-iso-8859-1', 'pt-BR')
    );


    if (!defined('PMA_IS_LANG_DETECT_FUNCTION')) {
        define('PMA_IS_LANG_DETECT_FUNCTION', 1);

        /**
         * Analyzes some PHP environment variables to find the most probable language
         * that should be used
         *
         * @param   string   string to analyze
         * @param   integer  type of the PHP environment variable which value is $str
         *
         * @global  array    the list of available translations
         * @global  string   the retained translation keyword
         *
         * @access  private
         */
        function PMA_langDetect($str = '', $envType = '')
        {
            global $available_languages;
            global $lang;

            reset($available_languages);
            while (list($key, $value) = each($available_languages)) {
                // $envType =  1 for the 'HTTP_ACCEPT_LANGUAGE' environment variable,
                //             2 for the 'HTTP_USER_AGENT' one
                if (($envType == 1 && eregi('^(' . $value[0] . ')(;q=[0-9]\\.[0-9])?$', $str))
                    || ($envType == 2 && eregi('(\(|\[|;[[:space:]])(' . $value[0] . ')(;|\]|\))', $str))) {
                    $lang     = $key;
                    break;
                }
            }
        } // end of the 'PMA_langDetect()' function

    } // end if


    /**
     * Get some global variables if 'register_globals' is set to 'off'
     * loic1 - 2001/25/11: use the new globals arrays defined with php 4.1+
     */
    if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        $HTTP_ACCEPT_LANGUAGE = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    }
    else if (!empty($HTTP_SERVER_VARS['HTTP_ACCEPT_LANGUAGE'])) {
        $HTTP_ACCEPT_LANGUAGE = $HTTP_SERVER_VARS['HTTP_ACCEPT_LANGUAGE'];
    }

    if (!empty($_SERVER['HTTP_USER_AGENT'])) {
        $HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
    }
    else if (!empty($HTTP_SERVER_VARS['HTTP_USER_AGENT'])) {
        $HTTP_USER_AGENT = $HTTP_SERVER_VARS['HTTP_USER_AGENT'];
    }

    if (!isset($lang)) {
        if (isset($_GET) && !empty($_GET['lang'])) {
            $lang = $_GET['lang'];
        }
        else if (isset($HTTP_GET_VARS) && !empty($HTTP_GET_VARS['lang'])) {
            $lang = $HTTP_GET_VARS['lang'];
        }
        else if (isset($_POST) && !empty($_POST['lang'])) {
            $lang = $_POST['lang'];
        }
        else if (isset($HTTP_POST_VARS) && !empty($HTTP_POST_VARS['lang'])) {
            $lang = $HTTP_POST_VARS['lang'];
        }
        else if (isset($_COOKIE) && !empty($_COOKIE['lang'])) {
            $lang = $_COOKIE['lang'];
        }
        else if (isset($HTTP_COOKIE_VARS) && !empty($HTTP_COOKIE_VARS['lang'])) {
            $lang = $HTTP_COOKIE_VARS['lang'];
        }
    }


    /**
     * Do the work!
     */

    // compatibility with config.inc.php <= v1.80
    if (!isset($cfg['Lang']) && isset($cfgLang)) {
        $cfg['Lang']        = $cfgLang;
        unset($cfgLang);
    }
    if (!isset($cfg['DefaultLang']) && isset($cfgDefaultLang)) {
        $cfg['DefaultLang'] = $cfgDefaultLang;
        unset($cfgLang);
    }

    // Disable UTF-8 if $cfg['AllowAnywhereRecoding'] has been set to FALSE.
    if (!isset($cfg['AllowAnywhereRecoding']) || !$cfg['AllowAnywhereRecoding']) {
        $available_language_files               = $available_languages;
        $available_languages                    = array();
        while (list($tmp_lang, $tmp_lang_data) = each($available_language_files)) {
            if (substr($tmp_lang, -5) != 'utf-8') {
                $available_languages[$tmp_lang] = $tmp_lang_data;
            }
        } // end while
        unset($tmp_lang);
        unset($tmp_lang_data);
        unset($available_language_files);
    } // end if

    // Lang forced
    if (!empty($cfg['Lang'])) {
        $lang = $cfg['Lang'];
    }

    // If '$lang' is defined, ensure this is a valid translation
    if (!empty($lang) && empty($available_languages[$lang])) {
        $lang = '';
    }

    // Language is not defined yet :
    // 1. try to findout user's language by checking its HTTP_ACCEPT_LANGUAGE
    //    variable
    if (empty($lang) && !empty($HTTP_ACCEPT_LANGUAGE)) {
        $accepted    = explode(',', $HTTP_ACCEPT_LANGUAGE);
        $acceptedCnt = count($accepted);
        reset($accepted);
        for ($i = 0; $i < $acceptedCnt && empty($lang); $i++) {
            PMA_langDetect($accepted[$i], 1);
        }
    }
    // 2. try to findout user's language by checking its HTTP_USER_AGENT variable
    if (empty($lang) && !empty($HTTP_USER_AGENT)) {
        PMA_langDetect($HTTP_USER_AGENT, 2);
    }

    // 3. Didn't catch any valid lang : we use the default settings
    if (empty($lang)) {
        $lang = $cfg['DefaultLang'];
    }

    // 4. Checks whether charset recoding should be allowed or not
    $allow_recoding = FALSE; // Default fallback value
    if (!isset($convcharset) || empty($convcharset)) {
        $convcharset = $cfg['DefaultCharset'];
    }

    // 5. Defines the associated filename and load the translation
    $lang_file = $lang_path . $available_languages[$lang][1] . '.inc.php';
    include('./' . $lang_file);

} // $__PMA_SELECT_LANG_LIB__
?>
