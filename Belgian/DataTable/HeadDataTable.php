<?php 

namespace Belgian\DataTable;

use Belgian\Element\CreateElement;
use Belgian\Element\IGetElement;


class HeadDataTable implements IGetElement
{
    private $e;
    
    public function __construct($data, array $attr = array())
    {
        $this->e = new CreateElement('th');
        $this->e->addInnerText($data);

        if(count($attr))
        {
            foreach ($attr as $key => $value)
            {
                $this->e->setAttribute($key, $value);
            }
        }


    }


    public function getElement()
    {
        return $this->e->getElement();
    } 

    
}    

