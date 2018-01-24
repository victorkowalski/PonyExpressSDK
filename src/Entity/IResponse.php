<?php


namespace PE\Entity;


use PE\Entity\Response\IObject;

interface IResponse
{

  /**
   * @return boolean
   */
  public function hasError();

  /**
   * @return IObject
   */
  public function getBody();
} 