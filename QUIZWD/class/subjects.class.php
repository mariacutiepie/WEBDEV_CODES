    <?php
    require_once "database.class.php";

    class Subjects{

        public $subject_code;
        public $subject_name;

        protected $db;

        function __construct()
        {
            $this->db = new Database;
        }


        function edit(){
            $sql = "UPDATE subjects SET subject_code = :subject_code, subject_name = :subject_name,  WHERE id = :id;";

            $query = $this->db->connect()->prepare($sql);

            $query->bindParam(':subject_code', $this->subject_code);
            $query->bindParam(':subject_name', $this->subject_name);

            return $query->execute();
        } 

        function getData() {
            $sql = "SELECT * FROM subjects;";
            $query = $this->db->connect()->prepare($sql);

            if($query->execute()) {
                $data = $query->fetchAll();
            }
            return $data;
        }

        function showAll($keyword) {
            $sql = "SELECT * FROM subjects WHERE subject_code LIKE '%' :keyword '%' ORDER BY subject_code ASC";
            $query = $this->db->connect()->prepare($sql);
        
            $query->bindParam(":keyword", $keyword);
          
        
            if ($query->execute()) {
                $data = $query->fetchAll(); 
            }
            return $data;
        }

        function fetchRecord($recordID) {
            $sql = "SELECT * FROM subjects WHERE id = :recordID;";

            $query = $this->db->connect()->prepare($sql);

            $query->bindParam(':recordID', $recordID);

            $data = null;

            if ($query->execute()) {
                $data = $query->fetch();
            }
            return $data;
        }
        

    }