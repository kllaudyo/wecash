<?php

    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 11/06/17
     * Time: 20:12
     */

    class U
    {
        public static function debug($resource)
        {
            print "<pre>";
            print_r($resource);
            print "</pre>";
        }

        public static function server()
        {
            self::debug($_SERVER);
        }

        public static function get()
        {
            self::debug($_GET);
        }

        public static function post()
        {
            self::debug($_POST);
        }

        public static function session()
        {
            self::debug($_SESSION);
        }

        public static function cookie()
        {
            self::debug($_COOKIE);
        }

    }