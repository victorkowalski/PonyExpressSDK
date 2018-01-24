<?php


namespace PE\Entity\Response;


class ResultCalculator implements IObject
{
  /**
   * @var float
   */
  protected $minPeriod; // Минимальный срок доставки
  /**
   * @var float
   */
  protected $maxPeriod; // Максимальный срок доставки
  /**
   * @var Tariff[]
   */
  protected $tariffs; // История изменения состояний груза

  /**
   * @param float $maxPeriod
   *
   * @return self
   */
  public function setMaxPeriod($maxPeriod)
  {
    $this->maxPeriod = $maxPeriod;

    return $this;
  }

  /**
   * @param float $minPeriod
   *
   * @return self
   */
  public function setMinPeriod($minPeriod)
  {
    $this->minPeriod = $minPeriod;

    return $this;
  }

  /**
   * @param \PE\Entity\Response\Tariff $tariff
   *
   * @return self
   */
  public function addTariff(Tariff $tariff)
  {
    $this->tariffs = $tariff;

    return $this;
  }

  /**
   * @return float
   */
  public function getMaxPeriod()
  {
    return $this->maxPeriod;
  }

  /**
   * @return float
   */
  public function getMinPeriod()
  {
    return $this->minPeriod;
  }

  /**
   * @return \PE\Entity\Response\Tariff[]
   */
  public function getTariffs()
  {
    return $this->tariffs;
  }
}