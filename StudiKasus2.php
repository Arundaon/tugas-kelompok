<?php 
 
    trait DailyActivity{
        var string $status;

        public function jadwalAbsen():String{
            return "07.00 WIB";
        }
    }

    trait MonthlyActivity{
        var int $gajiPokok;
        public abstract function infoGaji();
        public abstract function infoCuti();
    }

    class Pegawai{
        var string $nama;
        var string $NIP;

        public function __construct(string $nama, string $NIP)
        {
            $this->nama = $nama;
            $this->NIP = $NIP;
        }
    }

    class PegawaiHarian extends Pegawai{
        use DailyActivity, MonthlyActivity;
        const UPAH = 120000;
        const CUTI = 2;

        public function infoGaji(){
            $this->gajiPokok = self::UPAH*30;
            echo "Gaji dari $this->nama adalah $this->gajiPokok".PHP_EOL;
        }
        public function infoCuti(){
            echo "Jatah cuti $this->nama adalah ".self::CUTI." hari".PHP_EOL;
        }
    }

    class Sales extends Pegawai{
        use DailyActivity, MonthlyActivity;
        const BONUS = 110000;
        const CUTI = 3;

        public function __construct(string $nama, string $NIP, int $jumlahSold)
        {
            parent::__construct($nama,$NIP);
            $this->jumlahSold = $jumlahSold;
        }
        public function infoGaji(){
            $this->gajiPokok = self::BONUS*$this->jumlahSold;
            echo "Gaji dari $this->nama adalah $this->gajiPokok".PHP_EOL;
        }
        public function infoCuti(){
            echo "Jatah cuti $this->nama adalah ".self::CUTI." hari".PHP_EOL;
        }
    }

    class PegawaiTetap extends Pegawai{
        use DailyActivity, MonthlyActivity;
        const GAJI = 4500000;
        const CUTI = 4;

        public function infoGaji(){
            echo "Gaji dari $this->nama adalah ".self::GAJI.PHP_EOL;
        }
        public function infoCuti(){
            echo "Jatah cuti $this->nama adalah ".self::CUTI." hari".PHP_EOL;
        }
    }

    /* MAIN CODE */

    $pegawaiTetap = new PegawaiTetap("Budi","1231293");
    $pegawaiHarian = new PegawaiHarian("Joko","123182139");
    $sales = new Sales("Fitri","128378237",100);

    echo "\n=========PEGAWAI TETAP=========\n";
    $pegawaiTetap->infoGaji();
    $pegawaiTetap->infoCuti();
    $jadwalAbsenPegawaiTetap = $pegawaiTetap->jadwalAbsen();
    echo "Jadwal absen $jadwalAbsenPegawaiTetap".PHP_EOL;

    echo "\n========PEGAWAI HARIAN========\n";
    $pegawaiHarian->infoGaji();
    $pegawaiHarian->infoCuti();
    $jadwalAbsenPegawaiHarian = $pegawaiHarian->jadwalAbsen();
    echo "Jadwal absen $jadwalAbsenPegawaiHarian".PHP_EOL;
    
     echo "\n=============SALES===========\n";
    $sales->infoGaji();
    $sales->infoCuti();
    $jadwalAbsenSales = $sales->jadwalAbsen();
    echo "Jadwal absen $jadwalAbsenSales".PHP_EOL;
 ?>