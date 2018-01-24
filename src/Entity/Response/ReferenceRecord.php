<?php
namespace PE\Entity\Response;


class ReferenceRecord implements IObject
{
  /**
   * @var string Код элемента справочника
   */
  protected $code;
  /**
   * @var string Наименование элемента справочника
   */
  protected $name;

  /**
   * @param string $code
   *
   * @return self
   */
  public function setCode($code)
  {
    $this->code = $code;

    return $this;
  }

  /**
   * @return string
   */
  public function getCode()
  {
    return $this->code;
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
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }


}