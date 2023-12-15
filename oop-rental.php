<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>
<style>
    .brdr {
        border: 1px solid black;
        padding: 10px;
        margin: 20px;
    }
</style>
<body>
    <center>
        <h2><b>Rental Motor</b></h2>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Nama Pelanggan</td>
                    <td>:</td>
                    <td><input type="text" name="nama" id="nama"></td>
                </tr>
                <tr>
                    <td>Lama Waktu Rental (hari)</td>
                    <td>:</td>
                    <td><input type="number" name="jumlah" id="jumlah"></td>
                </tr>
                <tr>
                    <td>Jenis Motor</td>
                    <td>:</td>
                    <td>
                        <select name="bakar" id="bakar">
                            <option value="Scooter">Scooter</option>
                            <option value="Vespa">Vespa</option>
                            <option value="Beat">Beat</option>
                            <option value="Vario">Vario</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="submit">Beli</button>
                    </td>
                </tr>
            </table>
        </form>
    </center>
<?php
class Shell {
    public $harga = [
        'Scooter' => 70000,
        'Vespa' => 70000,
        'Beat' => 70000,
        'Vario' => 70000,
    ];
    public $nama_pl = ['hana', 'naura', 'bergisch', 'lubna'];
    public $jenis;

    public function __construct($jenis) {
        $this->jenis = $jenis;
    }

    public function pajak() {
        return $pajak = 10000;
    }
}

class Beli extends Shell {
    public $jumlah;
    public $harga_motor;

    public function __construct($nama_pl, $jenis, $jumlah) {
        parent::__construct($jenis);
        $this->jumlah = $jumlah;
        $this->harga_motor = $this->harga[$jenis]; 
        $this->nama = $nama_pl;
    }

    public function totalHarga() {
        global $nama, $jenis_mtr;
        if (in_array($nama, $this->nama_pl)) {
            $ptngn = 0.05;
        } else {
            $ptngn = 0;
        }
        if ($this->jenis == $jenis_mtr) {
            $pajak = parent::pajak();
            $total = $this->harga_motor * $this->jumlah - ($this->harga_motor * $ptngn) + $pajak;
            return $total;
        } else {
            return "Jenis motor tidak valid";
        }
    }
}

if (isset($_POST["submit"])) {
    $nama = $_POST['nama'];
    $jumlah_l = $_POST['jumlah'];
    $jenis_mtr = $_POST['bakar'];

    ?>
    <center>
        <div class="brdr">
        <?php
        $beli = new Beli($nama, $jenis_mtr, $jumlah_l);
        if (in_array($nama, $beli->nama_pl)) {
            $ptngn = 0.05;
            echo "{$beli->nama} berstatus sebagai Member mendapatkan diskon sebesar 5% <br>";
        } else {
            $ptngn = 0;
            echo "Nama belum terdaftar, tidak mendapatkan potongan harga<br>";
        }

        if ($beli->jenis == $jenis_mtr) {
            $pajak = $beli->pajak();
            echo "Jenis motor yang di rental adalah {$beli->jenis} selama {$beli->jumlah} hari<br>";
            echo "Harga rental per-harinya " . number_format($beli->harga_motor) . "<br><br>";
            echo "Besar yang harus dibayarkan adalah Rp. " . number_format($beli->totalHarga()) . "<br>";
        } else {
            echo "Jenis motor tidak valid";
        }
    }
    ?>
        </div>
    </center>

    </div>
</center>
</body>
</html>
