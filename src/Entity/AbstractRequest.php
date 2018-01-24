<?php


namespace PE\Entity;


use PE\Entity\Request\CalculatorRequest;
use PE\Entity\Request\GetReferenceRequest;
use PE\Entity\Request\SaveOrderRequest;
use PE\Entity\Request\TrackingRequest;
use ReflectionClass;
use ReflectionProperty;

abstract class AbstractRequest implements IRequest
{
  public static $requestNameMap = [
    CalculatorRequest::class   => 'Calculator',
    GetReferenceRequest::class => 'GetReference',
    SaveOrderRequest::class    => 'SaveOrder',
    TrackingRequest::class     => 'Tracking',
  ];
  /**
   * @var string имя пользователя
   *             !Обязательный параметр
   */
  public $login;
  /**
   * @var string пароль
   *             !Обязательный параметр
   */
  public $password;

  public function __construct($login, $password)
  {
    $this->login    = $login;
    $this->password = $password;
  }

  /**
   * @return string
   */
  public function getLogin()
  {
    return $this->login;
  }

  /**
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * @return array of properties
   */
  public function asArray()
  {
    $reflectionClass = new ReflectionClass($this);
    $array           = [];
    foreach ($reflectionClass->getProperties(
      ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED
    ) as $property)
    {
      $property->setAccessible(true);
      if ($property->isStatic())
      {
        continue;
      }
      // аналог для поля fieldName: $array["fieldName"] = $this->getFieldName();
      $array[$property->getName()] = $this->{"get" . ucfirst($property->getName())}();
      $property->setAccessible(false);
    }

    return $array;
  }
}