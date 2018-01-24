<?php


namespace PE\Entity\Request;


use PE\Entity\AbstractRequest;

class TrackingRequest extends AbstractRequest
{

  const DOCUMENT_ORDER = 'order'; // заказ
  const DOCUMENT_WAYBILL = 'waybill'; // накладная

  const NUMBER_CSE = 'InternalNumber'; // номер КСЭ
  const NUMBER_CLIENT = 'ClientNumber'; // номер клиента
  /**
   * @var string тип документа (order - заказ, waybill - накладная)
   */
  protected $documentType;
  /**
   * @var string номер документа
   */
  protected $number;
  /**
   * @var string
   */
  protected $numberType;

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

  protected function setDocumentType($documentType)
  {
    if (!in_array($documentType, [self::DOCUMENT_ORDER, self::DOCUMENT_WAYBILL]))
    {
      throw new \InvalidArgumentException("Неверное значение DocumentType!");
    }

    $this->documentType = $documentType;
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
   * @param string $numberType
   *
   * @throws \InvalidArgumentException
   * @return self
   */
  public function setNumberType($numberType)
  {
    if (!in_array($numberType, [self::NUMBER_CLIENT, self::NUMBER_CSE]))
    {
      throw new \InvalidArgumentException("Неверный формат numberType");
    }
    $this->numberType = $numberType;

    return $this;
  }

  /**
   * @return string
   */
  public function getDocumentType()
  {
    return $this->documentType;
  }

  /**
   * @return string
   */
  public function getNumber()
  {
    return $this->number;
  }

  /**
   * @return string
   */
  public function getNumberType()
  {
    return $this->numberType;
  }
}