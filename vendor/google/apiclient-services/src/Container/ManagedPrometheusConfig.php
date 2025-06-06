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

namespace Google\Service\Container;

class ManagedPrometheusConfig extends \Google\Model
{
  protected $autoMonitoringConfigType = AutoMonitoringConfig::class;
  protected $autoMonitoringConfigDataType = '';
  /**
   * @var bool
   */
  public $enabled;

  /**
   * @param AutoMonitoringConfig
   */
  public function setAutoMonitoringConfig(AutoMonitoringConfig $autoMonitoringConfig)
  {
    $this->autoMonitoringConfig = $autoMonitoringConfig;
  }
  /**
   * @return AutoMonitoringConfig
   */
  public function getAutoMonitoringConfig()
  {
    return $this->autoMonitoringConfig;
  }
  /**
   * @param bool
   */
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  /**
   * @return bool
   */
  public function getEnabled()
  {
    return $this->enabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagedPrometheusConfig::class, 'Google_Service_Container_ManagedPrometheusConfig');
