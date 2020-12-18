<?php
/**
 * @package Azar Plugin
 * @version 1.0.0
 */
namespace Inc;

 class Deactivate
 {
     public static function deactivate(){
         flush_rewrite_rules();
     }
 }