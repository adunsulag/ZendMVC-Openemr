<?php
/* +-----------------------------------------------------------------------------+
*    OpenEMR - Open Source Electronic Medical Record
*    Copyright (C) 2014 Z&H Consultancy Services Private Limited <sam@zhservices.com>
*
*    This program is free software: you can redistribute it and/or modify
*    it under the terms of the GNU Affero General Public License as
*    published by the Free Software Foundation, either version 3 of the
*    License, or (at your option) any later version.
*
*    This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*    GNU Affero General Public License for more details.
*
*    You should have received a copy of the GNU Affero General Public License
*    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*    @author  Vinish K <vinish@zhservices.com>
* +------------------------------------------------------------------------------+
*/
namespace CCPaymentManager\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use CCPaymentManager\Form\CCPaymentManagerForm;
use Application\Listener\Listener;

class ModuleconfigController extends AbstractActionController
{
    protected $inputFilter;

    public function __construct()
    {
    }

    public function exchangeArray($data)
    {
    }

    public function getDependedModulesConfig()
    {
        //return $dependedModules;
    }
}
