private $db2;

	function __construct() {
        parent::__construct();
        $this->db2 = $this->load->database('db_sbs', TRUE);
    }
	
	
	
	$hsl = $this->db2->query("SELECT * FROM tbl_konfig ORDER BY lokasi");