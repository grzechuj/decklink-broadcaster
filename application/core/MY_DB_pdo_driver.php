<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_DB_pdo_driver extends CI_DB_pdo_driver {

        function __construct($params){
            parent::__construct($params);
            log_message('debug', 'Extended DB driver class instantiated!');
        }

	/**
	 * Non-persistent database connection
	 *
	 * @access	private called by the base class
	 * @return	resource
	 */
	function db_connect()
	{
            $pdox = new PDO($this->hostname, $this->username, $this->password);
            $pdox->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

            return $pdox;
	}

	// --------------------------------------------------------------------
        
	/**
	 * Execute the query
	 *
	 * @access	private called by the base class
	 * @param	string	an SQL query
	 * @return	object
	 */
	function _execute($sql)
	{
		$sql = $this->_prep_query($sql);

		$result_id = $this->conn_id->prepare($sql);

                if($result_id) $result_id->execute();

                if (is_object($result_id))
		{
			if (is_numeric(stripos($sql, 'SELECT')))
			{
				$this->affect_rows = count($result_id->fetchAll());
				$result_id->execute();
			}
			else
			{
				$this->affect_rows = $result_id->rowCount();
			}
		}
		else
		{
			$this->affect_rows = 0;
		}
		
		return $result_id;
	}

	// --------------------------------------------------------------------
}
?>