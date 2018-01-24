<?php


namespace PE\Entity\Request;


use PE\Entity\AbstractRequest;
use PE\Exceptions\RequiredParameterException;

/**
 * GetReferenceGeographyRequest
 * @package CSE\Entity\Request
 */
class GetReferenceRequest extends AbstractRequest
{
  const REFERENCE_URGENCIES = 'Urgencies'; // Срочности
  const REFERENCE_PAYERS = 'Payers'; // Виды плательщиков
  const REFERENCE_PAYMENT_METHODS = 'PaymentMethods'; // Виды оплаты
  const REFERENCE_TYPE_OF_CARGO = 'TypesOfCargo'; // Виды груза
  const REFERENCE_SERVICES = 'Services'; // Услуги
  const REFERENCE_GEOGRAPHY = 'Geography'; // География

  public static $references = [
    self::REFERENCE_URGENCIES,
    self::REFERENCE_PAYERS,
    self::REFERENCE_PAYMENT_METHODS,
    self::REFERENCE_TYPE_OF_CARGO,
    self::REFERENCE_SERVICES,
    self::REFERENCE_GEOGRAPHY,
  ];

  // Некоторые константы, которые были "вытащенны" из разных вариаций метода GetReference.
  // В целом, меняются довольно редко.
  /**
   * Типы доставки (срочности)
   */
  const DELIVERY_STANDARD = '18c4f209-458b-11dc-9497-0015170f8c09'; // обычная доставка
  const DELIVERY_FROM_ADDRESS = 'aa1bffda-6230-11dd-af7c-0015170f8c09'; // «с адреса»
  const DELIVERY_NOT_URGENT = '209145f1-66a3-11dc-bda1-0015170f8c09'; // не срочная
  const DELIVERY_URGENT = '18c4f207-458b-11dc-9497-0015170f8c09'; // срочная
  const DELIVERY_SUPER_URGENT = '18c4f208-458b-11dc-9497-0015170f8c09'; // сверхсрочная
  const DELIVERY_ECONOMY = '8bbab642-1df3-11de-bcd5-0015170f8c09'; // эконом
  const DELIVERY_DAILY = '9d7b9bdc-772f-11dc-a1ad-0015170f8c09;'; // суточная

  public static $deliveryTypes = [
    self::DELIVERY_STANDARD,
    self::DELIVERY_FROM_ADDRESS,
    self::DELIVERY_NOT_URGENT,
    self::DELIVERY_URGENT,
    self::DELIVERY_SUPER_URGENT,
    self::DELIVERY_ECONOMY,
    self::DELIVERY_DAILY
  ];

  /**
   * Типы грузов
   */
  const TYPE_CARGO_GOODS = '4aab1fc6-fc2b-473a-8728-58bcd4ff79ba'; // документы
  const TYPE_CARGO_DOCS = '81dd8a13-8235-494f-84fd-9c04c51d50ec'; // груз
  const TYPE_CARGO_HEAVY = 'f132d9fa-a944-4c11-9001-f4dfdd13b4a7'; // негабаритный груз
  const TYPE_CARGO_DANGER = 'dd80f922-a010-422a-b26a-0a65a6f894ce'; // опасный груз

  public static $cargoTypes = [
    self::TYPE_CARGO_GOODS,
    self::TYPE_CARGO_DOCS,
    self::TYPE_CARGO_HEAVY,
    self::TYPE_CARGO_DANGER,
  ];

  /**
   * Типы оплаты
   */
  const PAYMENT_CASH = 0; // оплата наличными
  const PAYMENT_CARD = 1; // безнал
  const PAYMENT_GUARANTEE_LETTER = 2; // гарантийное письмо

  /**
   * Типы плательщиков
   */
  const PAYER_CUSTOMER = 0; // влательщик — заказчик
  const PAYER_SENDER = 1; // отправитель
  const PAYER_RECIPIENT = 2; // получатель
  /**
   * @var string наименование справочника (все справочники в константах)
   *             !Обязательный параметр
   */
  protected $reference;

  /**
   * @var string группа, в которой осуществляется поиск
   *             (заполняется только для географии)
   */
  protected $inGroup;

  /**
   * @var string наименование для поиска
   *             (заполняется только для географии)
   */
  protected $search;

  /**
   * @param string $reference
   *
   * @throws \InvalidArgumentException
   * @return self
   */
  public function setReference($reference)
  {
    if (!in_array($reference, self::$references))
    {
      throw new \InvalidArgumentException("Неверное значение параметра reference");
    }
    $this->reference = $reference;

    return $this;
  }

  /**
   * @param string $inGroup
   *
   * @return self
   */
  public function setInGroup($inGroup)
  {
    $this->inGroup = $inGroup;

    return $this;
  }

  /**
   * @param string $search
   *
   * @return self
   */
  public function setSearch($search)
  {
    $this->search = $search;

    return $this;
  }

  /**
   * @return string
   */
  public function getInGroup()
  {
    return $this->inGroup;
  }

  /**
   * @throws RequiredParameterException
   * @return string
   */
  public function getReference()
  {
    if (!$this->reference)
    {
      throw new RequiredParameterException("Параметр reference обязателен для заполнения");
    }

    return $this->reference;
  }

  /**
   * @return string
   */
  public function getSearch()
  {
    return $this->search;
  }

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
}