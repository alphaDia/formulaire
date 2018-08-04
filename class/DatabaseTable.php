<?
    class DatabaseTable
    {
        private $pdo;
        private $table;
        private $primarykey;
        
        public function __construct(PDO $pdo, string $table, string $primarykey)
        {
            $this->pdo = $pdo;
            $this->table = $table;
            $this->primarykey = $primarykey;
        }

        public function insertItems($fields){
            $this->primarykey = null;
            $sql = 'INSERT INTO ijbd SET ';
            foreach ($fields as $key => $field) {
                if($field instanceof DateTime){
                    $fields[$key]  =  $field->format('Y-m-d');
                    $sql .= $key . ' = :' .$key .' ,';
                }else{
                    $sql .= "$key = :$key ,";
                }
            }
        
            $sql = rtrim($sql,',');
            $this->query($sql,$fields);
        }

        public function update($record){
        $sql = "UPDATE  $this->table  SET jokeText =
         :jokeText WHERE $this->primarykey = :id";
            //$tab = ['jokeText'=>$text,'id'=>$id];
            $this->query($sql,$record);
        }

        public function findByid($value){
            $sql = "SELECT * FROM  $this->table WHERE $this->primarykey = :id";
            $bind = ['id'=>$value];
            $pdostm = $this->query($sql,$bind);
            return $pdostm->fetch();
        }

        public function delete($idvalue){
        $sql = "DELETE FROM $this->table WHERE $this->primarykey = :id";
            $tab = ['id'=>$idvalue];
            $this->query($sql,$tab);
        }

        private function query($sql,$tab=[]){
            $pdostm = $this->pdo->prepare($sql);
            $pdostm->execute($tab);
            return $pdostm;
        }

        public function alljokes(){
            $sql = "SELECT ijbd.id ,jokeText,jokeDate, name , email FROM $this->table
            INNER JOIN author ON authorID = author.id";
            return $this->query($sql);
        }

        public function save($record){
            if($record['id'] != ''){
                $this->update($record);
            }else{
                $this->insertItems($record);
            }
        }

        //author table
        public function findAll(){
            $sql = "SELECT * FROM $this->table";
            $pdostm = $this->query($sql);
            return $pdostm->fetchAll();
        }

        /* function delete($pdo,$table,$id,$primarykey){
            $sql = "DELETE FROM $table WHERE $primarykey = :id";
            $bind = ['id'=>$id];
            query($pdo,$sql,$bind);
        }*/

        public function insertauthor(){
            $sql = "INSERT INTO $this->table SET ";
            foreach ($fields as $key => $field) {
                $sql .= "$key = :$key";
            }
            $sql = rtrim($sql,',');
            $this->query($sql,$fields);
        }

        public function total(){
            $sql = "SELECT count(*) FROM $this->table";
            $pdostm =  $this->query($sql);
            $row = $pdostm->fetch();
            return $row[0];
        }

    }
?>