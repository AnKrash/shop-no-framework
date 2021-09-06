<?php

class Book extends Product
{
    protected $weight;

    public function prepare(array $data)
    {
        parent::prepare($data);
        $this->weight = $data['weight'];
    }

    public function toArray(): array
    {
        $arrParent = parent::toArray();
        $arr = array_merge($arrParent, ['weight' => $this->weight]);
        return $arr;

    }

    public function toIndexArray(): array
    {
        $parentArr = parent::toIndexArray();

        $parentArr['weight'] = 'Weight: ' . $this->weight . " KG";
        return $parentArr;
    }
}