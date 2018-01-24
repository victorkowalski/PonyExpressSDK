<?php


namespace PE\Entity\Response;


use DateTime;

class TrackingEvent implements IObject
{
  /**
   * @var DateTime
   */
  protected $eventDateTime; // Время регистрации события
  /**
   * @var string
   */
  protected $eventState; // Внутренне название состояния
  /**
   * @var string
   */
  protected $eventName; // Отображаемое название состояния
  /**
   * @var string
   */
  protected $eventComment; // Дополнительная информация

  /**
   * @param string $eventComment
   *
   * @return self
   */
  public function setEventComment($eventComment)
  {
    $this->eventComment = $eventComment;

    return $this;
  }

  /**
   * @param \DateTime $eventDateTime
   *
   * @return self
   */
  public function setEventDateTime(DateTime $eventDateTime)
  {
    $this->eventDateTime = $eventDateTime;

    return $this;
  }

  /**
   * @param string $eventName
   *
   * @return self
   */
  public function setEventName($eventName)
  {
    $this->eventName = $eventName;

    return $this;
  }

  /**
   * @param string $eventState
   *
   * @return self
   */
  public function setEventState($eventState)
  {
    $this->eventState = $eventState;

    return $this;
  }

  /**
   * @return string
   */
  public function getEventComment()
  {
    return $this->eventComment;
  }

  /**
   * @return \DateTime
   */
  public function getEventDateTime()
  {
    return $this->eventDateTime;
  }

  /**
   * @return string
   */
  public function getEventName()
  {
    return $this->eventName;
  }

  /**
   * @return string
   */
  public function getEventState()
  {
    return $this->eventState;
  }


}