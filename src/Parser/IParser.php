<?php


namespace PE\Parser;


use PE\Entity\AbstractResponse;

interface IParser
{
  /**
   * @return AbstractResponse
   */
  public function getResponse();
} 