<?php

if (!function_exists('SpaceToHyphen')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function SpaceToHyphen($title)
    {
        return str_replace(' ', '-', $title);
    }
}
