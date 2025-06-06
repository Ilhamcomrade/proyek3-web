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

namespace Google\Service\Dataform;

class ActionErrorTable extends \Google\Model
{
  /**
   * @var int
   */
  public $retentionDays;
  protected $targetType = Target::class;
  protected $targetDataType = '';

  /**
   * @param int
   */
  public function setRetentionDays($retentionDays)
  {
    $this->retentionDays = $retentionDays;
  }
  /**
   * @return int
   */
  public function getRetentionDays()
  {
    return $this->retentionDays;
  }
  /**
   * @param Target
   */
  public function setTarget(Target $target)
  {
    $this->target = $target;
  }
  /**
   * @return Target
   */
  public function getTarget()
  {
    return $this->target;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ActionErrorTable::class, 'Google_Service_Dataform_ActionErrorTable');
