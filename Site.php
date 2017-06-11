<?php

    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 11/06/17
     * Time: 20:17
     */
    class Site
    {
        public static function pagina_atual()
        {
            return $_SERVER["PHP_SELF"];
        }

        public static function navbar_active($pagina, $link)
        {
            if(strcasecmp(trim($pagina), trim($link)) == 0){
                return "active";
            }
            return "";
        }

        public static function navbar_current($pagina, $link)
        {
            if(strcasecmp(trim($pagina), trim($link)) == 0){
                return "<span class=\"sr-only\">(current)</span>";
            }
            return "";
        }

    }