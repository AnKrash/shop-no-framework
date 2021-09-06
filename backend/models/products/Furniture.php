<?php

class Furniture extends Product
{
    protected $height;
    protected $width;
    protected $length;

    public function prepare(array $data)
    {
        parent::prepare($data);
        $this->height = $data['height'];
        $this->width = $data['width'];
        $this->length = $data['length'];
    }

    public function toArray(): array
    {
        $arrParent = parent::toArray();
        $arr = array_merge($arrParent,
            ['height' => $this->height,
                'width' => $this->width,
                'length' => $this->length]);
        return $arr;

    }

    public function toIndexArray(): array
    {
        $parentArr = parent::toIndexArray();
        $parentArr['dimensions'] = 'Dimensions: ' . $this->height . 'x' . $this->width . 'x' . $this->length;
        return $parentArr;
    }
}