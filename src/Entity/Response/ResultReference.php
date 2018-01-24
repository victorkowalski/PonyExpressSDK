<?php

namespace PE\Entity\Response;

class ResultReference implements IObject
{
  /**
   * @var ReferenceRecord[] Элементы справочника
   */
  protected $items;

  /**
   * @param \PE\Entity\Response\ReferenceRecord $item
   *
   * @return self
   */
  public function addItem(ReferenceRecord $item)
  {
    $this->items[] = $item;

    return $this;
  }

  /**
   * @return \PE\Entity\Response\ReferenceRecord[]
   */
  public function getItems()
  {
    return $this->items;
  }


}