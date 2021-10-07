<?php

namespace Drupal\occapi_entities;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a programme entity type.
 */
interface ProgrammeInterface extends ContentEntityInterface, EntityChangedInterface {

  /**
   * Gets the programme title.
   *
   * @return string
   *   Title of the programme.
   */
  public function getTitle();

  /**
   * Sets the programme title.
   *
   * @param string $title
   *   The programme title.
   *
   * @return \Drupal\occapi_entities\ProgrammeInterface
   *   The called programme entity.
   */
  public function setTitle($title);

  /**
   * Gets the programme creation timestamp.
   *
   * @return int
   *   Creation timestamp of the programme.
   */
  public function getCreatedTime();

  /**
   * Sets the programme creation timestamp.
   *
   * @param int $timestamp
   *   The programme creation timestamp.
   *
   * @return \Drupal\occapi_entities\ProgrammeInterface
   *   The called programme entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the programme status.
   *
   * @return bool
   *   TRUE if the programme is enabled, FALSE otherwise.
   */
  public function isEnabled();

  /**
   * Sets the programme status.
   *
   * @param bool $status
   *   TRUE to enable this programme, FALSE to disable.
   *
   * @return \Drupal\occapi_entities\ProgrammeInterface
   *   The called programme entity.
   */
  public function setStatus($status);

}
