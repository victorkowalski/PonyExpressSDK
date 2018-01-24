<?php


namespace PE\Entity;


interface IRequest
{
  /**
   * @return string
   */
  public function asXml();

  /**
   * @return string
   */
  public function asJson();
} 