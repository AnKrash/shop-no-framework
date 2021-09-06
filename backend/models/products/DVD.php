<?php

class DVD extends Product
{
    protected $size;

    public function prepare(array $data)
    {
        parent::prepare($data);
        $this->size = $data['size'];
    }

    public function toArray(): array
    {
        $arrParent = parent::toArray();
        $arrParent['size'] = $this->size;

        return $arrParent;


    }

    public function toIndexArray(): array
    {
        $parentArr = parent::toIndexArray();
        $parentArr['size'] = 'Size: ' . $this->size . ' MB';
        return $parentArr;
    }
}
