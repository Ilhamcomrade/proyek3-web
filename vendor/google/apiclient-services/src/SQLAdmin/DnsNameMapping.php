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

namespace Google\Service\SQLAdmin;

class DnsNameMapping extends \Google\Model
{
  /**
   * @var string
   */
  public $connectionType;
  /**
   * @var string
   */
  public $dnsScope;
  /**
   * @var string
   */
  public $name;

  /**
   * @param string
   */
  public function setConnectionType($connectionType)
  {
    $this->connectionType = $connectionType;
  }
  /**
   * @return string
   */
  public function getConnectionType()
  {
    return $this->connectionType;
  }
  /**
   * @param string
   */
  public function setDnsScope($dnsScope)
  {
    $this->dnsScope = $dnsScope;
  }
  /**
   * @return string
   */
  public function getDnsScope()
  {
    return $this->dnsScope;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DnsNameMapping::class, 'Google_Service_SQLAdmin_DnsNameMapping');
