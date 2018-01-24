<?php


namespace PE\Entity\Response;


class Tariff implements IObject
{
  /**
   * @var string
   */
  protected $name; // Наименование тарифа
  /**
   * @var float
   */
  protected $total; // Предварительная стоимость доставки

  /**
   * @param string $name
   *
   * @return self
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * @param float $total
   *
   * @return self
   */
  public function setTotal($total)
  {
    $this->total = $total;

    return $this;
  }

  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @return float
   */
  public function getTotal()
  {
    return $this->total;
  }
}