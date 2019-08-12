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
*    @author  Bindia Nandakumar <bindia@zhservices.com>
* +------------------------------------------------------------------------------+
*/
namespace CCPaymentManager\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;
use \Application\Model\ApplicationTable;


class CCPaymentManagerTable extends AbstractTableGateway
{

    protected $charges;

    public $tableGateway;
    protected $applicationTable;

    /**
     * CCPaymentManagerTable constructor.
     * @param TableGateway $tableGateway
     */
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway         =   $tableGateway;
        $adapter                    =   \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();
        $this->adapter              =   $adapter;
        $this->resultSetPrototype   =   new ResultSet();
        $this->applicationTable     =   new ApplicationTable;
    }

    /**
     * @return mixed
     */
    public function fetch_charges()
    {
        $charges = new ApplicationTable;
            $sql = "SELECT billing.id, billing.fee, billing.pid, billing.encounter, CONCAT(u.lname, u.fname) AS name FROM billing ".
                   "LEFT JOIN patient_data AS u ON u.pid = billing.pid " .
                   "WHERE billing.code LIKE 'INT%' AND billing.billed IS NULL AND billing.date > '2019-08-01%'";

        $results = $charges->zQuery($sql);

        return $results;

    }

}
