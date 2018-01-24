<?php


namespace PE\Entity;


use PE\Entity\Response\Error;
use PE\Entity\Response\IObject;
use PE\Entity\IResponse;

class AbstractResponse implements IResponse
{
  /**
   * @var IObject содержит в себе один из объектов ответа от API PonySDK
   */
  protected $body;

  function __construct(IObject $body)
  {
    $this->body = $body;
  }

  /**
   * @return boolean
   */
  public function hasError()
  {
    if ($this->getBody() instanceof Error)
    {
      return true;
    }

    return false;
  }

  /**
   * @return IObject
   */
  public function getBody()
  {
    return $this->body;
  }
}