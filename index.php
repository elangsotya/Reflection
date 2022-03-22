<?php
class Sekolah {
	private $sekolah;
	private $akreditasi;
	public function __construct($sekolah){
		$this->setSekolah($sekolah);
		if($sekolah=="SMPN1"){
			$this->setAkreditasi("A");
		} elseif($sekolah=="SMPN2"){
			$this->setAkreditasi("A");
		} elseif($sekolah=="SMPN3"){
			$this->setAkreditasi("B");
		} else{
			$this->setAkreditasi("NULL");
		}
	}

    public function setSekolah($sekolah) {
		$this->sekolah = $sekolah;
	}
	public function getSekolah(){
		return $this->sekolah;
	}
	public function setAkreditasi($akreditasi) {
		$this->akreditasi = $akreditasi;
	}
	public function getAkreditasi(){
		return $this->akreditasi;
	}
}

class Siswa extends Sekolah{
	private $namaSiswa;
    private $NIS;
    private $alamat;
	public function __construct($sekolah, $namaSiswa, $NIS, $alamat){
		$this->setNama($namaSiswa);
		parent::__construct($sekolah);
        $this->setNIS($NIS);
        $this->setAlamat($alamat);
		parent::getAkreditasi();
	}

	public function setNama($namaSiswa) {
		$this->namaSiswa = $namaSiswa;
	}
	public function getNama() {
		return $this->namaSiswa;
	}
    public function setNIS($NIS) {
		$this->NIS = $NIS;
	}
	public function getNIS() {
		return $this->NIS;
	}
    public function setAlamat($alamat) {
		$this->alamat = $alamat;
	}
	public function getAlamat() {
		return $this->alamat;
	}

}

$Nama = readline("Masukkan nama siswa : ");
$sekolah = readline("Masukkan nama asal sekolah : ");
$NIS = readline("Masukkan Nomor Induk Siswa : ");
$alamat = readline("Masukkan alamat siswa : ");
$siswa1 = new Siswa($sekolah, $Nama, $NIS, $alamat);

$RefSiswa1= new ReflectionClass($siswa1);
$siswa1Nama = $RefSiswa1->getMethod("getNama");
$siswa1Sekolah = $RefSiswa1->getMethod("getSekolah");
$siswa1NIS = $RefSiswa1->getMethod("getNIS");
$siswa1Alamat = $RefSiswa1->getMethod("getAlamat");
$siswa1Akreditasi = $RefSiswa1->getMethod("getAkreditasi");
echo "Nama \t\t\t: ";
echo $siswa1Nama->invoke($siswa1);
echo "\nNIS \t\t\t: ";
echo $siswa1NIS->invoke($siswa1);
echo "\nAlamat \t\t\t: ";
echo $siswa1Alamat->invoke($siswa1);
echo "\nSekolah \t\t: ";
echo $siswa1Sekolah->invoke($siswa1);
echo "\nAkreditas sekolah \t: ";
echo $siswa1Akreditasi->invoke($siswa1);

?>
