<?php
trait Civitas{
    private string $nama;
    private string $alamat;
    
    public function getNama():string{
        return $this->nama;
    }
    public function setNama(string $nama){
        if(!is_null($nama)){
            $this->nama = $nama;
        }else{
            echo "Nama must have value!";
        }
        
    }
    public function getAlamat():string{
        return $this->alamat;
    }
    public function setAlamat(string $alamat){
        if(!is_null($alamat)){
            $this->alamat = $alamat;
        }else{
            echo "Alamat must have value!";
        }
    }
    public function dataAwal():string{
        return "Nama\t: ".$this->getNama().
        "\nAlamat\t: ". $this->getAlamat(). PHP_EOL;
    }
}
trait KRS{
    private int $jumlahSks;
    private string $nim;
    public function setJumlahSks(int $jumlahSks):void{
        $this->jumlahSks = $jumlahSks;
    }
    public function getJumlahSks():int{
        return $this->jumlahSks;
    }
    public function setNim(string $nim):void{
        $this->nim = $nim;
    }
    public function getNim():string{
        return $this->nim;
    }
}
trait Penghasilan{
    private float $gaji;
    private float $bonus;
    public function setGaji(float $gaji):void{
        $this->gaji = $gaji;
    }
    public function getGaji():float{
        return $this->gaji+$this->getBonus();
    }
    public function getBonus():float{
        return $this->gaji*10/100;
    }
}
class Mahasiswa{
    use Civitas,KRS;
    public function __construct(string $nama, string $alamat,string $nim, int $jumlahSks){
        // Civitas::__construct($nama,$alamat);
        $this->setNama($nama);
        $this->setAlamat($alamat);
        $this->setNim($nim);
        $this->setJumlahSks($jumlahSks);
    }
    
    public function tampilData():string{
        return "DATA MAHASISWA\n".$this->dataAwal(). 
        "NIM\t: ".$this->getNim().
        "\nJumlah SKS: ".$this->getJumlahSks(). PHP_EOL;
    }
}
class Dosen{
    use Civitas,Penghasilan;
    public function __construct(string $nama, string $alamat,float $gaji){
        // Civitas::__construct($nama,$alamat);
        $this->setNama($nama);
        $this->setAlamat($alamat);
        $this->setGaji($gaji);
    }
    public function tampilData():string{
        return "DATA DOSEN\n".$this->dataAwal(). 
        "Bonus\t: ". $this->getBonus().
        "\nTotal Gaji: ". $this->getGaji() . PHP_EOL;
    }
}
class Staf{
    use Civitas,Penghasilan;
    public function __construct(string $nama, string $alamat,float $gaji){
        // Civitas::__construct($nama,$alamat);
        $this->setNama($nama);
        $this->setAlamat($alamat);
        $this->setGaji($gaji);
    }
    public function tampilData():string{
        return "DATA STAF\n".$this->dataAwal(). 
        "Bonus\t: ". $this->getBonus().
        "\nTotal Gaji: ". $this->getGaji() . PHP_EOL;
    }
}

//-----------------------
echo "DAFTAR CIVITAS:\n1. Mahasiswa\n2. Dosen\n3. Staf\n";
$tipeCivitas = readline("Masukkan status anda ! (e.g.Mahasiswa)\n: ");
$nama = readline("Masukkan nama anda: ");
$alamat = readline("Masukkan alamat anda : ");
switch($tipeCivitas){
    case "Mahasiswa":
        $nim = readline("Masukkan NIM anda: ");
        $sks = (int)readline("Masukkan jumlah sks: ");
        $mhs = new Mahasiswa($nama,$alamat,$nim,$sks);
        echo $mhs->tampilData();
        break;
    case "Dosen":
        $gaji = (float)readline("Masukkan gaji anda: ");
        $dosen = new Dosen($nama,$alamat,$gaji);
        echo $dosen->tampilData();
        break;        
    case "Staf":
        $gaji = (float)readline("Masukkan gaji anda: ");
        $staf = new staf($nama,$alamat,$gaji);
        echo $staf->tampilData();
        break;
}
