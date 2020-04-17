<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sidebar extends Model
{
    public static function icons()
    {
        $icons = Sidebar::getIcons();
        $links = Sidebar::getLinks();
        $html = array();
        $count = 0;
        foreach($icons as $icon){
            array_push($html, '<li><a href="'.$links[$count].'"><i class="'.$icon.'"></i></a></li>');
            $count++;
        }
        return $html;
    }
    public static function texts()
    {
        $texts = Sidebar::getTexts();
        $links = Sidebar::getLinks();
        $html = array();
        $count = 0;
        foreach($texts as $text){
            array_push($html, '<li><a href="'.$links[$count].'"><i>'.$text.'</i></a></li>');
            $count++;
        }
        return $html;
    }
    public static function getIcons()
    {
        $icons = [
            'fa fa-home',
            'fa fa-user',
            'fas fa-project-diagram',
            'fa fa-calendar',
            'fa fa-tasks',
            'fa fa-envelope',
            'fa fa-stream'
        ];
        return $icons;
    }
    public static function getTexts()
    {
        $texts = [
            'Dashboard',
            'List User',
            'List Project',
            'Daily Report',
            'Command Center',
            'Developer Request',
            'Project Timeline'
        ];
        return $texts;
    }
    public static function getLinks()
    {
        $links = [
            '/',
            '/listuser',
            '/listproject',
            '/calendar',
            '/commandcenter',
            '/list_dev_request',
            'list_dev_request',
        ];
        return $links;
    }
}
