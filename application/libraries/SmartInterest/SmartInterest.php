<?php

    /**
     * Class SmartInterest
     */
    class SmartInterest
    {
        private $Interests;
        private $Index;

        /**
         * SmartInterest constructor.
         * @param $Interests
         */
        public function SmartInterest($Interests = [])
        {
            $this->Interests = $this->Sort($Interests);
            $this->Index = 0;
        }

        public function s()
        {
            return $this->Interests;
        }

        private function Sort($Interests)
        {
            if(!is_null($Interests))
            {
                $Sort = [];
                foreach ($Interests as $Interest)
                {
                    $Sort[$Interest->MES - 1][] = $Interest;
                }
                return $Sort;
            }
        }

        public function GetInterest($Month)
        {
            if($this->HasInterest($Month))
            {
                return $this->Interests[$Month - 1];
            }
            else
            {
                return null;
            }
        }

        public function Row($data)
        {
            extract($data);
            /**
             * @var $value
             * @var $concept
             * @var $month
             * @var $period
             * @var $status
             * @var DateTime $date1
             * @var DateTime $date2
             * @var $action
             */
            if(!isset($concept))
            {
                $concept = 'INTERESES DE ' . round($date1->format('d')) . '-' . MesNombreAbreviado($date1->format('m')) . '-' . $date1->format('Y') .
                    ' A ' . round($date2->format('d')) . '-' . MesNombreAbreviado($date2->format('m')) . '-' . $date2->format('Y');
            }

            if(isset($action) && $action == true)
            {
                if($status == 1)
                {
                    $action = '<td style="text-align:center;"><input type="checkbox" checked disabled></td>';
                }
                else
                {
                    $action = "<td style=\"text-align:center;\"><input type=\"checkbox\"></td>";
                }
            }
            else
            {
                $action = '';
            }
            switch ($status)
            {
                case 1:
                    $status = "<td style=\"text-align:center;background: #1B7E5A;\"><span style=\"font-weight: bold;color:white;\">Pagado</span></td>";
                    break;
                case 2:
                    $status = "<td style=\"text-align:center;background: #0062cc;\"><span style=\"font-weight: bold;color:white;\">Sin pagar</span></td>";
                    break;
                case 3:
                    $status = "<td style=\"text-align:center;background: #c10000;\"><span style=\"font-weight: bold;color:white;\">En mora</span></td>";
                    break;
            }
            $period = isset($period) ? $period : '';
            return "<tr data-mes='$month' data-periodo='$period'>
           <td style='text-align: center;'>" . ++$this->Index . "</td>
           <td style='text-align: center;'>" . number_format($value, 0, '', ',') . "</td>
           <td style='text-align: center;' spellcheck=\"false\" contenteditable=\"true\">$concept</td>
           $status$action</tr>";
        }

        public function HasInterest($Month)
        {
            return isset($this->Interests[$Month - 1]);
        }

        public function HasPeriod($Month)
        {
            if(isset($this->Interests[$Month - 1]))
            {
                return $this->Interests[$Month - 1];
            }
            else
            {
                return false;
            }
        }

        /**
         * @param DateTime $pivot
         * @param DateTime $actual
         */
        public function HasDue($pivot, $actual)
        {
            $pivot->diff($actual)->invert > 0;
        }
    }