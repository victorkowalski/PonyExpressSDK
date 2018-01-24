<?php


namespace PE\Entity\Request;


use PE\Entity\AbstractRequest;
use PE\Exceptions\RequiredParameterException;

class SaveOrderRequest extends AbstractRequest
{
  // Дабы не рушить архитектуру, предложенную в документации, был вынужден сделать такую дикую простыню.
  // Прости меня, пользователь этого SDK.
  /**
   * @var string отправитель
   *             !Обязательный параметр
   */
  protected $sender;
  /**
   * @var string география отправителя
   *             !Обязательный параметр
   */
  protected $senderGeography;
  /**
   * @var string адрес отправителя
   *             !Обязательный параметр
   */
  protected $senderAddress;
  /**
   * @var string телефон отправителя
   *             !Обязательный параметр
   */
  protected $senderPhone;
  /**
   * @var string получатель
   *             !Обязательный параметр
   */
  protected $recipient;
  /**
   * @var string география получателя
   *             !Обязательный параметр
   */
  protected $recipientGeography;
  /**
   * @var string адрес получателя
   *             !Обязательный параметр
   */
  protected $recipientAddress;
  /**
   * @var string телефон получателя
   *             !Обязательный параметр
   */
  protected $recipientPhone;
  /**
   * @var string код срочности
   *             !Обязательный параметр
   */
  protected $urgency;
  /**
   * @var int код плательщика
   *          !Обязательный параметр
   */
  protected $payer;
  /**
   * @var int код способа оплаты
   *          !Обязательный параметр
   */
  protected $paymentMethod;
  /**
   * @var string код вида груза
   *             !Обязательный параметр
   */
  protected $typeOfCargo;
  /**
   * @var string дата забора (дд.мм.гггг)
   */
  protected $takeDate;
  /**
   * @var string время забора
   */
  protected $takeTime;
  /**
   * @var string предпочтительная дата доставки (дд.мм.гггг)
   */
  protected $deliveryDate;
  /**
   * @var string предпочтительное время доставки
   */
  protected $deliveryTime;
  /**
   * @var string подразделение
   */
  protected $department;
  /**
   * @var string проект
   */
  protected $project;
  /**
   * @var string контактное лицо отправителя
   */
  protected $senderOfficial;
  /**
   * @var string адрес электронной почты отправителя
   */
  protected $senderEMail;
  /**
   * @var string дополнительная информация об отправителе
   */
  protected $senderInfo;
  /**
   * @var string контактное лицо получателя
   */
  protected $recipientOfficial;
  /**
   * @var string адрес электронной почты получателя
   */
  protected $recipientEMail;
  /**
   * @var string дополнительная информация о получателе
   */
  protected $recipientInfo;
  /**
   * @var bool признак доставки с возвратом (true/false)
   */
  protected $withReturn;
  /**
   * @var float вес, кг.
   */
  protected $weight;
  /**
   * @var float высота, см.
   */
  protected $height;
  /**
   * @var float длина, см.
   */
  protected $length;
  /**
   * @var float ширина, см.
   */
  protected $width;
  /**
   * @var string описание груза
   */
  protected $cargoDescription;
  /**
   * @var int число мест
   */
  protected $cargoPackageQty;
  /**
   * @var float страховая стоимость груза
   */
  protected $insuranceRate;
  /**
   * @var float объявленная стоимость груза
   */
  protected $declaredValueRate;
  /**
   * @var float сумма Cash On Delivery (для интернет-магазинов)
   */
  protected $COD;

  /**
   * @var string код плательщика, с которого берётся сумма COD ￼(Cash On Delivery)
   */
  protected $CODPayer;

  /**
   * @var string номер клиента
   */
  protected $clientNumber;

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

  //SETTERS
  /**
   * @param float $COD
   *
   * @return self
   */
  public function setCOD($COD)
  {
    $this->COD = $COD;

    return $this;
  }

  /**
   * @param string $CODPayer
   *
   * @throws \InvalidArgumentException
   * @return self
   */
  public function setCODPayer($CODPayer)
  {
    if (!in_array(
      $CODPayer,
      [GetReferenceRequest::PAYER_CUSTOMER, GetReferenceRequest::PAYER_RECIPIENT, GetReferenceRequest::PAYER_SENDER]
    )
    )
    {
      throw new \InvalidArgumentException("Неверный формат параметра CODPayer");
    }
    $this->CODPayer = $CODPayer;

    return $this;
  }

  /**
   * @param string $cargoDescription
   *
   * @return self
   */
  public function setCargoDescription($cargoDescription)
  {
    $this->cargoDescription = $cargoDescription;

    return $this;
  }

  /**
   * @param int $cargoPackageQty
   *
   * @return self
   */
  public function setCargoPackageQty($cargoPackageQty)
  {
    $this->cargoPackageQty = $cargoPackageQty;

    return $this;
  }

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
   * @param float $declaredValueRate
   *
   * @return self
   */
  public function setDeclaredValueRate($declaredValueRate)
  {
    $this->declaredValueRate = $declaredValueRate;

    return $this;
  }

  /**
   * @param string $deliveryDate
   *
   * @return self
   */
  public function setDeliveryDate($deliveryDate)
  {
    $this->deliveryDate = $deliveryDate;

    return $this;
  }

  /**
   * @param string $deliveryTime
   *
   * @return self
   */
  public function setDeliveryTime($deliveryTime)
  {
    $this->deliveryTime = $deliveryTime;

    return $this;
  }

  /**
   * @param string $department
   *
   * @return self
   */
  public function setDepartment($department)
  {
    $this->department = $department;

    return $this;
  }

  /**
   * @param float $height
   *
   * @throws \InvalidArgumentException
   * @return self
   */
  public function setHeight($height)
  {
    if ($height <= 0)
    {
      throw new \InvalidArgumentException("Высота не может быть меньше или равна 0");
    }
    $this->height = $height;

    return $this;
  }

  /**
   * @param float $insuranceRate
   *
   * @return self
   */
  public function setInsuranceRate($insuranceRate)
  {
    $this->insuranceRate = $insuranceRate;

    return $this;
  }

  /**
   * @param float $length
   *
   * @throws \InvalidArgumentException
   * @return self
   */
  public function setLength($length)
  {
    if ($length <= 0)
    {
      throw new \InvalidArgumentException("Длина не может быть меньше или равна 0");
    }
    $this->length = $length;

    return $this;
  }

  /**
   * @param int $payer
   *
   * @throws \InvalidArgumentException
   * @return self
   */
  public function setPayer($payer)
  {
    if (!in_array(
      $payer,
      [GetReferenceRequest::PAYER_CUSTOMER, GetReferenceRequest::PAYER_SENDER, GetReferenceRequest::PAYER_RECIPIENT,]
    )
    )
    {
      throw new \InvalidArgumentException("Неверный формат payer");
    }

    $this->payer = $payer;

    return $this;
  }

  /**
   * @param int $paymentMethod
   *
   * @throws \InvalidArgumentException
   * @return self
   */
  public function setPaymentMethod($paymentMethod)
  {
    if (!in_array(
      $paymentMethod, [
                      GetReferenceRequest::PAYMENT_CARD,
                      GetReferenceRequest::PAYMENT_CASH,
                      GetReferenceRequest::PAYMENT_GUARANTEE_LETTER
                    ]
    )
    )
    {
      throw new \InvalidArgumentException("Неверный формат paymentMethod");
    }
    $this->paymentMethod = $paymentMethod;

    return $this;
  }

  /**
   * @param string $project
   *
   * @return self
   */
  public function setProject($project)
  {
    $this->project = $project;

    return $this;
  }

  /**
   * @param string $recipient
   *
   * @return self
   */
  public function setRecipient($recipient)
  {
    $this->recipient = $recipient;

    return $this;
  }

  /**
   * @param string $recipientAddress
   *
   * @return self
   */
  public function setRecipientAddress($recipientAddress)
  {
    $this->recipientAddress = $recipientAddress;

    return $this;
  }

  /**
   * @param string $recipientEMail
   *
   * @return self
   */
  public function setRecipientEMail($recipientEMail)
  {
    $this->recipientEMail = $recipientEMail;

    return $this;
  }

  /**
   * @param string $recipientGeography
   *
   * @return self
   */
  public function setRecipientGeography($recipientGeography)
  {
    $this->recipientGeography = $recipientGeography;

    return $this;
  }

  /**
   * @param string $recipientInfo
   *
   * @return self
   */
  public function setRecipientInfo($recipientInfo)
  {
    $this->recipientInfo = $recipientInfo;

    return $this;
  }

  /**
   * @param string $recipientOfficial
   *
   * @return self
   */
  public function setRecipientOfficial($recipientOfficial)
  {
    $this->recipientOfficial = $recipientOfficial;

    return $this;
  }

  /**
   * @param string $recipientPhone
   *
   * @return self
   */
  public function setRecipientPhone($recipientPhone)
  {
    $this->recipientPhone = $recipientPhone;

    return $this;
  }

  /**
   * @param string $sender
   *
   * @return self
   */
  public function setSender($sender)
  {
    $this->sender = $sender;

    return $this;
  }

  /**
   * @param string $senderAddress
   *
   * @return self
   */
  public function setSenderAddress($senderAddress)
  {
    $this->senderAddress = $senderAddress;

    return $this;
  }

  /**
   * @param string $senderEMail
   *
   * @return self
   */
  public function setSenderEMail($senderEMail)
  {
    $this->senderEMail = $senderEMail;

    return $this;
  }

  /**
   * @param string $senderGeography
   *
   * @return self
   */
  public function setSenderGeography($senderGeography)
  {
    $this->senderGeography = $senderGeography;

    return $this;
  }

  /**
   * @param string $senderInfo
   *
   * @return self
   */
  public function setSenderInfo($senderInfo)
  {
    $this->senderInfo = $senderInfo;

    return $this;
  }

  /**
   * @param string $senderOfficial
   *
   * @return self
   */
  public function setSenderOfficial($senderOfficial)
  {
    $this->senderOfficial = $senderOfficial;

    return $this;
  }

  /**
   * @param string $senderPhone
   *
   * @return self
   */
  public function setSenderPhone($senderPhone)
  {
    $this->senderPhone = $senderPhone;

    return $this;
  }

  /**
   * @param string $takeDate
   *
   * @return self
   */
  public function setTakeDate($takeDate)
  {
    $this->takeDate = $takeDate;

    return $this;
  }

  /**
   * @param string $takeTime
   *
   * @return self
   */
  public function setTakeTime($takeTime)
  {
    $this->takeTime = $takeTime;

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
      throw new \InvalidArgumentException("Неверный формат параметра typeOfCargo");
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
      throw new \InvalidArgumentException("Неверный формат urgency");
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
      throw new \InvalidArgumentException("Вес не может быть меньше или равна 0");
    }
    $this->weight = $weight;

    return $this;
  }

  /**
   * @param float $width
   *
   * @throws \InvalidArgumentException
   * @return self
   */
  public function setWidth($width)
  {
    if ($width <= 0)
    {
      throw new \InvalidArgumentException("Ширина не может быть меньше или равна 0");
    }
    $this->width = $width;

    return $this;
  }

  /**
   * @param boolean $withReturn
   *
   * @return self
   */
  public function setWithReturn($withReturn)
  {
    $this->withReturn = (boolean)$withReturn;

    return $this;
  }

  //GETTERS

  /**
   * @return float
   */
  public function getCOD()
  {
    return $this->COD;
  }

  /**
   * @return string
   */
  public function getCODPayer()
  {
    return $this->CODPayer;
  }

  /**
   * @return string
   */
  public function getCargoDescription()
  {
    return $this->cargoDescription;
  }

  /**
   * @return int
   */
  public function getCargoPackageQty()
  {
    return $this->cargoPackageQty;
  }

  /**
   * @return string
   */
  public function getClientNumber()
  {
    return $this->clientNumber;
  }

  /**
   * @return float
   */
  public function getDeclaredValueRate()
  {
    return $this->declaredValueRate;
  }

  /**
   * @return string
   */
  public function getDeliveryDate()
  {
    return $this->deliveryDate;
  }

  /**
   * @return string
   */
  public function getDeliveryTime()
  {
    return $this->deliveryTime;
  }

  /**
   * @return string
   */
  public function getDepartment()
  {
    return $this->department;
  }

  /**
   * @return float
   */
  public function getHeight()
  {
    return $this->height;
  }

  /**
   * @return float
   */
  public function getInsuranceRate()
  {
    return $this->insuranceRate;
  }

  /**
   * @return float
   */
  public function getLength()
  {
    return $this->length;
  }

  /**
   * @throws \PE\Exceptions\RequiredParameterException
   * @return int
   */
  public function getPayer()
  {
    if (!$this->payer)
    {
      throw new RequiredParameterException("Поле payer - обязательный для заполнения параметр");
    }

    return $this->payer;
  }

  /**
   * @throws \PE\Exceptions\RequiredParameterException
   * @return int
   */
  public function getPaymentMethod()
  {
    if (!$this->paymentMethod)
    {
      throw new RequiredParameterException("Поле paymentMethod - обязательный для заполнения параметр");
    }

    return $this->paymentMethod;
  }

  /**
   * @return string
   */
  public function getProject()
  {
    return $this->project;
  }

  /**
   * @throws RequiredParameterException
   * @return string
   */
  public function getRecipient()
  {
    if (!$this->recipient)
    {
      throw new RequiredParameterException("Поле recipient - обязательный для заполнения параметр");
    }

    return $this->recipient;
  }

  /**
   * @throws RequiredParameterException
   * @return string
   */
  public function getRecipientAddress()
  {
    if (!$this->recipientAddress)
    {
      throw new RequiredParameterException("Поле recipientAddress - обязательный для заполнения параметр");
    }

    return $this->recipientAddress;
  }

  /**
   * @return string
   */
  public function getRecipientEMail()
  {
    return $this->recipientEMail;
  }

  /**
   * @throws RequiredParameterException
   * @return string
   */
  public function getRecipientGeography()
  {
    if (!$this->recipientGeography)
    {
      throw new RequiredParameterException("Поле recipientGeography - обязательный для заполнения параметр");
    }

    return $this->recipientGeography;
  }

  /**
   * @return string
   */
  public function getRecipientInfo()
  {
    return $this->recipientInfo;
  }

  /**
   * @return string
   */
  public function getRecipientOfficial()
  {
    return $this->recipientOfficial;
  }

  /**
   * @throws RequiredParameterException
   * @return string
   */
  public function getRecipientPhone()
  {
    if (!$this->recipientPhone)
    {
      throw new RequiredParameterException("Поле recipientPhone - обязательный для заполнения параметр");
    }

    return $this->recipientPhone;
  }

  /**
   * @throws RequiredParameterException
   * @return string
   */
  public function getSender()
  {
    if (!$this->sender)
    {
      throw new RequiredParameterException("Поле sender - обязательный для заполнения параметр");
    }

    return $this->sender;
  }

  /**
   * @throws RequiredParameterException
   * @return string
   */
  public function getSenderAddress()
  {
    if (!$this->senderAddress)
    {
      throw new RequiredParameterException("Поле senderAddress - обязательный для заполнения параметр");
    }

    return $this->senderAddress;
  }

  /**
   * @return string
   */
  public function getSenderEMail()
  {
    return $this->senderEMail;
  }

  /**
   * @throws RequiredParameterException
   * @return string
   */
  public function getSenderGeography()
  {
    if (!$this->senderGeography)
    {
      throw new RequiredParameterException("Поле senderGeography - обязательный для заполнения параметр");
    }

    return $this->senderGeography;
  }

  /**
   * @return string
   */
  public function getSenderInfo()
  {
    return $this->senderInfo;
  }

  /**
   * @return string
   */
  public function getSenderOfficial()
  {
    return $this->senderOfficial;
  }

  /**
   * @throws RequiredParameterException
   * @return string
   */
  public function getSenderPhone()
  {
    if (!$this->senderPhone)
    {
      throw new RequiredParameterException("Поле senderPhone - обязательный для заполнения параметр");
    }

    return $this->senderPhone;
  }

  /**
   * @return string
   */
  public function getTakeDate()
  {
    return $this->takeDate;
  }

  /**
   * @return string
   */
  public function getTakeTime()
  {
    return $this->takeTime;
  }

  /**
   * @throws \PE\Exceptions\RequiredParameterException
   * @return string
   */
  public function getTypeOfCargo()
  {
    if (!$this->typeOfCargo)
    {
      throw new RequiredParameterException("Поле typeOfCargo - обязательный для заполнения параметр");
    }

    return $this->typeOfCargo;
  }

  /**
   * @throws RequiredParameterException
   * @return string
   */
  public function getUrgency()
  {
    if (!$this->urgency)
    {
      throw new RequiredParameterException("Поле urgency - обязательный для заполнения параметр");
    }

    return $this->urgency;
  }

  /**
   * @return float
   */
  public function getWeight()
  {
    return $this->weight;
  }

  /**
   * @return float
   */
  public function getWidth()
  {
    return $this->width;
  }

  /**
   * @return boolean
   */
  public function getWithReturn()
  {
    return $this->withReturn;
  }


}