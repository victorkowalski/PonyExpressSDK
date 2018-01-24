<?php


namespace PE\Entity\Response;


class Package implements IObject
{
  /**
   * @var float
   */
  protected $weight = 0; // Вес места
  /**
   * @var float
   */
  protected $height = 0; // Высота места
  /**
   * @var float
   */
  protected $length = 0; // Длина места
  /**
   * @var float
   */
  protected $width = 0; // Ширина места
  /**
   * @var string
   */
  protected $packageID = ""; // Номер места/упаковки
  /**
   * @var int
   */
  protected $packageQty = 1; // Количество таких мест

  /**
   * @param float $height
   *
   * @return self
   */
  public function setHeight($height)
  {
    $this->height = $height;

    return $this;
  }

  /**
   * @param float $length
   *
   * @return self
   */
  public function setLength($length)
  {
    $this->length = $length;

    return $this;
  }

  /**
   * @param string $packageID
   *
   * @return self
   */
  public function setPackageID($packageID)
  {
    $this->packageID = $packageID;

    return $this;
  }

  /**
   * @param int $packageQty
   *
   * @return self
   */
  public function setPackageQty($packageQty)
  {
    $this->packageQty = $packageQty;

    return $this;
  }

  /**
   * @param float $weight
   *
   * @return self
   */
  public function setWeight($weight)
  {
    $this->weight = $weight;

    return $this;
  }

  /**
   * @param float $width
   *
   * @return self
   */
  public function setWidth($width)
  {
    $this->width = $width;

    return $this;
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
  public function getLength()
  {
    return $this->length;
  }

  /**
   * @return string
   */
  public function getPackageID()
  {
    return $this->packageID;
  }

  /**
   * @return int
   */
  public function getPackageQty()
  {
    return $this->packageQty;
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
}