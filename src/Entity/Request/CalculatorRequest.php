<?php


namespace PE\Entity\Request;


use PE\Entity\AbstractRequest;
use PE\Exceptions\RequiredParameterException;

class CalculatorRequest extends AbstractRequest
{

  /**
   * @var string география отправителя
   *             !Обязательный параметр
   */
  protected $from;
  /**
   * @var string география получателя
   *             !Обязательный параметр
   */
  protected $to;
  /**
   * @var string вид груза
   *             !Обязательный параметр
   */
  protected $typeOfCargo;
  /**
   * @var float вес, кг
   *             !Обязательный параметр
   */
  protected $weight;
  /**
   * @var string срочность
   */
  protected $urgency;
  /**
   * @var string услуга
   */
  protected $service;
  /**
   * @var integer количество мест или оказываемых услуг
   */
  protected $qty;

  /**
   * @return string
   */
  public function asXml()
  {
    // TODO: В данной версии передача данных в формате XML не требуется
  }

  /**
   * @return string
   */
  public function asJson()
  {
    // TODO: В данной версии передача данных в формате JSON не требуется
  }

  /**
   * @param string $from
   *
   * @return self
   */
  public function setFrom($from)
  {
    $this->from = $from;

    return $this;
  }

  /**
   * @param int $qty
   *
   * @return self
   */
  public function setQty($qty)
  {
    $this->qty = $qty;

    return $this;
  }

  /**
   * @param string $service
   *
   * @return self
   */
  public function setService($service)
  {
    $this->service = $service;

    return $this;
  }

  /**
   * @param string $to
   *
   * @return self
   */
  public function setTo($to)
  {
    $this->to = $to;

    return $this;
  }

  /**
   * @param string $typeOfCargo
   *
   * @throws \InvalidArgumentException
   * @return self
   */
  public function setTypeOfCargo($typeOfCargo)
  {
    if (!in_array($typeOfCargo, GetReferenceRequest::$cargoTypes))
    {
      throw new \InvalidArgumentException("Неверно задан параметр typeOfCargo");
    }
    $this->typeOfCargo = $typeOfCargo;

    return $this;
  }

  /**
   * @param string $urgency
   *
   * @throws \InvalidArgumentException
   * @return self
   */
  public function setUrgency($urgency)
  {
    if (!in_array($urgency, GetReferenceRequest::$deliveryTypes))
    {
      throw new \InvalidArgumentException("Неверно задан параметр urgency");
    }
    $this->urgency = $urgency;

    return $this;
  }

  /**
   * @param float $weight
   *
   * @throws \InvalidArgumentException
   * @return self
   */
  public function setWeight($weight)
  {
    if ($weight <= 0)
    {
      throw new \InvalidArgumentException("Вес не может быть меньше или равен 0");
    }
    $this->weight = $weight;

    return $this;
  }

  /**
   * @throws \PE\Exceptions\RequiredParameterException
   * @return string
   */
  public function getFrom()
  {
    if (!$this->from)
    {
      throw new RequiredParameterException("Параметр from обязателен для заполнения");
    }

    return $this->from;
  }

  /**
   * @return int
   */
  public function getQty()
  {
    return $this->qty;
  }

  /**
   * @return string
   */
  public function getService()
  {
    return $this->service;
  }

  /**
   * @throws \PE\Exceptions\RequiredParameterException
   * @return string
   */
  public function getTo()
  {
    if (!$this->to)
    {
      throw new RequiredParameterException("Параметр to обязателен для заполнения");
    }

    return $this->to;
  }

  /**
   * @throws \PE\Exceptions\RequiredParameterException
   * @return string
   */
  public function getTypeOfCargo()
  {
    if (!$this->typeOfCargo)
    {
      throw new RequiredParameterException("Параметр typeOfCargo обязателен для заполнения");
    }

    return $this->typeOfCargo;
  }

  /**
   * @return string
   */
  public function getUrgency()
  {
    return $this->urgency;
  }

  /**
   * @throws \PE\Exceptions\RequiredParameterException
   * @return float
   */
  public function getWeight()
  {
    if (!$this->weight)
    {
      throw new RequiredParameterException("Параметр weight обязателен для заполнения");
    }

    return $this->weight;
  }


}