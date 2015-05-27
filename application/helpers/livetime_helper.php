<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    function Fecha($date)
    {
        #########Ajuste de horas según la zona horaria
        $ajustehora = 0;
        #########
        $fecha = strtotime($date);
        $ahora = strtotime(date('Y-m-d H:i:s')) - $ajustehora * 3600;
        $diff = $ahora - $fecha;
        $DIA = 86400 + 15000;
        if ($diff < 6)
        {
            $momento = 'hace un segundo';
        }
        else if ($diff < 30)
        {
            $momento = 'hace 5 segundos';
        }
        else if ($diff < 60)
        {
            $momento = 'hace 30 segundos';
        }
        else if ($diff < 180)
        {
            $momento = 'hace un minuto';
        }
        else if ($diff < 300)
        {
            $momento = 'hace 3 minutos';
        }
        else if ($diff < 420)
        {
            $momento = 'hace 5 minutos';
        }
        else if ($diff < 600)
        {
            $momento = 'hace 7 minutos';
        }
        else if ($diff < 1200)
        {
            $momento = 'hace 10 minutos';
        }
        else if ($diff < 1800)
        {
            $momento = 'hace 20 minutos';
        }
        else if ($diff < 2400)
        {
            $momento = 'hace 30 minutos';
        }
        else if ($diff < 3000)
        {
            $momento = 'hace 40 minutos';
        }
        else if ($diff < 3600)
        {
            $momento = 'hace 50 minutos';
        }
        else if ($diff < 7200)
        {
            $momento = 'hace una hora';
        }
        else if ($diff < 10800)
        {
            $momento = 'hace 2 horas';
        }
        else if ($diff < 14400)
        {
            $momento = 'hace 3 horas';
        }
        else if ($diff < 18000)
        {
            $momento = 'hace 4 horas';
        }
        else if ($diff < 21600)
        {
            $momento = 'hace 5 horas';
        }
        else if ($diff < 25200)
        {
            $momento = 'hace 6 horas';
        }
        else if (date('d') == date_format(new DateTime($date), 'd') && date('m') == date_format(new DateTime($date), 'm') && date('Y') == date_format(new DateTime($date), 'Y'))
        {
            $momento = 'Hoy, ' . round(date('h',$fecha)) . date(':i a', $fecha);
        }
        else if ($diff < $DIA)
        {
            $momento = 'Ayer, ' . round(date('h',$fecha)) . date(':i a', $fecha);
        }
        else if ($diff < $DIA * 2)
        {
            $momento = 'hace 2 días';
        }
        else if ($diff < $DIA * 3)
        {
            $momento = 'hace 3 días';
        }
        else if ($diff < $DIA * 4)
        {
            $momento = 'hace 4 días';
        }
        else if ($diff < $DIA * 5)
        {
            $momento = 'hace 5 días';
        }
        else if ($diff < $DIA * 6)
        {
            $momento = 'hace 6 días';
        }
        else if ($diff < $DIA * 14)
        {
            $momento = 'hace una semana';
        }
        else if ($diff < $DIA * 22)
        {
            $momento = 'hace 2 semanas';
        }
        else if ($diff < $DIA * 28)
        {
            $momento = 'hace 3 semanas';
        }
        else if ($diff >= $DIA * 28 && $diff <= $DIA * 40)
        {
            $momento = 'hace un mes';
        }
        else if ($diff >= $DIA * 28 && date('Y') == date_format(new DateTime($date), 'Y'))
        {
            $momento = date_format(new DateTime($date), 'd') . ' de ' . MesNombre(round(date_format(new DateTime($date), 'm')));
        }
        else $momento = date_format(new DateTime($date), 'd/m/Y');
        return $momento;
    }

    function MesNombre($Mes)
    {
        $Meses = [1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'];
        return $Meses[$Mes];
    }

    function MesNombreAbr($Mes)
    {
        $Meses = [1 => 'Ene', 2 => 'Feb', 3 => 'Mar', 4 => 'Abr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Ago', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dic'];
        return $Meses[$Mes];
    }