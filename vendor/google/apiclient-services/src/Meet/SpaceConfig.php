<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Meet;

class SpaceConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $accessType;
  protected $artifactConfigType = ArtifactConfig::class;
  protected $artifactConfigDataType = '';
  /**
   * @var string
   */
  public $attendanceReportGenerationType;
  /**
   * @var string
   */
  public $entryPointAccess;
  /**
   * @var string
   */
  public $moderation;
  protected $moderationRestrictionsType = ModerationRestrictions::class;
  protected $moderationRestrictionsDataType = '';

  /**
   * @param string
   */
  public function setAccessType($accessType)
  {
    $this->accessType = $accessType;
  }
  /**
   * @return string
   */
  public function getAccessType()
  {
    return $this->accessType;
  }
  /**
   * @param ArtifactConfig
   */
  public function setArtifactConfig(ArtifactConfig $artifactConfig)
  {
    $this->artifactConfig = $artifactConfig;
  }
  /**
   * @return ArtifactConfig
   */
  public function getArtifactConfig()
  {
    return $this->artifactConfig;
  }
  /**
   * @param string
   */
  public function setAttendanceReportGenerationType($attendanceReportGenerationType)
  {
    $this->attendanceReportGenerationType = $attendanceReportGenerationType;
  }
  /**
   * @return string
   */
  public function getAttendanceReportGenerationType()
  {
    return $this->attendanceReportGenerationType;
  }
  /**
   * @param string
   */
  public function setEntryPointAccess($entryPointAccess)
  {
    $this->entryPointAccess = $entryPointAccess;
  }
  /**
   * @return string
   */
  public function getEntryPointAccess()
  {
    return $this->entryPointAccess;
  }
  /**
   * @param string
   */
  public function setModeration($moderation)
  {
    $this->moderation = $moderation;
  }
  /**
   * @return string
   */
  public function getModeration()
  {
    return $this->moderation;
  }
  /**
   * @param ModerationRestrictions
   */
  public function setModerationRestrictions(ModerationRestrictions $moderationRestrictions)
  {
    $this->moderationRestrictions = $moderationRestrictions;
  }
  /**
   * @return ModerationRestrictions
   */
  public function getModerationRestrictions()
  {
    return $this->moderationRestrictions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SpaceConfig::class, 'Google_Service_Meet_SpaceConfig');
