<?php


namespace PE\Entity\Response;


class ResultTrackingDocument implements IObject
{
  // Общая информация￼
  /**
   * @var string Внутренний номер документа
   */
  protected $number = "";
  /**
   * @var string  Клиентский номер документа
   */
  protected $clientNumber = "";
  /**
   * @var string  Имя документа
   */
  protected $name = "";
  /**
   * @var Package[] Список мест-упаковок, входящих в данный документ
   */
  protected $packages;

  // Результат отслеживания
  /**
   * @var TrackingEvent[] История изменения состояний груза
   */
  protected $history;

  /**
   * @param string $clientNumber
   *
   * @return self
   */
  public function setClientNumber($clientNumber)
  {
    $this->clientNumber = $clientNumber;

    return $this;
  }

  /**
   * @param \PE\Entity\Response\TrackingEvent $event
   *
   * @return self
   */
  public function addEvent(TrackingEvent $event)
  {
    $this->history[] = $event;

    return $this;
  }

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
   * @param \PE\Entity\Response\Package $package
   *
   * @return self
   */
  public function addPackage(Package $package)
  {
    $this->packages[] = $package;

    return $this;
  }

  /**
   * @return string
   */
  public function getClientNumber()
  {
    return $this->clientNumber;
  }

  /**
   * @return \PE\Entity\Response\TrackingEvent[]
   */
  public function getHistory()
  {
    return $this->history;
  }

  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @return string
   */
  public function getNumber()
  {
    return $this->number;
  }

  /**
   * @return \PE\Entity\Response\Package[]
   */
  public function getPackages()
  {
    return $this->packages;
  }
}