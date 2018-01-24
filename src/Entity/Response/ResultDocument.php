<?php
namespace PE\Entity\Response;
class ResultDocument implements IObject
{
  /**
   * @var string
   */
  protected $number; // Номер созданного документа

  /**
   * @param string $number
   *
   * @return self
   */
  public function setNumber($number)
  {
    $this->number = $number;

    return $this;
  }

  /**
   * @return string
   */
  public function getNumber()
  {
    return $this->number;
  }


}