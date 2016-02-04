<?php

    class Component
    {
        public static function Table(array $params)
        {
            extract($params);
            /**
             * @var array $columns
             * @var array $fields
             * @var array $dataProvider
             * @var string $actions
             * @var string $align
             * @var string $tableName
             * @var bool $autoNumeric
             * @var string $id
             * @var string $controller
             * @var integer $limitCell
             */

            $limitCell = isset($limitCell) ? $limitCell : 60;
            $align = isset($align) ? $align : 'left';
            $actions = isset($actions) ? $actions : '';
            $controller = isset($controller) ? $controller : '';
            $autoNumeric = isset($autoNumeric) ? $autoNumeric : false;
            if(!is_array($actions))
            {
                $view = strrchr($actions, 'v');
                $update = strrchr($actions, 'u');
                $delete = strrchr($actions, 'd');
                $print = strrchr($actions, 'p');
                $check = strrchr($actions, 'c');
                $radio = strrchr($actions, 'r');
                $action = $delete || $update || $view || $print || $check || $radio;
            }
            else
            {
                $action = is_array($actions);
            }

            $table = '<table id="tabla" style="text-align:' . $align . '" data-name="' . $tableName . '" class="table table-bordered table-striped"><thead><tr>';
            if($autoNumeric)
            {
                $c = 0;
                $table .= '<th style="width: 20px;">#</th>';
            }
            foreach ($columns as $columnName => $value)
            {
                if(!is_numeric($columnName))
                {
                    $table .= '<th style="' . (isset($value['style']) ? $value['style'] : '') . ';text-align:' . $align . '">' . $columnName . '</th>';
                }
                else
                {
                    $table .= '<th style="text-align:' . $align . '">' . $value . '</th>';
                }
            }
            if($action)
            {
                $table .= '<th style="">Acciones</th>';
            }
            $table .= '</tr></thead><tbody>';

            foreach ($dataProvider as $data)
            {
                $table .= '<tr>';
                if($autoNumeric)
                {
                    $table .= '<td>' . (++$c) . '</td>';
                }
                foreach ($fields as $key => $value)
                {
                    if(!is_numeric($key))
                    {
                        if(is_array($value))
                        {
                            switch ($value['type'])
                            {
                                case 'img':
                                    #Represents a image
                                    $table .= '<td><img class="img-circle" style="height: 25px;width: 25px;" src="' . $value['path'] . '/' . $data[$key] . '"></td>';
                                    break;
                            }
                        }
                        else
                        {
                            switch ($value)
                            {
                                #Represents a moment helper
                                case 'moment':
                                    $table .= '<td>' . Momento($data[$key]) . '</td>';
                                    break;
                                #Represents a date with the helper
                                case 'date':
                                    $table .= '<td>' . date_format(new DateTime($data[$key]), 'd/m/Y') . '</td>';
                                    break;
                                #Represents a number format
                                case 'numeric':
                                    $table .= '<td>' . number_format($data[$key], 0, '', ',') . '</td>';
                                    break;
                                #Represents a phone number
                                case 'phone':
                                    $table .= '<td>' . Telefono($data[$key]) . '</td>';
                                    break;
                                #Periodo académico (Campo particular)
                                case 'periodo':
                                    $table .= '<td>' . date('Y-', strtotime($data[$key])) . (date('m', strtotime($data[$key])) > 6 ? 2 : 1) . '</td>';
                                    break;
                            }
                        }
                    }
                    else
                    {
                        $table .= '<td>' . ($data[$value] = strlen($data[$value]) > $limitCell ? substr($data[$value], 0, $limitCell) . '...' : $data[$value]) . '</td>';
                    }
                }

                if($action)
                {
                    $table .= '<td>';
                    if(!is_array($actions))
                    {
                        $kview = $controller . '/ver' . $tableName;
                        $kupdate = $controller . '/actualizar' . $tableName;
                        $kprint = $controller . '/imprimir' . $tableName;
                        $keys = '';

                        if(is_array($id))
                        {
                            foreach ($id as $ikey => $ids)
                            {
                                if(!is_numeric($ids))
                                {
                                    $keys .= '/' . $data[$ids];
                                }
                                else
                                {
                                    $keys .= '/' . $ids;
                                }
                            }
                        }
                        else
                        {
                            $keys .= '/' . $data[$id];
                        }
                        //var_dump($keys);exit;

                        if($view)
                        {
                            $table .= '<a href="' . site_url($kview . $keys) . '" style="font-size:20pt;color:  #29a84b" class="fa fa-eye" target="_blank" data-toggle="tooltip" title="Ver m&aacute;s..."></a>&nbsp;&nbsp;';
                        }
                        if($print)
                        {
                            $table .= '<a href="' . site_url($kprint . $keys) . '" style="font-size:20pt;color: black" target="_blank" class="fa fa-print" data-toggle="tooltip" title="Imprimir"></a>&nbsp;&nbsp;';
                        }
                        if($update)
                        {
                            $table .= '<a href="' . site_url($kupdate . $keys) . '"  target="_blank" style="font-size:20pt;color:  #0065c3" class="fa fa-pencil" data-toggle="tooltip" title="Editar"></a>&nbsp;&nbsp;';
                        }
                        if($delete)
                        {
                            $table .= "<a data-id='$data[$id]' style='color:#e54040;font-size:20pt;cursor: pointer' class='fa fa-trash-o' data-toggle='tooltip' title='Eliminar'></a>";
                        }
                        ###Check###
                        if($check)
                        {
                            $table .= "<input type='checkbox' value='" . $data[$id] . "' checked>";
                        }
                        ###Radio###
                        if($radio)
                        {
                            $table .= "<input type='radio' name='RADIO' value='" . $data[$id] . "' checked>";
                        }
                    }
                    else
                    {
                        ##items with custom actions
                        foreach ($actions as $item)
                        {
                            $title = $item['title'];
                            $icon = $item['icon'];
                            $idata = '';
                            #Searching for some data attribute
                            if(isset($item['data']))
                            {
                                foreach ($item['data'] as $subdata)
                                {
                                    $idata .= " data-" . $subdata['name'] . " = '" . str_replace('{index}', $data[$id], $subdata['value']) . "'";
                                }
                            }

                            if(!isset($item['url']) || empty($item['url']) || $item['url'] == 'none')
                            {
                                $url = '';
                            }
                            else
                            {
                                $url = "href='" . str_replace('{index}', $data[$id], $item['url']) . "'";
                            }
                            $table .= "<a $url $idata style='font-size:20pt;color:  #29a84b' class='$icon' data-toggle='tooltip' title='$title'></a>&nbsp;&nbsp;";
                        }
                    }
                    $table .= '</td>';
                }
                $table .= '</tr>';
            }
            $table .= '</tbody></table>';

            return $table;
        }

        public static function Dropdown(array $params)
        {
            extract($params);
            /**
             * @var array $dataProvider
             * @var string $name
             * @var string $placeholder
             * @var string $width
             * @var string $fields
             * @var string $index
             * @var bool $readonly
             * @var bool $simple
             */

            $frag = isset($simple) && $simple ? '' : '';
            $disable = '';
            $size = isset($width) ? $width : '100%';
            if(isset($readonly))
            {
                $frag = '';
                $disable = "disabled";
                $size = '100%';
            }
            $dropdown = "<select  name='$name' class='form-control $frag' $disable style='width:" . $size . ";'>";
            $dropdown .= "<option style='text-align: center;' value='0'>$placeholder</option>";
            $name = preg_replace('/\[|\]/', '', $name);
            foreach ($dataProvider as $data)
            {
                if(isset($index) && $index == $data[$name])
                {
                    $dropdown .= "<option value='$data[$name]' selected>";
                }
                else
                {
                    $dropdown .= "<option value='$data[$name]'>";
                }

                foreach ($fields as $key => $value)
                {
                    if(!is_numeric($key))
                    {
                        $dropdown .= $value;
                    }
                    else
                    {
                        $dropdown .= $data[$value];
                    }
                }
                $dropdown .= '</option>';
            }
            $dropdown .= '</select>';
            return $dropdown;
        }

        public static function Alert($params)
        {
            extract($params);

            /**
             * @var $title
             * @var $text
             * @var $icon
             * @var $type
             */

            $type = isset($type) ? $type : 'success';
            $text = isset($text) ? $text : '';
            $icon = isset($icon) ? $icon : 'fa fa-check';
            return "<div class='alert alert-$type'>
              	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              	<span class='$icon' style='font-size: 20pt'> </span><strong>$title</strong> $text
              </div>";
        }

        public static function Beginbox($params)
        {
            extract($params);

            /**
             * @var $title
             * @var $text
             * @var $type
             */
            return "<div class='row'>
                        <div class='col-lg-9'>
                            <div class='box box-solid bg-green-gradient'>
                                <div class='box-header'>
                                    <i class='fa fa-th'></i>
                                    <h3 class='box-title'>$title</h3>
                                    <div class='box-tools pull-right'>
                                        <button class='btn bg-green btn-sm' data-widget='collapse'><i class='fa fa-minus'></i></button>
                                        <button class='btn bg-green btn-sm' data-widget='remove'><i class='fa fa-times'></i></button>
                                    </div>
                                </div>
                                <div class='box-body border-radius-none'>";
        }

        public static function Endbox()
        {
            return " </div><!-- /.box-body -->
                                <div class='box-footer no-border'>
                                </div><!-- /.box-footer -->
                            </div><!-- /.box -->
                        </div>
                    </div>";
        }
    }