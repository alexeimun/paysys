<?php if(!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}
    function Telefono($tel)
    {
        if(strlen($tel) == 7)
        {
            return substr($tel, 0, 3) . ' ' . substr($tel, 3, 2). ' ' . substr($tel, 5, 5 + strlen($tel) - 5);
        }
        else
        {
            return $tel;
        }
    }